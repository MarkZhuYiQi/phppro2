<?php
class LogUtil{
    function submit($params){
        echo 'log save success, content: '.$params['data']['logText'];
    }
}