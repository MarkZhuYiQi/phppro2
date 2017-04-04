<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/4
 * Time: 16:25
 */
interface INews {
    //这里PHP7的写法，参数前指定参数的类型，这里指定的类型是继承于IPlugins的实例化对象
    public function regPlug(IPlugins $plug);
    public function unregPlug(IPlugins $plug);
    function display();
}