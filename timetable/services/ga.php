<?php
include 'config.php';

$school_code = $_GET['school_code'];
$subject = $_GET['subject'];
$class_code = $_GET['class_code'];


$sql = 'SELECT * FROM  learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND Subject="'. mysql_real_escape_string($subject) .'" AND ClassCode="'. mysql_real_escape_string($class_code) .'"';

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

