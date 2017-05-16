<?php
if (isset($_POST['color'])){
    setcookie('color',$_POST['color']);
}
function color()
{
    if (isset($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
        return $color;
    }else{
        return false;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3</title>
</head>
<body>
<div>
    <form method="post" action="">
        <label for="color">Color:</label>
        <select name="color" id="color">
            <option <?php if (color() == 'Blue') { ?>selected="selected"<?php } ?>>Blue</option>
            <option <?php if (color() == 'Green') { ?>selected="selected"<?php } ?>>Green</option>
            <option <?php if (color() == 'Red') { ?>selected="selected"<?php } ?>>Red</option>
            <option <?php if (color() == 'Yellow') { ?>selected="selected"<?php } ?>>Yellow</option>
        </select>
        <input type="submit">
    </form>
</div>
<div>
<?php if (isset($_POST['color'])) { ?>
    <p style="color: <?=$_POST['color']?>">Lorem Ipsum</p>
<?php }elseif (color()) { ?>
    <p style="color: <?=color()?>">Lorem Ipsum</p>
<?php } ?>
</div>
</body>
</html>
