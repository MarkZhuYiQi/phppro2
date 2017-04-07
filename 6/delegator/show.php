<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 11:23 AM
 */
require ("Dog.php");
require ("User.php");
require ("VIPUser.php");
require ("CorUser.php");
$dog=new Dog();
$user=new User();
$user->delegator=$user;
echo 'VIP价格：'.$dog->getPrice()*$user->getDiscount();