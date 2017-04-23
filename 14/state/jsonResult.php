<?php
class JsonResult extends Result {

    function convert($data)
    {
        // TODO: Implement convert() method.
        return json_encode($data);
    }

    function output()
    {
        // TODO: Implement output() method.
        var_export($this->postData);
    }
}