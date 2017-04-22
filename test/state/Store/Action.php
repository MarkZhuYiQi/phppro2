<?php
class Action{
    public $actions=[];
    public function then($action){
        $this->actions[]=$action;
        return $this;
    }
    public function commit(){
        $data=false;
        foreach($this->actions as $action)
        {
            $getRet=$action($data);
            $data=$getRet;
            yield $getRet;
        }
    }
}