<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 11:23 AM
 */
require("Dog.php");
require("User.php");
require("Delegator.php");
require("VIPUser.php");
require("CorUser.php");
$_GET['user']='CorUser';
$dog=new Dog();
$user=new User($_GET['user']);
echo $dog->getPrice()*$user->UserOperation();
