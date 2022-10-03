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
//$pdf->SetFillColor(123,255,234);
$pdf->SetFont('Arial','B',16);
//Cell(width, height, text, border, end line, [align])
$pdf->Cell(80,10,'VPANO ONE',0,0,'');

$pdf->SetFont('Arial','B',13);
$pdf->Cell(112,10,'INVOICE',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Address : Khatathorn Rd, Ratchaburi - TH',0,0,'');

$pdf->SetFont('Arial','',10);
$pdf->Cell(112,5,'Invoice : #12525',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Phone Number : 66818546830',0,0,'');

$pdf->SetFont('Arial','',10);
$pdf->Cell(112,5,'Date : 04-10-2022',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'E-mail Address : boonruangs@gmail.com',0,1,'');
$pdf->Cell(80,5,'Website : www.vpano360.com',0,1,'');



//output the result
$pdf->Output();


?>