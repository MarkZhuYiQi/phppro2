<?php
require('./reader.php');
require('./newspaper.php');
$mark=new reader('mark');
$zhu=new reader('zhu');
$red=new reader('red');
$newspaper=new newspaper('NEWYORK TIMES');
$newspaper->attach($mark);
$newspaper->attach($zhu);
$newspaper->attach($red);
$newspaper->breakOutNews('USA break down');