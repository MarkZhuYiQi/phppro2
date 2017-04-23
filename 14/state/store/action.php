<?php
class Action{
    public $actions=[];
    function then(callable $callable)
    {
        //将所有需要执行的程序都保存到actions中去
        $this->actions[]=$callable;
        return $this;
    }

    /**
     * @return Generator
     * 统一执行actions中的功能
     */
    function commit($resultType=false)
    {
        $data=false;
        foreach($this->actions as $action){
            //这里的data会将上一个结果保存进来，供下一次调用。
            $getReturn=$action($data);
            if($resultType&&$getReturn&&$getReturn instanceof $resultType){
                $getReturn->output();
                $data=$getReturn->initData; //把原始数据传给下一个action
                continue;
            }
            $data=$getReturn;




            //协程，看到yield就调用协程。
//            yield $getReturn;
        }
    }
}