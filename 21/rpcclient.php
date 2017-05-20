<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/18
 * Time: 23:08
 */
$client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_connect($client, '127.0.0.1',9123) or die('error!');

$http="GET /services/Webservices HTTP/1.1".PHP_EOL;

$http.="EXEC display".PHP_EOL;

socket_write($client,$http);

$buf=socket_read($client,8024);

echo $buf;

socket_close($client);