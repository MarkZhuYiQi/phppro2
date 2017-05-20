<?php
$server = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_bind($server, '127.0.0.1',9123) or die('error!');

socket_listen($server,5);

while(true){
    $client=socket_accept($server);
    $buf=socket_read($client,8024);
    echo $buf;
    if(preg_match("/GET\s\/(.*?)\sHTTP\/1.1/i",$buf,$matches)){
        $path='./'.$matches[1].'.php';
        if(preg_match("/\/([\w]*?).php$/",$path,$className)){
            $className=$className[1];
            if(!in_array($className,get_declared_classes())){
                if(file_exists($path)){
                    require_once($path);
                }
            }
            $classes=get_declared_classes();
            $class=end($classes);
            $service=new $class();
            $methods=get_class_methods($service);
            $results="";
            foreach ($methods as $method){
                if($results!="")$results.=", ";
                $results.=$method;
            }
            if(preg_match("/EXEC\s(.*?)\s/i",$buf,$clientCommand)){
                if(isset($clientCommand[1]) && $clientCommand[1]!=''){
                    $clientCommand=$clientCommand[1];
                    if(preg_match("/&/",$clientCommand)){
                        $params=explode("&",$clientCommand);
                        $methodName=$params[0];
                        unset($params[0]);
                        $getRes=$service->$methodName($params);
                        socket_write($client,$getRes);
                    }else{
                        $getRes=$service->$clientCommand();
                        socket_write($client,$getRes);
                    }
                }
            }else{
                socket_write($client,$results);
            }
        }
    }else{
        socket_write($client,'404');
    }
    socket_close($client);
}
socket_close($server);

/*$server=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

socket_bind($server,'127.0.0.1',9123) or die("error");

socket_listen($server,5);

while(true) {

    $client=socket_accept($server);
    $buf=socket_read($client,8024);
    echo $buf;
    if(preg_match("/GET\s\/(.*?)\sHTTP\/1.1/i",$buf,$matchs)) {
        $path='./'.$matchs[1].'.php';
        if(file_exists($path))
        {
            require_once $path;
            $classes=get_declared_classes();
            $obj_class_name=end($classes);
            $obj=new $obj_class_name();//实例化
            $result="";
            if(preg_match("/EXEC\s(.*?)\s/i",$buf,$matchs))
            {
                $methodName=$matchs[1];//获取自定义协议中的方法名
                $result=$obj->$methodName();
                socket_write($client,$result);
            }
            else
            {
                foreach(get_class_methods($obj) as $method)
                {
                    if($result!="") $result.=",";
                    $result.='"method":"'.$method.'"';
                }
                $result="{".$result."}";
                socket_write($client,$result);
            }


        }
        else
            socket_write($client,"no service");
    }
    else
    {
        socket_write($client,"404");
    }
    socket_close($client);
}
socket_close($server);*/

