<?php
$state=new state();
$GLOBALS['state']=$state;
class BaseController{
    function __get($name){
        if($name=='state'){
            return $GLOBALS['state'];
        }
    }
}