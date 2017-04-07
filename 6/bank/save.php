<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 4:18 PM
 */
class save implements delegator {
    public function bankMain($info)
    {
        echo get_class().' '.$info['save'];
    }

}