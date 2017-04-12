<?php
$num = 442158755745;
$n = 5;
$count = 0;
$num = str_split((string)$num);
foreach ($num as $value) {
    if ($value == $n) {
        $count++;
    }
}
echo $count;
?>