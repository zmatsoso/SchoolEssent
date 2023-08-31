<?php

	include("../config/table32.php");

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// data

$Log_date=date('Y-m-d');

$nu_request = $_POST[nu_request];
$nu_ord_school_name = $_POST[nu_ord_school_name];
$nu_ord_emis=$_POST[nu_ord_emis];
$nu_ord_requester_name = $_POST[nu_ord_requester_name];
$nu_ord_requester_no = $_POST[nu_ord_requester_no];
$status=0;
$nu_no_educs = $_POST[nu_no_educs];
$nu_data_source = $_POST[nu_data_source];
$nu_product_type = $_POST[nu_product_type];
$req_source = "web";
// first query

$sql = "INSERT INTO orders (request_id,school_name,emis,req_name,req_no,status,no_educs,data_source,product_type,log_date,req_source) 
VALUES (:request_id,:school_name,:emis,:req_name,:req_no,:status,:no_educs,:data_source,:product_type,:log_date,:req_source)";

$q = $conn->prepare($sql);

$q->execute(array(':request_id'=>$nu_request,
				  ':school_name'=>$nu_ord_school_name,
				  ':emis'=>$nu_ord_emis,
				  ':req_name'=>$nu_ord_requester_name,
				  ':req_no'=>$nu_ord_requester_no,
				  ':status'=>$status,
				  ':no_educs'=>$nu_no_educs,
				  ':data_source'=>$nu_data_source,
				  ':product_type'=>$nu_product_type,
                 ':log_date'=>$Log_date,
                 ':req_source'=>$req_source));

?>


