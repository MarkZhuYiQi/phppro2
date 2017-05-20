<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/24/2017
 * Time: 9:28 AM
 */
abstract class Result{
    public $initData;
    public $postData;
    public function __construct($data)
    {
        $this->initData=$data;
        $this->postData=$this->convert($data);
        $this->output($this->postData);
    }
    abstract function convert($data);
    abstract function output($data);
}