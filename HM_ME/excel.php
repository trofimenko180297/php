<?php
require ('vendor/autoload.php');
require ('db.class.php');

//db connect
try{
    $db = new DB('localhost', 'root', '', 'classicmodels');
}catch (Exception $e){
    echo $e;
}

//get data from db
$query = "select productName,buyPrice from products limit 10";
$data = $db->query($query);

//PHPExcel
$excel = new PHPExcel();

$excel->getProperties()->setCreator('Vitaliy Trofimenko')
                       ->setTitle('Home work')
                       ->setSubject('PHPExcel')
                       ->setDescription('Home work from php academy')
                       ->setKeywords('php excel');

//set column title
$excel->setActiveSheetIndex(0)->setCellValue('A1','Product Name')
                              ->setCellValue('B1','Price ( $ )');

//set background color
$excel->getActiveSheet()->getStyle('A1:B1')
                        ->getFill()
                        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                        ->getStartColor()->setRGB('FFB7B7');

//insert data
foreach ($data as $product){
    static $i = 2;
    $excel->setActiveSheetIndex(0)->setCellValue("A{$i}",$product['productName'])
                                  ->setCellValue("B{$i}",$product['buyPrice']);
//set background color
    $excel->getActiveSheet()->getStyle("A{$i}:B{$i}")
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('B7FFD2');

//set border
    $excel->getActiveSheet()->getStyle("A{$i}:B{$i}")
                            ->getBorders()->getAllBorders()
                            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                            ->getColor()->setRGB('DC1111');
    $i++;
}

//save excel file
$excel_write = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$excel_write->save(str_replace('.php','.xlsx',__FILE__));