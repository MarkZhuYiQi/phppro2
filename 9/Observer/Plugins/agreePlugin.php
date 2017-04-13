<?php
/**
 * Created by PhpStorm.
 * User: szl4zsy
 * Date: 4/13/2017
 * Time: 3:11 PM
 */
class agreePlugin{
    function install(INews $news)
    {
        $news->regPlug(
            new class implements IPlugins
            {
                public function update($id)
                {
                    // TODO: Implement update() method.
                    echo 'ID为:' . $id . '的新闻条目点赞数+1！';
                }

                public function __toString()
                {
                    // TODO: Implement __toString() method.
                    return 'agreePlugin';
                }
            }
        );
    }
}