<?php
function test($dir){
    if (scandir($dir)) {
        return scandir($dir);
    }else{
        return 'Wrong directory!';
    }
}
if ($_POST){
    echo '<pre>';
    print_r(test($_POST['dir']));
    echo '</pre>';
}
?>
<form action="" method="post">
    <input placeholder="directory" type="text" name="dir">
    <input type="submit">
</form>
