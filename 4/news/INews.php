<?php

interface INews
{
    function regPlug(IPlugin $plug);//注册插件,,好比是买票
    function unRegPlug(IPlugin $plug);//反注册，好比是退票
    function display();//通知
}