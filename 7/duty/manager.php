<?php
abstract class manager{
    public $subject;        //用于加载内容
    public $mystate=0;      //当前状态，标识，识别当前的人，很重要
    public $leader=false;   //我的领导是谁？
    public $myname='';      //当前审批者的名字
    public function setLeader($leader){
        $this->leader=$leader;
    }
    public function __construct()
    {
        $this->subject=json_decode(file_get_contents(__DIR__.'/subject.json'));
    }
    public function step($msg){
        if($this->mystate==$this->subject->state){  //说明内容中指向的领导就是我自己
            //查看我是不是还有领导，如果有就要交给我的上级去处理
            if($this->leader){
                //将我的领导属性给内容。移交控制权
                $this->subject->state=$this->leader->mystate;
                file_put_contents(__DIR__.'/subject.json',json_encode($this->subject));
            }else{
                echo '审批已经结束！';
            }
            echo $msg.'! 审批者是:'.$this->myname;
        }else{
            if($this->leader){
                $this->leader->step($msg);
            }
        }
    }

}