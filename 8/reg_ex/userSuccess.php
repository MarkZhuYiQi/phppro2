<?php
class userSuccess extends userReg{
    public $step='3';
    public function stepNext($user)
    {
        //业务在这里执行
        $get_user=parent::stepNext($user); // TODO: Change the autogenerated stub
        if($get_user){
            $_SESSION['user']=json_encode($get_user);
        }
        if(isset($_POST['clear'])){
            unset($_SESSION['user']);
            echo 'COOKIE清除成功！';
        }
    }
}