<?php
$s = 60; //km
$t = 2; //hr

$v_1 = $s/$t;
$v_2 = ($s*1000)/($t*3600);

echo "km/hr : {$v_1}";
echo "m/s : {$v_2}";
?>