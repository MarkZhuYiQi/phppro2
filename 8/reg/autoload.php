<?php
function autoload($name){
    if(file_exists(__DIR__.'/'.$name.'.php')){
        require(__DIR__.'/'.$name.'.php');
    }
}
spl_autoload_register('autoload');