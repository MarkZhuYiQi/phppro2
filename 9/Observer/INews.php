<?php
interface INews{
    function regPlug(IPlugins $plug);
    function unregPlug(IPlugins $plug);
}