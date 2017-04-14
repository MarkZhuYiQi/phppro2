<?php
require('./newsDetail.php');
$get_newsid=isset($_GET['id'])?intval($_GET['id']):false;
$news=new newsDetail($get_newsid);

?>

<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
                $news->display();
            ?>
        </div>
    </div>
</body>
</html>
