<?php
require('BaseController.php');
require('JsonResult.php');
require ('NewsController.php');
$c=new NewsController();
$c->index();
$c->review();