<?php
class clickPlugin implements SplObserver {
    public $id='';
    public function __construct($id)
    {
        $this->id=$id;
    }
    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo 'id为'.$this->id.'的新闻阅读量+1';
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'clickPlugin';
    }
}