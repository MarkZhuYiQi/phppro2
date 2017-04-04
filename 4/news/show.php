<?php
  require("NewsDetail.php");
  $get_newsid=$_GET["news_id"]?intval($_GET["news_id"]):101;//根据get参数获取新闻id

  $newsDetail=new NewsDetail($get_newsid);

?>
<html>
 <head>
     <title></title>
 </head>

 <body>

  <div class="container" style="width: 70%;margin: 0 auto">

    <?php
            $newsDetail->display()
    ?>

  </div>

 </body>

 </html>