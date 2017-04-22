<?php
class NewsController extends BaseController {
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
            return 'memcached ok';
        })->then(function(){
            return 'mysql ok';
        });
        foreach($this->action->commit() as $item){
            var_export($item);
            echo '<hr>';
        }
    }
}