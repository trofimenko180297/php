<?php
$a = 20;
settype($a, 'boolean');
var_dump($a);//true (false-0 | true-1) 20!=0
?>