<?php
class StringResult extends Result{

    function convert($data)
    {
        // TODO: Implement convert() method.
        return implode(',',$data);
    }

    function output()
    {
        // TODO: Implement output() method.
        var_export($this->postData);
    }
}