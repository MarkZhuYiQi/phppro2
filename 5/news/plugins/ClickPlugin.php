<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/4
 * Time: 16:14
 */

//点击组件，每次点击都会执行这个事件。
class ClickPlugin implements IPlugins {
    public function update($id)
    {
        // TODO: Implement update() method.
        echo '<hr>';
        echo '新闻为',$id.'点击量增加1！'.date('Y-m-d H:i:s');
    }
    //在调用该对象尝试将其作为字符串输出时会调用这个方法
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'clickPlugin';
    }
}