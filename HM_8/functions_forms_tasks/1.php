<?php
function getCommonWords($a, $b){
    $words_1 = explode(" ", $a);
    $words_2 = explode(" ", $b);
    $result = array();
    foreach ($words_1 as $item){
        $item = trim($item,' .,');
        foreach ($words_2 as $item_2){
            $item_2 = trim($item_2,' .,');
            if ($item == $item_2){
                $result[] = $item;
            }
        }
    }
    return $result;
}
?>
<form action="" method="post">
    <textarea placeholder="text1" name="text1"></textarea><br/><br/>
    <textarea placeholder="text2" name="text2"></textarea><br/><br/>
    <input type="submit">
</form>
<?php if ($_POST) { ?>Однакові слова:<?php echo '<pre>';print_r(getCommonWords($_POST['text1'], $_POST['text2']));echo '</pre>'; }?>


