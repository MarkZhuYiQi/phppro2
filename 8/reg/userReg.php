<?php
abstract class userReg {
    public $step='1';
    public $next=false;     //存放下一级的实例对象
    public $last=false;     //存放本级实例对象
    public function setNextStep($object){
        $this->next=$object;
        $this->last=$this;
    }
    public function stepNext($user){
        if($user->step==$this->step){
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