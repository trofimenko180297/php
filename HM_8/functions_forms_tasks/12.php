<?php
$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
function test($str){
    $arr = explode(" ", $str);
    $result = array();
    foreach ($arr as $fruit){
        $result[$fruit]=0;
    }
    foreach ($arr as $fruit){
        $result[$fruit]++;
    }
    return $result;
}
echo '<pre>';
print_r(test($string));
echo '</pre>';
?>