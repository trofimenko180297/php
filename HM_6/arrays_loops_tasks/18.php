<?php
$arr = ['Субота','Неділя','Понеділок','Вівторок'];
$day_1 = 'Субота';
$day_2 = 'Неділя';
foreach ($arr as $day){
    if ($day == $day_1 || $day == $day_2){
        echo "<b>{$day}</b><br>";
    }else{
        echo $day .'<br>';
    }
}
?>