<?php
class State{
    public $root;
    public $modules;
    public function __construct()
    {
        $this->root=new \stdClass();
        $this->modules=new \stdClass();
    }

    public function setState(...$states){
        if(count($states)==3){
            $module=$states[0];
            if(!isset($this->modules->$module)){
                $this->modules->$module=(object)[$states[1]=>$states[2]];
            }else{
                $key=$states[1];
                $this->modules->$module->$key=$states[2];
            }
        }elseif(count($states)==2){
            $key=$states[0];
            $this->root->$key=$states[1];
        }
    }
}