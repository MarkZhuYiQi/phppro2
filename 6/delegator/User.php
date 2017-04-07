<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 11:18 AM
 */
class User{
    public $delegator=null;
    function getDiscount(){
        return 1;
    }
    function __call($name,$args){
        if($this->delegator!=null){
            return call_user_func_array([$this->delegator,$name],$args);
        }
        return false;
    }
}