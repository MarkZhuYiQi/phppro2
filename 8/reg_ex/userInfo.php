<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/10/2017
 * Time: 5:39 PM
 */
class userInfo extends userReg {
    public $step='1';
    public function stepNext($user)
    {
        //如果还没有进行用户注册，则肯定是进了第一步
        if($user==null){
            $user=new userEntity();
            $user->username=$_POST['username'];
            $user->password=$_POST['password'];
            //将用户对象存进去。
            setcookie('user',json_encode($user));
        }
        //获得的是一个user对象，该user对象存放了下一级状态
        $get_user=parent::stepNext($user); // TODO: Change the autogenerated stub
        if($get_user){
            //更新user的下一级状态。
            $_SESSION['user']=json_encode($get_user);
        }
    }
}