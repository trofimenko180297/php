<?php
if ($_POST){
    $num = str_split((string)$_POST['number']);
    $result = array_sum($num);
}
?>
<form action="" method="post">
    <input type="number" name="number" placeholder="number">
    <input type="submit">
</form>
<?php if (isset($result)) {?>Result:<?=$result?><?php } ?>