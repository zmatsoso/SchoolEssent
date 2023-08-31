<?php

include 'config.php';

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// data

$nu_educ_no = $_POST[nu_educ_no];
$nu_class_code = $_POST[nu_class_code];
$Log_date=date('Y-m-d');
$nu_subject=$_POST[nu_subject];

$nu_cm_details = $_POST[nu_cm_details];
$nu_school_code = $_POST[nu_school_code];

$nu_com_tel = $_POST[nu_com_tel];
$nu_com_profile = $_POST[nu_com_profile];

// first query

$sql = "INSERT INTO comments (profile,CellNo,Comment,educ_no,class_code,subject_code,school_code,log_date) 
VALUES (:profile,:CellNo,:Comment,:educ_no,:class_code,:subject_code,:school_code,:log_date)";

$q = $conn->prepare($sql);

$q->execute(array(':profile'=>$nu_com_profile,
				  ':CellNo'=>$nu_com_tel,
				  ':Comment'=>$nu_cm_details,
				  ':educ_no'=>$nu_educ_no,
				  ':class_code'=>$nu_class_code,
				  ':subject_code'=>$nu_subject,
				  ':school_code'=>$nu_school_code,
                  ':log_date'=>$Log_date));

?>


