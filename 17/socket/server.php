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
    socket_write($client,'hello world');
    socket_close($client);
}
socket_close($socket);