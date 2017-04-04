<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/4
 * Time: 15:52
 */
interface IPlugins {
    //指定插件库必须实现的方法
    public function update($id);
    public function __toString();
}