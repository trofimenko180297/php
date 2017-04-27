<?php
$arr = [];
$res = 1;
for ($i=0; $i<=rand(1,20); $i++){
    $arr[] = rand(1,100);
}
foreach ($arr as $key => $value){
    if ($value>0 && $key%2 == 0){
        $res *= $value;
    }elseif ($value>0 && $key%2 != 0){
        echo $value .'<br>';
    }
}
?>