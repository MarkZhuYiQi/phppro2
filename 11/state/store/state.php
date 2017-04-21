<?php
class State{
    public $modules;
    public $root;
    public function __construct()
    {
        $this->modules=new \stdClass();
        $this->root=new \stdClass();
    }
    public function setState(...$states){
        //如果传入的是三个参数则说明是模块名、key、value
        if(count($states)==3){
            $module=$states[0];
            //判断这个模块是否已经存在
            if(!isset($this->modules->$module)){
                $this->modules->$module=(object)[$states[1]=>$states[2]];
            }else{
                $key=$states[1];
                $this->modules->$module->$key=$states[2];
            }
        }else if(count($states)==2){
            //传入2个参数，说明只是存储状态而已
            $key=$states[0];
            $this->root->$key=$states[1];
        }
    }
}