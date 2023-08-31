<?php
	include("../config/table32.php");
	
 session_start();

$school_code = $_SESSION['school_code'];
$ma_class=$_GET['ma_class'];
$ma_subject=$_GET['ma_subject'];
$fullName="";
$query='SELECT * FROM learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" and ClassCode="'. mysql_real_escape_string($ma_class) .'" and Subject="'. mysql_real_escape_string($ma_subject) .'"';
$result=mysql_query($query);
?>

<select name="select_learner1" id="select_learner1" onchange="get_learner()">
<option>Select Learner</option>
<?php while($row=mysql_fetch_array($result)) { ;
$fullName=$row['LearnerSurname'].' '.$row['LearnerName'];;
?>
<option value=<?php echo $row['id']; ?>><?php echo $fullName; ?></option>
<?php } ;?>
</select>
