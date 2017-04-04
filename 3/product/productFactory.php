<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/2
 * Time: 22:20
 */
function classLoader($name){
    $path=str_replace('\\',DIRECTORY_SEPARATOR,__DIR__);
    $file=$path.'\\'.$name.'.php';
    if(file_exists($file)){
        require_once $file;
    }
}
spl_autoload_register('classLoader');
require("./product/IPorduct.php");
require("./product/ProductDataCenter.php");
require("./product/ProdLoadTemplate.php");
class productFactory{
    public static function getObj($name){
        if(is_array($name)){
            foreach($name as $key=>$value){
                self::_putDataIntoDataCenter($value);
            }
        }else{
            self::_putDataIntoDataCenter($name);
        }
    }
    public static function _putDataIntoDataCenter($name){
        switch($name){
            case 'Dogs':
                $obj = new $name();
            case 'Books':
                $obj = new $name();
            case 'Wines':
                $obj = new $name();
            default:
        }
        //把创建的对象塞入数据中心
        if(is_subclass_of($obj,'IProduct'))ProductDataCenter::set($name,$obj);
    }
}