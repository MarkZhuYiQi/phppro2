<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/9
 * Time: 17:20
 */
class subject{
    public $content='';
    public $state=0;
    public function save(){
        file_put_contents(__DIR__.'/subject.json',json_encode($this));
    }
}