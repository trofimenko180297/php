<?php
$arr = [];
for ($i=0; $i<=rand(1, 10); $i++){
    $arr[] = rand(1,1000);
}
$max = max($arr);
$min = min($arr);
print_r($arr);
foreach ($arr as $key => $value){
    if ($value == $max){
        $arr[$key] = $min;
    }elseif ($value == $min){
        $arr[$key] = $max;
    }
}
print_r($arr);
?>