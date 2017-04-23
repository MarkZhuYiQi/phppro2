<?php
$state=new State();
$action=new action();
$GLOBALS['state']=$state;
$GLOBALS['action']=$action;
/**
 * $errcontext把当前函数作用域全部作为对象返回出来
 */
set_error_handler(function($errno,$errstr,$errfile,$errline, $errcontext){
    $class=explode('/',$errstr);
    var_dump($class);
    if(is_file($class[0].'.php')){
        require_once $class[0].'.php';
        $method=$class[1];
        (new $class[0])->$method($errcontext);
        var_dump($errcontext);
    }
},E_USER_NOTICE);
class BaseController{
    function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
        if($name=='action'){
            return $GLOBALS['action'];
        }
    }

    /**
     * @param $msg
     * @param $data 收到data就是上一个function的作用域，然后将这个作用域作用于user_error，太巧秒了
     *
     */
    function call($msg,$data){
        user_error($msg);
    }
}