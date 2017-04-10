<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/10/2017
 * Time: 10:08 AM
 */
class subject{
    public $content='';
    public $state=0;
    public function save(){
        file_put_contents(__DIR__.'/subject.json',json_encode($this));
        echo '创建文案成功！';
    }
}