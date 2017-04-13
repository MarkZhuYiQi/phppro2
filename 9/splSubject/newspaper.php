<?php
class newspaper implements SplSubject {
    private $name;          //报纸名称，主题名称
    private $observers=[];  //观察者
    private $content='';    //内容
    public function __construct($name)
    {
        $this->name=$name;
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
    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->observers[]=$observer;
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
        $key=array_search($observer,$this->observers,true);
        if($key){
            unset($this->observers[$key]);
        }
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
        foreach($this->observers as $value){
            $value->update($this);
        }
    }
    public function breakOutNews($content){
        $this->content=$content.'('.$this->name.')';
        $this->notify();
    }
    public function getContent(){
        return $this->content;
    }
}