<?php
include 'Classes/IdcartClass.php';
$idcart = new IdcartClass();
 $orderid = $_GET['orderid'];
$value=$idcart->generateidcart($orderid);
 
   $name = $value['first_name']." ". $value['last_name']   ;
    $email =  $value['email'];
    $dob = $value['dob'];
    $gender = $value['gender'];
    $mob = $value['mobile'];
    $address = $value['address'];
    $image = "admin/".$value['image'];

  
   
    // echo "<br>";
    // echo "Package: ".$value['pack_name'];
    // echo "<br>";
    // echo "total Month:".$value['month'];
    // echo "<br>";
    // echo "Expair At: ".$effectiveDate = date('Y-m-d', strtotime("+".$value['month']." months", strtotime($value['created_at'])));
 


$title= 'Gym Management System';
 
require('fpdf/fpdf.php');

$pdf = new FPDF('L','pt','A4'); 

//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("img/id.jpg", 20, 20, 780); 
// Print the certificate logo  
/*$pdf->Image("fpdf182/tt1.png", 140, 180, 240); */
// Print the title of the certificate  
/*$pdf->SetFont('times','B',80); 
$pdf->Cell(720+10,200,"CERTIFICATE",0,0,'C'); */
 $pdf->Image($image, 100, 100, 100); 

$pdf->SetFont('Arial','I',34); 
$pdf->SetXY(370,220); 

$pdf->Cell(100,150,$name,"A",0,'C',0); 


$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(200,380); 
 
$pdf->Cell(420,10,$title,"A",0,'C',0); 

$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(200,450); 
$date = date("Y/m/d"); 
$pdf->Cell(420,10,$date,"A",0,'C',0); 






$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(480,470); 
$signataire = "BD GYM"; 
$pdf->Cell(150,19,$signataire,"B",0,'C'); 




$pdf->Output();
?>
