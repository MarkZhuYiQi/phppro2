<?php
require('./Store/State.php');
require('./Store/Action.php');
require ('./Store/Result.php');
$state=new State();
$GLOBALS['state']=$state;
$action=new action();
$GLOBALS['action']=$action;
set_error_handler(function($errno,$errstr,$errfile,$errline,$errcontext){
    if($errstr!=''&&preg_match("/\//",$errstr)){
        $class=explode('/',$errstr);
        if(count($class)==2){
            $className=$class[0];
            $method=$class[1];
            if(is_file($className.'.php')){
                require($className.'.php');
                (new $className)->$method();
                var_dump($errcontext);
            }
        }
    }
},E_USER_NOTICE);
class BaseController{
    public function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
        if($name=='action'){
            return $GLOBALS['action'];
        }
    }
    public function call($msg,$params){
        user_error($msg);
    }
}