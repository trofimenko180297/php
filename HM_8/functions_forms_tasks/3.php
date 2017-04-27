<?php
function test($n)
{
    $str = file_get_contents('3.txt');
    $arr = explode(' ', $str);
    foreach ($arr as $key => $item) {
        if (strlen($item) > $n){
            unset($arr[$key]);
        }
    }
    $new = implode(' ', $arr);
    file_put_contents('3.txt',$new);
}
if ($_POST){
    test($_POST['N']);
}
?>
<form action="" method="post">
    <input placeholder="length" type="number" name="N">
    <input type="submit">
</form>
