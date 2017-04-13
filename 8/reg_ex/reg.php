<?php
session_start();
require_once "./autoload.php";
function getUser(){
    if(isset($_SESSION['user'])){
        return json_decode($_SESSION['user']);
    }
    return null;
}
var_dump(getUser());
var_dump($_POST);
if(isset($_GET['init'])||isset($_POST['clear'])){
    unset($_SESSION['user']);
    echo '清除COOKIE成功';
}
$tpl='1';
if(isset($_POST['next'])){
    $userInfo=new userInfo();
    $userPhone=new userPhone();
    $userSuccess=new userSuccess();
    $userInfo->setNextStep($userPhone);
    $userPhone->setNextStep($userSuccess);
    $userInfo->stepNext(getUser());
}
$tpl=getUser()==null?'1':getUser()->step;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" href="./tpl/style.css">
<body>
<div class="container">
    <?php
        include ("./tpl/".$tpl.'.html');
    ?>
</div>
<a href="http://localhost/phppro2/8/reg/reg.php?init=init">清除session</a>
</body>
</html>