<?php
$flow=require('flow.php');
function autoload($name){
    if(file_exists(__DIR__.'/'.$name.'.php')){
        require($name.'.php');
    }
}
spl_autoload_register('autoload');
if(isset($_POST)){
    if(isset($_POST['create'])&&$_POST['dutyDetail']!=''){
        $subject=new subject();
        $subject->state=100;
        $subject->content=$_POST['dutyDetail'];
        $subject->save();
    }
    $staff=false;
    if(isset($_POST['approve'])){
       foreach($flow['flow'] as $key=>$value){
            $$value=new $value();
            if($staff){
                $$staff->setLeader($$value);
                $staff=$value;
            }else{
                $staff=$value;
            }
       }
        eval('$'.current($flow['flow']).'->step("审批结束");');
    }
}
?>
<html>
    <head>
        <title>
            审批流程
        </title>
    </head>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .container{
            width:100%;
            margin:0 auto;
            text-align:center;
        }
        .title{
            display: block;
            font-size:25px;
            font-weight:bold;
        }
        .content{
            width:80%;
            margin:0 auto;
        }
        .detail{
            width:100%;
            border:1px solid #ccc;
            border-radius: 6px;
            padding:8px;
            margin:10px 0;
        }
    </style>
    <body>
        <div class=".container">
            <form method="post" class="content">
                <label class="title">文案内容：</label>
                <textarea name="dutyDetail" id="" cols="30" rows="10" class="detail"></textarea>
                <button type="submit" name="create">创建文案</button>
                <button type="submit" name="approve">领导审批</button>
            </form>
        </div>
    </body>
</html>
