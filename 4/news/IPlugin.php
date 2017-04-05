<?php

interface IPlugin
{
    //指定插件库必须实现的方法
    function update($id);//群众方法，好比就是笑，怎么笑自己决定

    function __toString();
}