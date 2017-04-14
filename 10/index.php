<?php
require('./commands/ICommands.php');
require('./commands/saveToDB.php');
require('./commands/saveToMem.php');
require('./commands/genFile.php');
class newsModel{
    public $orm_data=null;
    function __construct($activeRecord)
    {
        $this->orm_data=$activeRecord;
    }
    function commit(...$commands){
        foreach($commands as $command){
            if(is_subclass_of($command,'ICommands')){
                if(!$command->isremoved){
                    $command->exec();
                }
            }
        }
    }
}
$news=new newsModel(null);
$news->commit(new saveToMem(),new saveToDB(),new genFile());

?>

<html>
<head>
    <title>post news</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <label>news Title:</label>
            <div class="row">
                <input type="text" name="news_title" />
            </div>
            <label >news content:</label>
            <div class="row">
                <textarea name="news_content" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
    </div>
</body>
</html>
