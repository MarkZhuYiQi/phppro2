<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/4
 * Time: 20:19
 */
class PlusPlugin implements IPlugins {

    public function update($id)
    {
        // TODO: Implement update() method.
        echo '<hr>';
        echo '该信息点赞数+1！';
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'plusPlugin';
    }
}
