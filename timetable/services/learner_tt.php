<?php
include 'config.php';

$school_code = $_GET['school_code'];
$day_no = $_GET['day_no'];
$class_code = $_GET['class_code'];

$class_id="";
$result=mysql_query('select `id` from classes WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND DayNo="'. mysql_real_escape_string($day_no) .'" AND Groupcode="'. mysql_real_escape_string($class_code) .'"');
			while($row=mysql_fetch_array($result)){
				$class_id=$row['id'];
				
}


$sql = "SELECT * FROM  classes where id=$class_id";
//$sql = "SELECT * FROM  classes where SchoolCode=$school_code and DayNo=$day_no and Groupcode=$class_code";

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->query($sql);  
	$schools = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($schools) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>