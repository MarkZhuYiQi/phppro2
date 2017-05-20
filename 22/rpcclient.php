<?php

/*$client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_connect($client, '127.0.0.1',9123) or die('error!');

$http="GET /services/Webservices HTTP/1.1".PHP_EOL;

$http.="EXEC display".PHP_EOL;

socket_write($client,$http);

$buf=socket_read($client,8024);

echo $buf;

socket_close($client);*/

class RpcClient
{
    private $url=[];
    private $client;
    function __construct($url)
    {
        $this->url=parse_url($url);
        $this->client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
        socket_connect($this->client,$this->url['host'],$this->url['port']);
    }
    function __call($name,$args){
        $http="GET ".$this->url['path']." HTTP/1.1".PHP_EOL;
        $http.='EXEC '.$name;
        if(count($args)>0){
            $params=implode('&',$args);
            $http.='&'.$params.PHP_EOL;
        }else{
            $http.=PHP_EOL;
        }
        socket_write($this->client,$http);
        $buf=socket_read($this->client,8024);
        echo $buf;
        socket_close($this->client);
    }
}

$client=new RpcClient("http://127.0.0.1:9123/services/Webservices");
$client->showName("mark","zhu","red");
