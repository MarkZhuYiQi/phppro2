<?php
require('./Store/State.php');
require('./Store/Action.php');
$state=new State();
$GLOBALS['state']=$state;
$action=new action();
$GLOBALS['action']=$action;
class BaseController{
    public function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
        if($name=='action'){
            return $GLOBALS['action'];
        }
    }
}