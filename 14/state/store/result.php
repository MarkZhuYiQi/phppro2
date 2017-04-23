<?php
abstract class Result{
    public $initData;
    public $postData;
    function __construct($data)
    {
        $this->initData=$data;
        $this->postData=$this->convert($data);
    }
    abstract function convert($data);
    abstract function output();
}