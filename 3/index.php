<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/2
 * Time: 23:10
 */
require "product/productFactory.php";
productFactory::getObj(['Books','Dogs']);

/*//这样相当于直接去操作目标对象了，调用了对象中的方法。
$list=ProductDataCenter::$objList['Books']->getList();*/

/*var_dump(ProductDataCenter::getList());
echo '<hr>';
ProductDataCenter::remove(['Books']);
var_dump(ProductDataCenter::getList());*/

$child=ProductDataCenter::getChild('103','Books');
var_export($child);