<?php
class State implements Iterator {
    public $modules;
    public $root;
    //循环内容
    public $iteratorData;
    //循环指针
    public $pos=-1;
    public function __construct()
    {
        $this->modules=new \stdClass();
        $this->root=new \stdClass();
    }
    public function setState(...$states){
        //如果传入的是三个参数则说明是模块名、key、value
        if(count($states)==3){
            $module=$states[0];
            //判断这个模块是否已经存在
            if(!isset($this->modules->$module)){
                $this->modules->$module=(object)[$states[1]=>$states[2]];
            }else{
                $key=$states[1];
                $this->modules->$module->$key=$states[2];
            }
        }else if(count($states)==2){
            //传入2个参数，说明只是存储状态而已
            $key=$states[0];
            $this->root->$key=$states[1];
        }
    }
    /**
     * @param string $module    循环需要访问的模块名
     * @param $key
     */
    public function configIterator($module='',$key){
        if(trim($key)=='')return false; //循环必须有key
        //说明需要循环的是根状态中的值
        if(!$module||trim($module)==''){
            if(isset($this->root->$key)){
                $this->pos=0;
                $this->iteratorData=$this->root->$key;
            }
        }else{
            if(isset($this->modules->$module)&&isset($this->modules->$module->$key)){
                $this->pos=0;
                $this->iteratorData=$this->modules->$module->$key;
            }
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
        return $this->iteratorData[$this->pos];

    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
        $this->pos++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->pos;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        if($this->pos<0)return false;
        return isset($this->iteratorData[$this->pos]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}