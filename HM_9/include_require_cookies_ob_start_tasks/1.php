<?php
function validation($data)
{
    if (!empty($data['name']) && !empty($data['number']) && !empty($data['message'])){
        return true;
    }else{
        return false;
    }
}
function check_cookie()
{
    if (!isset($_COOKIE['user_form'])){
        setcookie("user_form",0);
    }elseif (isset($_COOKIE['user_form'])){
        $count = ++$_COOKIE['user_form'];
        setcookie("user_form", $count, time() + 60);
    }
    return $_COOKIE['user_form'];
}
if (isset($_POST['form'])){
    if (validation($_POST)) {
        $msg = '';
        if (check_cookie() <= 3) {
            //here code to work with message
            $msg = 'Your message was send!';
        } else {
            $msg = 'You was send more 3 message for minute!';
        }
    }else{
        $msg = 'Empty fields!';
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
    <title>1</title>
</head>
<body>
<div>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br/><br/>
        <label for="number">Mobile:</label>
        <input type="number" id="number" name="number"><br/><br/>
        <textarea placeholder="Message" name="message"></textarea><br/><br/>
        <input type="submit" name="form">
    </form>
</div>
<div>
    <?php if (isset($msg)) { ?><h3><?=$msg?></h3><?php } ?>
</div>
</body>
</html>
