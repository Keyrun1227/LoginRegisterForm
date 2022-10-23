<?php

require_once 'FPDF/fpdf.php';
require_once 'config.php';
$query="select * from user_form";

$result=mysqli_query($conn,$query); 
session_start();
if(!isset($_SESSION['admin_name'])){
	header('location:login_form.php');
}

  $pdf= new FPDF('p','mm','a4');
  $pdf->SetFont('arial','b','14');
  $pdf->AddPage();
  $pdf->cell('192','10',"Registeration Details" ,'1','1','C');
  $pdf->cell('15','10','ID', '1','0','C');
  $pdf->cell('52','10','Name', '1','0','C');
  $pdf->cell('90','10','Email', '1','0','C');
  $pdf->cell('35','10','User-Type', '1','1','C');

  $pdf->SetFont('arial','','12');
  //$pdf->Output();
  while($k=mysqli_fetch_array($result))
  {
    $pdf->SetFont('arial','b','14'); 
    $pdf->cell('15','10',$k['id'], '1','0','c');
    $pdf->cell('52','10',$k['name'], '1','0','C');
    $pdf->cell('90','10',$k['email'], '1','0','C');
    $pdf->cell('35','10',$k['user_type'], '1','1','C');
  }
   $pdf->Output();
?>