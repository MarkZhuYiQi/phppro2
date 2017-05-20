<?php
/*
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($socket,'192.168.1.160',9123);
socket_listen($socket,5);   //开机
while (true){
    $client=socket_accept($socket);     //有人打电话进来
    $buf=socket_read($client,1024);
    echo $buf;
    if(preg_match("/sleep/i",$buf)){
        sleep(10);
        $html="HTTP/1.1 200 OK".PHP_EOL
            ."Content-type:text/html;charset=utf-8".PHP_EOL.PHP_EOL;
        socket_write($client,$html);
        socket_write($client,"this is server, waiting for 10s, pretend to be busy!");
    }else{
        socket_write($client,"this is server");
    }
    socket_write($client,'hello world');
    socket_close($client);
}
socket_close($socket);
*/

$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
socket_bind($socket,'192.168.1.160',9123);
socket_listen($socket,5);   //开机

while(true){
    $client=socket_accept($socket);     //有人打电话进来
    $pid = pcntl_fork();
//父进程和子进程都会执行下面代码
    if ($pid == -1) {
        //错误处理：创建子进程失败时返回-1.
        die('could not fork');
    } else if ($pid) {
        socket_close($client);
        //父进程会得到子进程号，所以这里是父进程执行的逻辑
//    pcntl_wait($status); //等待子进程中断，防止子进程成为僵尸进程。
    } else {
        //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
        $buf=socket_read($client,1024);
        echo $buf;
        if(preg_match("/sleep/i",$buf)){
            sleep(10);
            $html="HTTP/1.1 200 OK".PHP_EOL
                ."Content-type:text/html;charset=utf-8".PHP_EOL.PHP_EOL;
            socket_write($client,$html);
            socket_write($client,"this is server, waiting for 10s, pretend to be busy!");
        }else{
            socket_write($client,"this is server");
        }
        socket_close($client);
    }
}
socket_close($client);