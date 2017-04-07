<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/7/2017
 * Time: 3:37 PM
 */

class User {
    public $user_role;
    public function __construct($user_role){
        $this->user_role=$user_role;
    }
    public function UserOperation(){
        $obj=new $this->user_role();
        return $obj->getDiscount();
    }
}