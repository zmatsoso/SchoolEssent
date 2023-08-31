<?php
session_start();
$Zipho2=$_POST['holdData'];

$School_Name=$_SESSION['school_name'];
$Lebitso='Learning Area: '.$_POST['select_subject'].'';
$logo= $_SESSION['school_code'] .'.jpg';
$_SESSION['doc_name'] = $_POST['select_type'].': '.$_POST['select_class'].'-'.$_POST['select_subject'].'.pdf';
$html = '
<h1>' . $School_Name .'</h1>
<h2>' . $Lebitso . '</h2>
<p>' . $Zipho2 . '</p>

';


//==============================================================
//==============================================================
//==============================================================

include("../views/mpdf.php");

$mpdf=new mPDF('c'); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->SetWatermarkText('SCHOOLESSENTIALS');
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->showWatermarkText = true;
$mpdf->SetWatermarkImage('LOGO.jpg', 1, '', array(160,10));
$mpdf->showWatermarkImage = true;

$mpdf->WriteHTML('<h2>Summary: '. $_POST['select_type'].' - '. $_POST['select_class'].'</h2>');


$mpdf->WriteHTML($html);

$mpdf->SetWatermarkImage($logo, 1, '', array(160,10));
$mpdf->showWatermarkImage = true;


$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>