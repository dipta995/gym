<?php
include 'Classes/idcardClass.php';
$idcard = new idcardClass();
 $orderid = $_GET['orderid'];
$value=$idcard->generateidcard($orderid);
 
   $name = "NAME :". $value['first_name']." ". $value['last_name']   ;
    $email = "EMAIL :". $value['email'];
    $dob = "DATE OF BIRTH :".$value['dob'];
    $gender = $value['gender'];
    $mob = "MOBILE NO :".$value['mobile'];
    $address = "ADDRESS :".$value['address'];
    $image = $value['image'];
    $start =  $value['created_at'];
     $exp=  date('Y-m-d', strtotime("+".$value['month']." months", strtotime($value['created_at'])));
     $daterange = "PACKAGE LENGTH :".$start. " To ".$exp;



$title= 'Gym Management System';
 
require('fpdf/fpdf.php');

$pdf = new FPDF('L','pt','A4'); 

//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 
$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("img/id.jpg", 20, 20, 780); 
$pdf->Image($image, 370, 100, 100); 
$pdf->SetFont('Arial','I',34); 
$pdf->SetXY(370,220); 
$pdf->Cell(50,10,$title,"A",0,'C',0); 
$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(370,250); 
$pdf->Cell(50,10,$name,"A",0,'C',0); 

$pdf->SetXY(370,270); 
$pdf->Cell(50,10,$email,"A",0,'C',0); 
$pdf->SetXY(370,290); 
$pdf->Cell(50,10,$mob,"A",0,'C',0); 
$pdf->SetXY(370,310); 
$pdf->Cell(50,10,$dob,"A",0,'C',0); 
$pdf->SetXY(370,330); 
$pdf->Cell(50,10,$daterange,"A",0,'C',0); 
$pdf->SetXY(370,350); 
$pdf->Cell(50,10,$address,"A",0,'C',0); 


$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(480,400); 
$signataire = ""; 
$pdf->Cell(150,19,$signataire,"B",0,'C'); 
$pdf->SetXY(480,420); 

$pdf->Cell(150,19,'Signature',"A",0,'C',0); 

$pdf->Output();
?>
