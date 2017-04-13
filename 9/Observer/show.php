<?php
require('./IPlugins.php');
require('./INews.php');
require('./newsDetail.php');
$get_newsid=isset($_GET['id'])?intval($_GET['id']):101;
$get_method=isset($_GET['m'])?$_GET['m']:'';
$newsDetail=new newsDetail($get_newsid,$get_method);
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php
                $newsDetail->display();
            ?>
        </div>
    </body>

</html>
