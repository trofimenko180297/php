<?php
if (isset($_POST['name'])){
    echo '<pre>';
    print_r($_POST);
    echo '<pre/>';
}elseif(isset($_POST['username'])){
    echo '<pre>';
    print_r(serialize($_POST));
    echo '<pre/>';
}elseif(isset($_POST['x'])){
    $ost = $_POST['x']%2;
    $result =  $ost == 0 ?  true : false;
}
?>

<?php if (!$_POST) {?><form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br/>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br/>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone"><br/>
    <input type="submit">
</form>
<hr/>
<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br/>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br/>
    <label for="message">Message:</label>
    <input type="text" id="message" name="message"><br/>
    <input type="submit">
</form><?php } ?>
<hr/>
<?php
$sec = 365 * 24 * 3600;
$ost = $sec%2;
echo "Seconds:{$sec}<br/>Ostatok:{$ost}";
?>
<hr/>
<?php
$str = (string) 1 . 2 . 3 . 4 . 5;
var_dump($str);
?>
<hr/>
<?php
var_dump(false && true || false && true || !false && true);
?>
<form action="" method="post">
<input type="number" name="x" placeholder="Variable X">
<input type="submit" value="Calculate">
</form>Divided evenly:<?php if (isset($result)) { var_dump($result); } ?>
<hr/>
<?php
$a = 10;
$b = 15;
echo "Before: a:{$a}, b:{$b} <br/>";
$a += $b;
$b = $a - $b;
$a -= $b;
echo "After: a:{$a}, b:{$b}";
?>
<hr/>
<?php
$a = 5;
$b = 7;
$max = $a>$b ? $a : $b;
echo "Max:{$max}";
?>
<hr/>
<?php
$a = 30;
$b = 60;
$res = $a>$b;
switch ($res){
    case true: echo "Max:{$a}"; break;
    case false: echo "Max:{$b}"; break;
}
?>
<hr/>
<?php
for ($i=1; $i<=100; $i++){
    for ($k=3; $k<$i; $k++){
        $test = null;
        $t = $i%$k;
        if ($t == 0){
            break;
        }
        $test = 1;
    }
if (isset($test)){
        echo "Simple:{$i}<br/>";
}
}
?>
<hr/>
<?php
$i_2=4;
while ($i_2<=100) {
    $k_2 = 3;
    while ($k_2 < $i_2) {
        $test_2 = null;
        $t_2 = $i_2%$k_2;
        if ($t_2 == 0){
            break;
        }
        $test_2 = 1;
    $k_2++;
    }
if (isset($test_2)){
        echo "Simple:{$i_2}<br/>";
}
$i_2++;
}
?>
<hr/>
<?php
$arr = [1,2,3,4,5,6,7,8,9,10];
foreach ($arr as $item){
    if ($item%3 == 0){
        echo "It's:{$item}<br/>";
    }
}
?>
<hr/>
<?php
foreach ($arr as $item):
    if ($item%3 == 0){
        echo "It's:{$item}<br/>";
    }
endforeach;
?>
<hr/>
<?php
for ($i=200; $i<=400; $i++){
    for ($k=3; $k<$i; $k++){
        $test = null;
        $t = $i%$k;
        if ($t == 0){
            break;
        }
        $test = 1;
    }
    if (isset($test)){
        echo "First_simple:{$i}<br/>";
        break;
    }
}
?>
<hr/>
