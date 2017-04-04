<?php
//数据中心，将所有需要使用到的数据全部集中取值并放到这个对象中，然后统一分配
    class ProductDataCenter
    {
        //这个就是全局state
        public static $objList=[];

        /**
         * @param $name 实例对象保存的名字
         * @param $value 实例对象
         */
        public static function set($name,$value){
            self::$objList[$name]=$value;
        }

        /**
         * @param $name 移除某个对象
         */
        public static function remove($name){
            if(is_array($name)){
                foreach($name as $v){
                    unset(self::$objList[$v]);
                }
            }else{
                unset(self::$objList[$name]);
            }
        }

        /**
         * 在调用不存在的静态方法时，会进入这个魔法函数，如果是调用实例方法，会进入__call
         * @param $name     这个参数是调用的不存在的静态方法名名称
         * @param $args     这个参数是通过静态方法传递到的参数，是一个数组
         * @return array    返回去正确调用后返回的值的数组
         */
        public static function __callStatic($name,$args){
            $return=[];
            //循环全局状态中的实例化对象们
            foreach(self::$objList as $key => $value){
                //如果在实例化对象中找到我们调用的这个方法，就去执行并保存结果在数组中
                if(method_exists($value,$name)){
                    $ret=$value->$name($args);
                    if($ret){
                        $return[]=$ret;
                    }
                }
            }
            //这里存放的是所有结果，多维数组.
            return $return;
        }
    }