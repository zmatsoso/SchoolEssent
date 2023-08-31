<?php
	include("../config/table32.php");
	
 session_start();

$school_code = $_SESSION['school_code'];


$query='SELECT SubGrade FROM class_list WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" ';
$result=mysql_query($query);
?>

<select name="select_class" id="select_class" onchange="get_subjects()">
<option>Select Class</option>
<?php while($row=mysql_fetch_array($result)) { ;?>
<option value=<?php echo $row['SubGrade']; ?>><?php echo $row['SubGrade']; ?></option>
<?php } ;?>
</select>
