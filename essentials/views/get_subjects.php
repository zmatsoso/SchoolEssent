<?php
	include("../config/table32.php");
	
 session_start();

$school_code = $_SESSION['school_code'];
$ma_class=$_GET['ma_class'];

$query='SELECT Distinct Subject FROM learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" and ClassCode="'. mysql_real_escape_string($ma_class) .'"';
$result=mysql_query($query);
?>

<select name="select_subject" id="select_subject" onchange="get_learn_class()">
<option>Select Subject</option>
<?php while($row=mysql_fetch_array($result)) { ;?>
<option value=<?php echo $row['Subject']; ?>><?php echo $row['Subject']; ?></option>
<?php } ;?>
</select>
