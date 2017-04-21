<?php
require('./Store/State.php');
$state=new State();
$GLOBALS['state']=$state;
class BaseController{
    public function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
    }
}