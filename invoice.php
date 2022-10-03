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

//$pdf->Cell();
//$pdf->SetFont('Arial','BIU',16);
$pdf->SetFillColor(123,255,234);
$pdf->SetFont('Arial','',16);
//$pdf->Cell(80,10,'Hello world',1,0,'C',false,'https://www.vpano360.com');
$pdf->Cell(80,10,'Hello world1',1,1,'C',true);
$pdf->Cell(80,10,'Hello world2',1,1,'C',true);
$pdf->Cell(80,10,'Hello world3',1,0,'C',true);

//output the result
$pdf->Output();


?>