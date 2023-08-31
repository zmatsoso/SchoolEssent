<?php
session_start();
$Zipho2=$_POST['holdData1'];

$School_Name=$_SESSION['school_name'];
$Lebitso='Learner Class: '.$_POST['select_class1'].'';
$logo= $_SESSION['school_code'] .'.jpg';
$_SESSION['doc_name'] = 'Register: '.$_POST['select_class1'].'-'.$_POST['select_learner1'].'.pdf';
$html = '
<h1>' . $School_Name .'</h1>
<h2>' . $Lebitso . '</h2>
<p>' . $Zipho2 . '</p>

<hr />


';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF('c'); 

$mpdf->SetDisplayMode('fullpage');

$mpdf->SetWatermarkText('SCHOOLESSENTIALS');
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->showWatermarkText = true;
$mpdf->SetWatermarkImage('LOGO.jpg', 1, '', array(160,10));
$mpdf->showWatermarkImage = true;

$mpdf->WriteHTML('<h2>Summary for:'. $_POST['select_learner1'].'</h2>');


$mpdf->WriteHTML($html);

$mpdf->SetWatermarkImage($logo, 1, '', array(160,10));
$mpdf->showWatermarkImage = true;


$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>