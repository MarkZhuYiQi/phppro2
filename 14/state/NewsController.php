<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/21/2017
 * Time: 11:18 AM
 */
class NewsController extends BaseController {
    public $test='test';
    public function __construct()
    {
        $this->action->then(function(){
            return new JsonResult(['status'=>'success','message'=>'init data success']);
        });
    }

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
            $logText='这是我在action里的操作内容';
            //用get_defined_vars将当前变量们传递给call
            $this->call("LogUtil/submit",get_defined_vars());
            return new StringResult(['step'=>'memcached OK','stepNo'=>'2']);
        })->then(function(){
            return 'static files';
        });
        $this->action->commit('StringResult');
        /*//这个方法很死板，只能讲每次action中的返回值打印，没法个性化操作。
        foreach($this->action->commit() as $item){
            var_export($item);
            echo '<hr>';
        }*/
    }
}
$GLOBALS['state']->configIterator('news','newsList');
$c=new NewsController();
$c->index();
$c->review();
