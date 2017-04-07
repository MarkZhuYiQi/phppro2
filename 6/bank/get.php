<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 4:20 PM
 */
class get implements delegator{
    public function bankMain($info)
    {
        echo get_class().' '.$info['get'];
    }
}