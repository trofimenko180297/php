<?php
function test($text){
    $arr = explode(".",$text);
    $result = [];
    foreach ($arr as $item){
        $item = trim($item,' ');
        $result[] = mb_strtoupper(mb_substr($item, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($item, 1, null,'UTF-8');
    }
    return implode(".",$result);
}
?>
<form action="" method="post">
    <input type="text" name="text" placeholder="text"><br/>
    <input type="submit">
</form>
<?php if (isset($_POST['text'])) { echo "Result:" . test($_POST['text']); } ?>

