<?php
$a = array('UA','RU','EN','UK','CN');
echo '<pre>';
print_r($a);
echo '</pre>';

$b = array('UA' => 'Kiev','RU' => 'Moscow','EN' => 'washington','UK' => 'London','CN' => 'Pekin');
echo '<pre>';
print_r($b);
echo '</pre>';

$c = array('book_1' => array('style' => 'info', 'author' => 'info', 'name' => 'info', 'price' => '20$'),
    'book_2' => array('style' => 'info', 'author' => 'info', 'name' => 'info', 'price' => '20$'),
    'book_3' => array('style' => 'info', 'author' => 'info', 'name' => 'info', 'price' => '20$'));
echo '<pre>';
print_r($c);
echo '</pre>';

define('UA', 'UA');
define('UK', 'UK');
$d = array(UA, UK);
echo '<pre>';
print_r($d);
echo '</pre>';

$hello = 'a';
$a = 'b';
$b = 'c';
$c = 'd';
$d = 'Hello World!';
echo $$$$$hello;
?>