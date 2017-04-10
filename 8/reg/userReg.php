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
        if($this->step==$user->step){
            if($this->next){
                //把下一步的标识传给user
                $user->step=$this->next->step;
                return $user;
            }
        }else{
            //如果标识不同，那就将事务交给下一级去处理
            if($this->next){
                return $this->next->stepNext($user);
            }
        }
    }

}