<?php
class newsDetail implements SplSubject {
    public $plugs=[];
    public $news_data;
    public $news_id;
    public function __construct($newsid){
        $newsFromDataBase=[
            ["news_id"=>"101","news_title"=>"Android最佳的开源库集锦","news_content"=>"工欲善其事，必先利其器。一个好的开发库可以快速提高开发者的工作效率，甚至让开发工作变得简单。本文收集了大量的Android开发库，快来切磋一下，到底哪一个最适合你。"],
            ["news_id"=>"102","news_title"=>"Javascript里常见的事件位置属性","news_content"=>"pageX指鼠标在页面上的位置，以页面左侧为参考点clientX指可视区域内离左侧的距离，以滚动条滚动到的位置为参考点。各个浏览器相同"],
        ];
        $this->news_data=$newsFromDataBase;
        $this->news_id=$newsid;
    }
    public function get_news(){
        foreach($this->news_data as $key=>$value){
            if($value['news_id']==$this->news_id){
                return $value;
            }
        }
    }
    public function display(){
        $this->get_plugins();
        $get_news=$this->get_news();
        if($get_news){
            echo '<h2>'.$get_news['news_title'].'</h2>';
            echo '<p>'.$get_news['news_content'].'</p>';
        }

    }
    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function get_plugins(){
        $scanDir=__DIR__.'/plugins/';
        $dir=dir($scanDir);
        while($file_name=$dir->read()){
            if(is_file($scanDir.$file_name)){
                require($scanDir.$file_name);
                $class_name=basename($file_name,'.php');
                $obj=new $class_name($this->news_id);
                $this->attach($obj);
            }
        }
        $this->notify();
    }
    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->plugs[strval($observer)]=$observer;
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach($this->plugs as $key=>$value){
            $value->update($this);
        }
    }
}