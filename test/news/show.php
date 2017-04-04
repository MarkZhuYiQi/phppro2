<?php
require('./INews.php');
require('./newsDetail.php');
require('./IPlugins.php');
require('./ClickPlugin.php');
require('./PlusPlugin.php');
$get_newsid=isset($_GET['id'])?intval($_GET['id']):101;
$get_method=isset($_GET['a'])?$_GET['a']:'';
$newsDetail=new newsDetail($get_newsid);
if($get_method!='')$newsDetail->$get_method();
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="container" style="width:80%;margin:0 auto">
        <?php
            $newsDetail->display();
        ?>
    </div>
    </body>
</html>