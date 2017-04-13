<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/13/2017
 * Time: 5:04 PM
 */
class reader implements SplObserver {
    private $name;
    function __construct($name)
    {
        $this->name=$name;
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
        echo $this->name.' is reading breakOut news <b>'.$subject->getContent().'<b><br />';
    }
}