<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/2
 * Time: 23:10
 */
require "product/productFactory.php";
$obj=productFactory::getObj('Dogs');
var_dump($obj->getList());