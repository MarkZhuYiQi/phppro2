<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/18
 * Time: 23:22
 */
class Webservices
{
    function display(){
        return "i am RPC displayMethod.";
    }
    function showName($name){
        if(is_array($name)){
            $name=implode('/',$name);
        }
        return "I am ".$name;
    }
}