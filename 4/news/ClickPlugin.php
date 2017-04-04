<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/9
 * Time: 21:21
 */
class ClickPlugin implements IPlugin
{

    function update($id)
    {
       echo "<hr/>";//假设 就是去执行新增点击量的过程
       echo "新闻ID为".$id."的新闻点击量加1".date("Y-m-d h:i:s");

    }
    function __toString()
    {
        return "clickplug";
    }
}