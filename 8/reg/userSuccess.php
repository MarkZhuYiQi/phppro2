<?php
class userSuccess extends userReg{
    public $step='3';
    public function stepNext($user){
        $get_user=parent::stepNext($user);
        if($get_user){
            $_SESSION['user']=json_encode($get_user);
        }
        if(isset($_POST['clear'])){
            unset($_SESSION['user']);
            echo '清除session成功';
        }
    }
}