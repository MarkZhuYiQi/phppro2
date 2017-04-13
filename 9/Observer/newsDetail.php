<?php
class newsDetail implements INews
{
    public $news_id='';
    public $news_method='';
    public $news_data;
    public $plugs=[];
    function __construct($newsid,$method)
    {
        $newsFromDataBase=[
            ["news_id"=>"101","news_title"=>"Android最佳的开源库集锦","news_content"=>"工欲善其事，必先利其器。一个好的开发库可以快速提高开发者的工作效率，甚至让开发工作变得简单。本文收集了大量的Android开发库，快来切磋一下，到底哪一个最适合你。"],
            ["news_id"=>"102","news_title"=>"Javascript里常见的事件位置属性","news_content"=>"pageX指鼠标在页面上的位置，以页面左侧为参考点clientX指可视区域内离左侧的距离，以滚动条滚动到的位置为参考点。各个浏览器相同"],
        ];
        $this->news_data=$newsFromDataBase;
        $this->news_id=$newsid;
        $this->news_method=$method;
    }
    function display(){
        $this->get_plugins();
        $get_news=$this->get_news();
        if($get_news){
            echo '<h2>'.$get_news['news_title'].'</h2>';
            echo '<p>'.$get_news['news_content'].'</p>';
        }
        foreach($this->plugs as $plugName => $plugValue){
            $plugValue->update($this->news_id);
        }

    }
    function get_news(){
        foreach($this->news_data as $key => $value){
            if($value['news_id']==$this->news_id){
                return $value;
            }
        }
        return false;
    }
    function get_plugins(){
        $scanDir=__DIR__.'/Plugins/';
        $dir=dir($scanDir);
        while($file_name=$dir->read()){
            if(is_file($scanDir.$file_name)){
                require($scanDir.$file_name);
                $class_name = basename($file_name,'.php');
                //这个是插件实例化对象
                $obj=new $class_name($this);
                if(is_subclass_of($obj,'IPlugins')){
                    $this->regPlug($obj);
                }elseif(get_class($obj)==$this->news_method.'Plugin'){
                    $obj->install($this);
                }
            }
        }
    }
    public function regPlug(IPlugins $plug)
    {
        // TODO: Implement regPlug() method.
        $this->plugs[strval($plug)]=$plug;
    }
    public function unregPlug(IPlugins $plug)
    {
        // TODO: Implement unregPlug() method.
    }
}