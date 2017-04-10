<?php
    function autoload($name){
        if(file_exists(__DIR__.'/'.$name.'.php')){
            require(__DIR__.'/'.$name.'.php');
        }
    }
    spl_autoload_register('autoload');
    if(isset($_POST)){
        if(isset($_POST['create'])&&$_POST['content']!=''){
            $subject=new subject();
            $subject->state=100;
            $subject->content=$_POST['content'];
            $subject->save();
        }
        if(isset($_POST['approve'])){
            $super=new super();
            $man=new man();
            $super->setLeader($man);
            $super->step();
        }
    }
?>
<html>
<head>
    <title></title>
</head>
<body>
    <div>
        <form method="post">
            <label>文案内容：</label>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <button type="submit" name="create">创建</button>
            <button type="submit" name="approve">批复</button>
        </form>
    </div>
</body>
</html>
