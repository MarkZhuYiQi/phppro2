<?php
class State implements Iterator {
    public $root;
    public $modules;
    public $pos=-1;
    public $iteratorData;
    public function __construct()
    {
        $this->root=new \stdClass();
        $this->modules=new \stdClass();
    }

    public function setState(...$states){
        if(count($states)==3){
            $module=$states[0];
            if(!isset($this->modules->$module)){
                $this->modules->$module=(object)[$states[1]=>$states[2]];
            }else{
                $key=$states[1];
                $this->modules->$module->$key=$states[2];
            }
        }elseif(count($states)==2){
            $key=$states[0];
            $this->root->$key=$states[1];
        }
    }
    public function configIterator(...$keys){
        //如果参数有两个，说明是要读取模块中的一个变量
        if(count($keys)==2){
            $module=$keys[0];
            $key=$keys[1];
            if($module!=''&&$key!=''){
                if(isset($this->modules->$module)&&isset($this->modules->$module->$key)){
                    $this->pos=0;
                    $this->iteratorData=$this->modules->$module->$key;
                }
            }
        }elseif(count($keys)==1){
            $key=$keys[0];
            if($key&&$key!=''){
                $this->pos=0;
                $this->iteratorData=isset($this->root->$key)?$this->root->$key:false;
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
        if($this->pos<0){
            return false;
        }
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