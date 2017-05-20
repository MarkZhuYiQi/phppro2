<?php
class NewsController extends BaseController {
    public function __construct()
    {
        $this->action->then(function(){
            new JsonResult(['status'=>'init','step'=>1,'message'=>'init the post data']);
        });
    }

    public function index(){
        $newsData=[
            ['title'=>'iPhone','content'=>4288],
            ['title'=>'MEIZU','content'=>3299],
            ['title'=>'HUAWEI','content'=>2999],
            ['title'=>'MI','content'=>'2499']
        ];
        $this->state->setState('news','newsList',$newsData);
        $this->state->setState('title','quotation');
        include "./html/index.html";
    }
    public function review(){
        $this->action->then(function(){
            $name='mark';
            $message='function作用域内的变量都会通过errorcontent传递给set_error_handler,但是只传递user_error所在的函数作用域,所以需要的变量需要通过传递，传递到最后user_error所在的函数作用域中';
            $this->call('LogUtil/log',get_defined_vars());
            return new JsonResult(['status'=>'memcached','step'=>2,'message'=>'memcached saved']);
        })->then(function(){
            return new JsonResult(['status'=>'mysql','step'=>3,'message'=>'mysql saved']);
        });
        $this->action->commit();
//        foreach($this->action->commit() as $item){
//            var_export($item);
//            echo '<hr>';
//        }
    }
}