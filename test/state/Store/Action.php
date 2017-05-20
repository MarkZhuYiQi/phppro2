<?php
class Action{
    public $actions=[];
    public function then($action){
        $this->actions[]=$action;
        return $this;
    }
    public function commit($resultType=false){
        $data=false;
        foreach($this->actions as $action)
        {
            $getRet=$action($data);
            if($resultType&&$getRet instanceof $resultType)
            {
                $getRet->output();
                $data=$getRet->initData;    //原始数据传给下一个action
                continue;
            }
            $data=$getRet;


//            yield $getRet;
        }
    }
}