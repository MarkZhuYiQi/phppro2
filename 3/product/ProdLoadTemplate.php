<?php
//专门用于处理加载数据行为的模板方法
abstract class ProdLoadTemplate
{
    function loadData($id,$type){
        $this->setClick($id);
        $this->setLog($id);
        $this->setXX();
        return new class($id,$type){
            function __construct($id,$type)
            {
                $arr=["prod_id"=>103,"prod_name"=>"黑客技术从入门到入狱"];//假设这是从数据库取内容
                foreach($arr as $k => $v){
                    $this->$k=$v;
                }
            }
        };
    }
    abstract function setClick($id);
    abstract function setLog($id);
    function setXX(){
        var_export('自定义事件');
    }
}