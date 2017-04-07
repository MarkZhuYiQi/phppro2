<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 4:24 PM
 */
require("delegator.php");
require("get.php");
require("save.php");
require("bank.php");
$bank=new bank();
$bank->updateBankInfo('save',2000);
$bank->bankOperation('save');
$bank->updateBankInfo('get',4000);
$bank->bankOperation('get');