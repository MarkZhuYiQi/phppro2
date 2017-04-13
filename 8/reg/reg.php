<?php
session_start();
require('./autoload.php');
var_dump($_SESSION['user']);
var_dump($_POST);
function get_user(){
    if(isset($_SESSION['user'])&&$_SESSION['user']!=null){
        return json_decode($_SESSION['user']);
    }
    return null;
}
if(isset($_POST['next'])){
    $userInfo=new userInfo();
    $userPhone=new userPhone();
    $userSuccess=new userSuccess();
    $userInfo->setNextStep($userPhone);
    $userPhone->setNextStep($userSuccess);
    $userInfo->stepNext(get_user());
}
if(isset($_GET['init'])||isset($_POST['clear'])){
    unset($_SESSION['user']);
    echo '清除session成功！';
}
$tpl=get_user()==null?'1':get_user()->step;
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
