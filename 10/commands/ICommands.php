<?php
abstract class ICommands{
    public $isremoved=false;
    abstract function exec();
}