<?php
function test($dir, $name){
    $a = scandir($dir);
    $result = [];
    foreach ($a as $item){
       $b = explode(" ",$item);
       foreach ($b as $word){
           if ($word == $name){
               $result[] = $item;
           }
       }
    }
    if (!empty($result)){
        return $result;
    }else{
        return 'File not found!';
    }
}
if ($_POST){
    echo '<pre>';
    print_r(test($_POST['dir'],$_POST['name']));
    echo '</pre>';
}
?>
<form action=" " method="post">
    <label for="dir">Directory:</label>
    <input type="text" name="dir" id="dir"><br/>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br/>
    <input type="submit">
</form>

