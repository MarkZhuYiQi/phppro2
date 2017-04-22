<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/21/2017
 * Time: 11:18 AM
 */
class NewsController extends BaseController {
    public $test='test';
    function index(){
        $newsData=[
            ['title'=>'test1: MEIZU Pro6 Plus','content'=>'RMB:3299'],
            ['title'=>'test2: Apple IPhone 7','content'=>'RMB:4288']
        ];
        $this->state->setState('news','newsList',$newsData);
        $this->state->setState('title','3C INFO');
        include "./html/index.html";
    }
    function review(){
        $self=$this;
        //模拟链式操作，这样就可以将一个对象反复传递，操作同一个实例对象。
        //这里use是php的匿名函数（闭包）特性，这个function是闭包函数，
        //如果需要使用外面的变量，需要使用use集成变量
        $this->action->then(function() use($self){
            echo $self->test;
            return 'memcached OK';
        })->then(function(){
            return 'static files';
        });
        foreach($this->action->commit() as $item){
            var_export($item);
            echo '<hr>';
        }
    }
}
$GLOBALS['state']->configIterator('news','newsList');
$c=new NewsController();
$c->index();
$c->review();
