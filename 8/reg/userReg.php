<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/10/2017
 * Time: 5:32 PM
 */
abstract class userReg{
    public $step='1';
    public $next=false;
    public $last=false;
    public function setNextStep($object){
        $this->next=$object;
        $object->last=$this;
    }
    public function stepNext($user){
        //只有user的state和自己的mystate相同才会处理
        if($this->step==$user->mystate){
            if($this->next){
                $user->step=$this->next->step;
                return $user;
            }
        }else{
            if($this->next){
                return $this->next->stepNext($user);
            }
        }
    }

}