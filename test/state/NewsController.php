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
}