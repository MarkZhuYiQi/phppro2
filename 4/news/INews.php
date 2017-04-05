<?php

interface INews
{
    //这里PHP7的写法，参数前指定参数的类型，这里指定的类型是继承于IPlugins的实例化对象
    function regPlug(IPlugin $plug);//注册插件,,好比是买票
    function unRegPlug(IPlugin $plug);//反注册，好比是退票
    function display();//通知
}