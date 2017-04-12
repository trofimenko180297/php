<?php
$arr = ['Субота','Неділя','Понеділок','Вівторок'];
$day_1 = 'Вівторок';
foreach ($arr as $day){
    if ($day == $day_1){
        echo "<i>{$day}</i><br>";
    }else{
        echo $day .'<br>';
    }
}
?>