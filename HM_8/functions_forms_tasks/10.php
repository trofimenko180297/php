<?php
function test($text){
    $arr = explode(" ", $text);
    $result = [];
    $count = 0;
    foreach ($arr as $word_1){
        $c = 0;
        foreach ($arr as $word_2){
            if ($word_1 == $word_2){
                $c++;
            }
        }
        if ($c == 1){
            $count++;
        }
    }
    return $count;
}
?>
<form action="" method="post">
    <input type="text" name="text" placeholder="text"><br/>
    <input type="submit">
</form>
<?php if (isset($_POST['text'])) { echo "Result:" . test($_POST['text']); } ?>