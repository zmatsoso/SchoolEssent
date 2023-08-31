<?php
	include("../config/table32.php");
	
 session_start();

$school_code = $_SESSION['school_code'];


$query='SELECT Name FROM educator_list WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" ';
$result=mysql_query($query);
?>

<select name="select_educator" id="select_educator">
<option>Select Educator</option>
<?php while($row=mysql_fetch_array($result)) { ;?>
<option value=<?php echo $row['Name']; ?>><?php echo $row['Name']; ?></option>
<?php } ;?>
</select>