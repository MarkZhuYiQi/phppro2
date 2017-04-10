<?php
class userPhone extends userReg {
    public $step='2';
    public function stepNext($user)
    {
        if($_POST){
            if(isset($_POST['next'])&&$_POST['tel']!=''){
                $user->tel=$_POST['tel'];
                $get_user=parent::stepNext($user);
                if($get_user){
                    $_SESSION['user']=json_encode($get_user);
                }
            }
        }
    }
}