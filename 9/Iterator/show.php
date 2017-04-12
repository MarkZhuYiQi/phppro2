<?php
class News implements Iterator {
    public $data=[];
    public $pos=0;
    public function __construct()
    {
        //我们假装 这些数据是从数据库取出来的，或者API获取得到的
        $data_fromDB= '[{"newsid":"201","pubtime":"2016-10-02","title":"工程师如何打造一支超强团队 ","desc":"我们认为只有技术和设计的结合，才能诞生出最伟大的产品。 特赞请来了三位拥有丰富技术经验、正在从事技术管理的大牛，与大家分享从技术到管理的经验和心得：如何成为团队领导？","isdeleted":false},'
            .'{"newsid":"202","pubtime":"2016-10-01","title":"全栈必备的技术栈设想 ","desc":"工程师关注的是功能和代码性能，而架构师关注的是业务和系统的性能等非功能性约束。全栈不是全能，只要覆盖了所使用的技术栈就是全栈","isdeleted":false},'
            .'{"newsid":"203","pubtime":"2016-09-28","title":"Android WebView简要介绍和学习计划 ","desc":"我们通常会在App的UI中嵌入WebView，用来实现某些功能的动态更新。在4.4版本之前，Android WebView基于WebKit实现。不过，在4.4版本之后，Android WebView就换成基于Chromium的实现了。基于Chromium实现，使得WebView可以更快更流畅地显示网页。本文接下来就介绍Android WebView基于Chromium的实现原理，以及制定学习计划。","isdeleted":false},'
            .'{"newsid":"204","pubtime":"2016-09-30","title":"已经提出离职申请，现在又犹豫要不要离职了","desc":"上周提出离职，因为最近搬家了，离公司很远，所以事多钱少离家远，全占，没有不走的道理","isdeleted":true}]';
        $this->data=json_decode($data_fromDB,1);

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
        $result=(object)$this->data[$this->pos];
        $result->index=$this->pos+1;
        return $result;
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
//        return $this->current()->newsid;
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
        return isset($this->data[$this->pos]);
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
$news = new News();
foreach($news as $key=>$value){
    var_dump($value);
}