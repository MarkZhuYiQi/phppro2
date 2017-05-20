<?php
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_connect($socket,'127.0.0.1',8899);

socket_write($socket,'i am client');

$buf=socket_read($socket,1024);

echo $buf;

socket_close($socket);  //关掉电话