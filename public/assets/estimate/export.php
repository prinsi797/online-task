<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'excel/Classes/');
include 'PHPExcel/IOFactory.php';
$doc = new PHPExcel();
$doc->setActiveSheetIndex(0);



$sheet=json_decode($_POST['param'],true)['table_data'];

$doc->getActiveSheet()->fromArray($sheet, null, 'A1');
$doc->getActiveSheet()
    ->getStyle('A1:E1')
    ->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '7cbdb7')
            )
        )
    );


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');	
header('Content-Disposition: attachment;filename="'.$_POST['prefix'].'_estimation.xlsx"');
header('Cache-Control: max-age=0');

  // Do your stuff here
$writer = PHPExcel_IOFactory::createWriter($doc, 'Excel5');
$writer->save('php://output');