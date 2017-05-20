<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/24/2017
 * Time: 9:32 AM
 */
class JsonResult extends Result {

    function convert($data)
    {
        // TODO: Implement convert() method.
        return json_encode($data);
    }

    function output($data)
    {
        // TODO: Implement output() method.
        var_dump($data);
    }
}