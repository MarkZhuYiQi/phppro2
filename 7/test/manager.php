<?php
abstract class manager{
    public $myname;
    public $mystate;
    public $leader;
    public $subject;
    public function __construct(){
        $this->subject=json_decode(file_get_contents(__DIR__.'/subject.json'));
    }
    public function setLeader($leader){
        $this->leader=$leader;
    }
    public function step(){
        if($this->subject->state==$this->mystate){
            //说明待审批人就是我
            if($this->leader){
                //把我的领导传递给leader
                $this->subject->state=$this->leader->mystate;
                file_put_contents(__DIR__.'/subject.json',json_encode($this->subject));
            }else{
                echo '审批通过！';
            }
            echo '本次审批结束！审批者是：'.$this->myname;
        }else{
            //审批人不是我 上交权限
            if($this->leader){
                $this->leader->step();
            }
        }
    }

}