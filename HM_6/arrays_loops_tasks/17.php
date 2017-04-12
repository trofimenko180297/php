<?php
$arr = ['Березень', 'Квітень', 'Травень'];
$month = 'Квітень';
foreach ($arr as $value){
    if ($value == $month){
        echo "<b>{$value}</b><br>";
    }else{
        echo $value .'<br>';
    }
}
?>