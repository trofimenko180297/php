<?php
$age = 20;
if (18<=$age && $age<=59){
    echo "Вам еще работать и работать";
}elseif($age>59){
    echo "Вам пора на пенсию";
}elseif(0<$age && $age<=17){
    echo "Вам еще рано работать";
}else{
    echo "Неизвестный возраст";
}
?>