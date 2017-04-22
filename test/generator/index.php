<?php
class test{
    public $test;
    function __construct()
    {
        $this->test=[
            ['id'=>1,'title'=>'新闻1','desc'=>'新闻1内容'],
            ['id'=>2,'title'=>'新闻2','desc'=>'新闻2内容'],
        ];
    }
    function gen(){
        foreach($this->test as $item){
            yield $item;
        }
    }
    function test(){
        $generator=$this->gen();
        foreach($generator as $value){
            foreach($value as $k => $v){
                var_dump($k);
                var_dump($v);
            }
        }
    }
}
$test=new test();
$test->test();