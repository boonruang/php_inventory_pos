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

//Line(x1,y1,x2,y2);

$pdf->Line(5,45,205,45);
$pdf->Line(5,46,205,46);

$pdf->Ln(10); // line break

$pdf->SetFont('Arial','BI',12);
$pdf->Cell(20,10,'Bill To :',0,0,'');

$pdf->SetFont('Courier','BI',14);
$pdf->Cell(50,10,'Boonruang Seedapunt',0,1,'');

$pdf->Cell(50,5,'',0,1,'');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'PRODUCT',1,0,'C',true); //190
$pdf->Cell(20,8,'QTY',1,0,'C',true);; 
$pdf->Cell(30,8,'PRICE',1,0,'C',true);
$pdf->Cell(40,8,'TOTAL',1,1,'C',true);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Iphone 14',1,0,'L'); //190
$pdf->Cell(20,8,'1',1,0,'C');; 
$pdf->Cell(30,8,'900',1,0,'C');
$pdf->Cell(40,8,'900',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Iphone 14 Pro Max',1,0,'L'); //190
$pdf->Cell(20,8,'1',1,0,'C');; 
$pdf->Cell(30,8,'1100',1,0,'C');
$pdf->Cell(40,8,'1100',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Macbook Pro',1,0,'L'); //190
$pdf->Cell(20,8,'1',1,0,'C');; 
$pdf->Cell(30,8,'1200',1,0,'C');
$pdf->Cell(40,8,'1200',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Redmi Note',1,0,'L'); //190
$pdf->Cell(20,8,'1',1,0,'C');; 
$pdf->Cell(30,8,'600',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Hard Disk',1,0,'L'); //190
$pdf->Cell(20,8,'2',1,0,'C');; 
$pdf->Cell(30,8,'300',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Hard Disk 2.5"',1,0,'L'); //190
$pdf->Cell(20,8,'2',1,0,'C');; 
$pdf->Cell(30,8,'300',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Hard Disk 3.5"',1,0,'L'); //190
$pdf->Cell(20,8,'2',1,0,'C');; 
$pdf->Cell(30,8,'300',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'SubTotal',1,0,'C',true);
$pdf->Cell(40,8,'6000',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'Tax',1,0,'C',true);
$pdf->Cell(40,8,'60',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'Discount',1,0,'C',true);
$pdf->Cell(40,8,'30',1,1,'C');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'GrandTotal',1,0,'C',true);
$pdf->Cell(40,8,'$'.'6600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'Paid',1,0,'C',true);
$pdf->Cell(40,8,'7000',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'Due',1,0,'C',true);
$pdf->Cell(40,8,'400',1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,8,'',0,0,'L'); //190
$pdf->Cell(20,8,'',0,0,'C');; 
$pdf->Cell(30,8,'Payment Type',1,0,'C',true);
$pdf->Cell(40,8,'Cash',1,1,'C');

$pdf->Cell(50,10,'',0,1,'');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(32,10,'Important Notice:',0,0,'L',true); 

$pdf->SetFont('Arial','',8);
$pdf->Cell(148,10,'Hello Friends, I tried again n again but I believe I am lost. My data is not saving into database. When I click on Save',0,0,''); 



//output the result
$pdf->Output();


?>