<?php
include 'config.php';

$school_code = $_GET['school_code'];
$subject = $_GET['subject'];
$class_code = $_GET['class_code'];
$status=0;

$todays_date = date("Y-m-d");
$today = strtotime($todays_date);


$class_id="";

$result=mysql_query('select `id` from homeworks WHERE ((strtotime="'. mysql_real_escape_string($today) .'")or(strtotime<"'. mysql_real_escape_string($today) .'")) AND status="'. mysql_real_escape_string($status) .'" AND school_code="'. mysql_real_escape_string($school_code) .'" AND subject="'. mysql_real_escape_string($subject) .'" AND class_code="'. mysql_real_escape_string($class_code) .'" ORDER BY date_due ASC');
			while($row=mysql_fetch_array($result)){
				$class_id=$row['id'];
}


$sql = "SELECT * FROM  homeworks where id=$class_id";


try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	$stmt->bindParam("id", $class_id);
	$stmt->execute();
	$employee = $stmt->fetchObject();  
	$dbh = null;
	echo '{"item":'. json_encode($employee) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>

