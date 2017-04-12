<?php
$arr = [4, 2, 5, 19, 13, 0, 10];
$e = [2, 3, 4];
foreach ($e as $number){
    if(in_array($number,$arr)){
        echo 'Есть!<br>';
    }else{
        echo 'Нет!<br>';
    }
}
?>