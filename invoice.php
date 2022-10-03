<?php


//Call the PDF library
require('fpdf/fpdf.php');


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');

//string orientation (P or L) - portrait or landscape
//string unit (pt,mm,cm and in) - measure unit
//Mixed format (A3, A4, A5, Letter and Legal) - format of pages


//add new page

$pdf->AddPage();

//output the result
$pdf->Output();


?>