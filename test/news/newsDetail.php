<?php
class newsDetail implements INews {
    public $news_data;
    public $news_id=0;
    public $plugs=[];
    public function __construct($newsId)
    {
        $newsFromDataBase=[
            ["news_id"=>"101","news_title"=>"Android最佳的开源库集锦","news_content"=>"工欲善其事，必先利其器。一个好的开发库可以快速提高开发者的工作效率，甚至让开发工作变得简单。本文收集了大量的Android开发库，快来切磋一下，到底哪一个最适合你。"],
            ["news_id"=>"102","news_title"=>"Javascript里常见的事件位置属性","news_content"=>"pageX指鼠标在页面上的位置，以页面左侧为参考点clientX指可视区域内离左侧的距离，以滚动条滚动到的位置为参考点。各个浏览器相同"],
        ];
        $this->news_data=$newsFromDataBase;
        $this->news_id=$newsId;
//        $clickPlugin=new ClickPlugin();
//        $this->regPlug($clickPlugin);
        $this->getPlugins();
    }
    public function getPlugins(){
        $getClass=get_declared_classes();
        $class=array_slice($getClass,array_search(__CLASS__,$getClass)+1);
        foreach($class as $key => $_class){
            if(preg_match("/[\w+]Plugin$/",$_class)){
                $createObj=new $_class();
                $this->regPlug($createObj);
            }
        }
    }
    public function plus(){
        $plusPlugin=new PlusPlugin();
        $this->regPlug($plusPlugin);
    }
    public function getNews(){
        foreach($this->news_data as $key=>$data){
            if($data['news_id']==$this->news_id){
                return $data;
            }
        }
    }
    public function display(){
        $get_news=$this->getNews();
        echo '<h2>'.$get_news['news_title'].'</h2>';
        echo '<div>'.$get_news['news_content'].'</div>';
        echo "<a href='http://localhost/phpPro2/test/news/show.php?id=102&a=plus'>点赞</a>";
        //循环插件库，将插件库中的对象依次执行一遍
        foreach($this->plugs as $pluginName => $pluginObject){
            $pluginObject->update($this->news_id);
        }
    }

    /**
     * @param IPlugins $plug    这个变量就代表了一个接口对象
     */
    public function regPlug(IPlugins $plug)
    {
        // TODO: Implement regPlug() method.
        //小技巧，直接将对象转换成字符串，将调用对象中的魔力函数__toString，返回字符串
        //这里将plug对象存放到plugs中，待display时统一执行插件库中的内容。
        $this->plugs[strval($plug)]=$plug;
    }

    public function unregPlug(IPlugins $plug)
    {
        // TODO: Implement unregPlug() method.
    }
}