<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/24/2017
 * Time: 4:59 PM
 */
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($socket,'127.0.0.1',8899);
socket_listen($socket,5);
while (true){
    $client=socket_accept($socket);
    $buf=socket_read($client,1024);
    echo $buf;
    if(preg_match("/GET\s(.*?)\sHTTP\/1.1/",$buf,$matches)){
        $project_path="D:\\wamp\\www\\phppro2\\18\\socket";
        $path=$matches[1];
        if(file_exists($project_path.$path)){
            //模拟一个响应头！
            $html_content='HTTP/1.1 200 OK'.PHP_EOL
                .'Content-Type: text/html; charset=UTF-8'
                .PHP_EOL.PHP_EOL.file_get_contents($project_path.$path);
            socket_write($client,$html_content);
        }else{
            socket_write($client,'404');
        }
    }
//    socket_write($client,'hello world');
    socket_close($client);
}
socket_close($socket);