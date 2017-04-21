<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/21/2017
 * Time: 11:18 AM
 */
require('BaseController.php');
class NewsController extends BaseController {
    function index(){
        $newsData=[
            ['title'=>'test1: MEIZU Pro6 Plus','content'=>'RMB:3299'],
            ['title'=>'test2: Apple IPhone 7','content'=>'RMB:4288']
        ];
        $this->state->setState('news','newsList',$newsData);
        $this->state->setState('title','3C INFO');
        include "./html/index.html";
    }
}
$c=new NewsController();
$c->index();