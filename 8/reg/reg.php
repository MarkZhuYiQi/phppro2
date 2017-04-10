<?php
session_start();
require_once "./autoload.php";
$tpl='1';


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
</body>
</html>