<?php
$state=new State();
$action=new action();
$GLOBALS['state']=$state;
$GLOBALS['action']=$action;
class BaseController{
    function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
        if($name=='action'){
            return $GLOBALS['action'];
        }
    }
}