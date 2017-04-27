<?php
if ($_POST) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $operator = $_POST['operator'];
    if ($operator == '+') {
        $result = $a + $b;
    }elseif ($operator == '-'){
        $result = $a - $b;
    }elseif ($operator == '*'){
        $result = $a * $b;
    }elseif ($operator == '/' && $b != 0){
        $result = $a / $b;
    }elseif ($operator == '%' && $b !=0){
        $result = $a % $b;
    }else{
        $result = 'На 0 делить нельзя!';
    }
}
?>
<form action="" method="post">
    <label for="a">a:</label>
    <input id="a" type="number" name="a"><br/>
    <label for="b">b:</label>
    <input id="b" type="number" name="b"><br/>
    <label for="operator">operator:</label>
    <select name="operator" id="operator">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>%</option>
    </select><br/>
    <input type="submit" value="calculate"><br/>
</form>
<?php if (isset($result)) {?>Result: <?php echo $result;}?>

