<?php
$colors = array('red','yellow','blue','gray','maroon','brown','green');
if ($_POST){
    $row = $_POST['row'];
    $col = $_POST['cols'];
}
?>
<form action="" method="post">
    <input type="number" name="row" placeholder="rows">
    <input type="number" name="cols" placeholder="cols">
    <input type="submit">
</form>
<?php if (isset($col) && isset($row)) { ?>
<table>
    <?php for ($i=1; $i<=$row; $i++) { ?>
        <tr><?php for ($k=1; $k<=$col; $k++) { ?><td style="background-color: <?=$colors[rand(0,6)]?>"><?=rand(1,1000)?></td><?php } ?></tr>
    <?php } ?>
</table>
<?php } ?>