<?php
function test($a){
    $arr = explode(" ", $a['words']);
    $result = '';
    $length = [];
    if (isset($arr[0]) && isset($arr[1]) && isset($arr[2])) {
        foreach ($arr as $item_1) {
            trim($item_1,' ,.');
            $length[] = mb_strlen($item_1);
        }
        arsort($length);
        $test = array_keys($length);
        for ($i=0;$i<3;$i++){
            $result .= trim($arr[$test[$i]], ' ,.') . ' ';
        }
        return $result;
    }else{
        return 'Менше ніж 3 слова!';
    }
}
?>
<form action="" method="post">
    <textarea placeholder="text" name="words"></textarea><br/>
    <input type="submit">
</form>
<?php if ($_POST) { ?>ТОП 3 довгі слова:<?php echo '<pre>';print_r(test($_POST));echo '</pre>'; }?>