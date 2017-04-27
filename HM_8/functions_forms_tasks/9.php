<?php
function reverse($a){
    $a = strrev($a);
    return $a;
}
?>
<form action="" method="post">
    <input type="text" name="text" placeholder="text"><br/>
    <input type="submit">
</form>
<?php if (isset($_POST['text'])) { echo "Result:" . reverse($_POST['text']); } ?>
