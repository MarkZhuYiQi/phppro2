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

class productFactory{
    public static function getObj($name){
        //让狗的界面显示书的内容
        if($name=='Dogs')$name='Books';
        switch($name){
            case 'Dogs':
                return new $name();
            case 'Books':
                return new $name();
            case 'Wines':
                return new $name();
            default:
        }
    }
}