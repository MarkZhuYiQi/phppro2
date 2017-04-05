<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/9
 * Time: 21:21
 */
//点击组件，每次点击都会执行这个事件。
class ClickPlugin implements IPlugin
{

    function update($id)
    {
       echo "<hr/>";//假设 就是去执行新增点击量的过程
       echo "新闻ID为".$id."的新闻点击量加1".date("Y-m-d h:i:s");

    }
    //将该对象输出为字符串时会调用该函数
    function __toString()
    {
        return "clickplug";
    }
}