<!---->
<?php
$f = fopen('test.txt', 'w');
fwrite($f,'1');
fclose($f);
for ($i=2; $i<=10; $i++){
    $str = '';
    $str .= $i . $i;
$f = fopen('test.txt','a');
fwrite($f, PHP_EOL.$str);
fclose($f);
}
?>
<!---->
<?php
function test(array $arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
test(array(1,2,3));
?>
<!---------->
<?php
function test_2 (array $a, $b = 'print_r'){
    echo '<pre>';
    $b($a);
    echo '</pre>';
}
test_2(array(1,2,3),'var_dump');
?>
<!------->
<?php
$test = [1, 2, 3];
function test_3 (array &$a){
    array_push($a,count($a));
}
test_3($test);
print_r($test);
?>
<!----------->
<?php
function is_simple($s){
    for ($i=2; $i<$s; $i++){
        $res = $s%$i;
        if ($res == 0){
            return false;
            break;
        }
    }
return true;
}
var_dump(is_simple(8));
?>