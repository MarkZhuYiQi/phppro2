<?php
//创建一个连接
$server=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//将接口绑定到地址上，所有这个接口上的连接都可以发送接收数据甚至断开
socket_bind($server,'127.0.0.1','9090') or die('erroR!');
//开始监听连接
socket_listen($server,1024);

$allsockets=[$server];
while(true){
    $copySockets=$allsockets;
    if(socket_select($copySockets,$write,$except,0)===false){
        exit('error');
    }
    if(in_array($server,$copySockets)){
        //连接以后就不需要在accept了，是保存在server里面的
        $client=socket_accept($server);
        $buf=socket_read($client,1024);
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/i",$buf,$match)) {
            $key = base64_encode(sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11',true));
            //拼凑响应头
            $res= "HTTP/1.1 101 Switching Protocol".PHP_EOL
                ."Upgrade: WebSocket".PHP_EOL
                ."Connection: Upgrade".PHP_EOL
                ."WebSocket-Location: ws://127.0.0.1:9090".PHP_EOL
                ."Sec-WebSocket-Accept: " . $key .PHP_EOL.PHP_EOL  ;//注意这里，需要两个换行

            socket_write($client, $res, strlen($res));          //握手成功
            socket_write($client,buildMsg('hello websocket'));
            $allsockets[]=$client;  //把websocket客户端的socket保存起来
        }
        $key=array_search($server,$copySockets);
        unset($copySockets[$key]);
    }
    foreach($copySockets as $s) {
        $buf = socket_read($s, 8024);
        if (strlen($buf) < 9) {      //代表客户端主动关闭
            $key=array_search($s,$allsockets);
            unset($allsockets[$key]);   //数组中删除socket
            socket_close($s);           //主动关闭服务
            continue;
        }
        echo getMsg($buf);  //获取客户端信息，并转码
        echo PHP_EOL;
    }
}
socket_close($server);
function buildMsg($msg) {
    $frame = [];
    $frame[0] = '81';
    $len = strlen($msg);
    if ($len < 126) {
        $frame[1] = $len < 16 ? '0' . dechex($len) : dechex($len);
    } else if ($len < 65025) {
        $s = dechex($len);
        $frame[1] = '7e' . str_repeat('0', 4 - strlen($s)) . $s;
    } else {
        $s = dechex($len);
        $frame[1] = '7f' . str_repeat('0', 16 - strlen($s)) . $s;
    }
    $data = '';
    $l = strlen($msg);
    for ($i = 0; $i < $l; $i++) {
        $data .= dechex(ord($msg{$i}));
    }
    $frame[2] = $data;
    $data = implode('', $frame);
    return pack("H*", $data);
}

function getMsg($buffer) {

    $res = '';
    $len = ord($buffer[1]) & 127;
    if ($len === 126) {
        $masks = substr($buffer, 4, 4);
        $data = substr($buffer, 8);
    } else if ($len === 127) {
        $masks = substr($buffer, 10, 4);
        $data = substr($buffer, 14);
    } else {
        $masks = substr($buffer, 2, 4);
        $data = substr($buffer, 6);
    }
    for ($index = 0; $index < strlen($data); $index++) {
        $res .= $data[$index] ^ $masks[$index % 4];
    }
    return $res;
}
