<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/13/2017
 * Time: 2:33 PM
 */
class clickPlugin implements IPlugins{

    public function update($id)
    {
        // TODO: Implement update() method.
        echo 'ID为:'.$id.'的新闻条目点击量+1！';
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'clickPlugin';
    }
}