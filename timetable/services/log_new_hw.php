<?php

include 'config.php';

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// data

$nu_educ_no = $_POST[nu_educ_no];
$nu_class_code = $_POST[nu_class_code];
$Log_date=date('Y-m-d');
$nu_subject=$_POST[nu_subject];
$nu_due_date=$_POST[nu_due_date];
$nu_hw_details = $_POST[nu_hw_details];
$nu_school_code = $_POST[nu_school_code];
$fk_Request_ID="";
$strtotime = strtotime($nu_due_date);

// first query

$sql = "INSERT INTO homeworks (date_issued,date_due,strtotime,school_code,subject,class_code,edu_no,details) 
VALUES (:date_issued,:date_due,:strtotime,:school_code,:subject,:class_code,:edu_no,:details)";

$q = $conn->prepare($sql);

$q->execute(array(':date_issued'=>$Log_date,
				  ':date_due'=>$nu_due_date,
				  ':strtotime'=>$strtotime,
				  ':school_code'=>$nu_school_code,
				  ':subject'=>$nu_subject,
				  ':class_code'=>$nu_class_code,
				  ':edu_no'=>$nu_educ_no,
                  ':details'=>$nu_hw_details));

?>


