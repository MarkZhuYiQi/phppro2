<?php
class userInfo extends userReg {
    public $step='1';
    public function stepNext($user){
        if(isset($_POST['next'])&&isset($_POST['username'])&&isset($_POST['password'])){
            if($user==null){
                $user=new userEntity();
                $user->username=$_POST['username'];
                $user->password=$_POST['password'];
            }
        }
        $get_user=parent::stepNext($user);
        if($get_user){
            $_SESSION['user']=json_encode($get_user);
        }
    }
}