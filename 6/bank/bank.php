<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 4:14 PM
 */

class bank {
    public $info;
    public function updateBankInfo($type,$money){
        $this->info[$type]=$money;
    }
    public function bankOperation($operationType){
        $obj=new $operationType();
        $obj->bankMain($this->info);
    }
}