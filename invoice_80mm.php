<?php


//Call the PDF library
require('fpdf/fpdf.php');

include_once 'connectdb.php';

$id = $_GET['id'];
$select = $pdo->prepare("select * from tbl_invoice where invoice_id =$id");
$select->execute();
$row = $select->fetch(PDO::FETCH_OBJ);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm',array(80,200));

//add new page
$pdf->AddPage();
//Cell(width, height, text, border, end line, [align])
$pdf->SetFont('Arial','B',16);
//Cell(width, height, text, border, end line, [align])
$pdf->Cell(60,8,'VPANO ONE',1,1,'C');

$pdf->SetFont('Arial','B',8);

$pdf->Cell(60,5,'Address : Khatathorn Rd, Ratchaburi - TH',0,1,'C');
$pdf->Cell(60,5,'Phone Number : 66818546830',0,1,'C');
$pdf->Cell(60,5,'E-mail Address : Boonruangs@gmail.com',0,1,'C');
$pdf->Cell(60,5,'Website : www.vpano360.com',0,1,'C');

//Line(x1,y1,x2,y2);

$pdf->Line(7,38,72,38);

$pdf->Ln(1); // line break

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Bill To :',0,0,'');

$pdf->SetFont('Courier','BI',8);
$pdf->Cell(40,4,$row->customer_name,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Invoice no :',0,0,'');

$pdf->SetFont('Courier','BI',8);
$pdf->Cell(40,4,$row->invoice_id,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Date :',0,0,'');

$pdf->SetFont('Courier','BI',8);
$pdf->Cell(40,4,$row->order_date,0,1,'');


$pdf->Output();

?>