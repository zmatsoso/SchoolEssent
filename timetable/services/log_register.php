<?php

include 'config.php';

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// data

$Log_date=date('Y-m-d H:i:s');
$Log_by = $_POST[nu_educ_no];
$current_period=$_POST[nu_current_period];
$GuardianNo="";
$school_code="";
$LearnerName="";
$LearnerSurname="";
$Subject="";
$Late="";
$Absent="";
$Present="";
$Nu_late="";
$Nu_Absent="";
$Nu_Present="";
$Block_SMS="";
$Register_Marked="";
$Nu_Register_Marked="";
$Nu_Attend_Code="";
$Attend_Code="";

// q1 ###################################################################################################
if($_POST[nu_a1]>0){
$LearnerNo = $_POST[nu_q1];
$Offence_code = $_POST[nu_a1];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q2 ###################################################################################################
if($_POST[nu_a2]>0){
$LearnerNo = $_POST[nu_q2];
$Offence_code = $_POST[nu_a2];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q3 ###################################################################################################
if($_POST[nu_a3]>0){
$LearnerNo = $_POST[nu_q3];
$Offence_code = $_POST[nu_a3];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q4 ###################################################################################################
if($_POST[nu_a4]>0){
$LearnerNo = $_POST[nu_q4];
$Offence_code = $_POST[nu_a4];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q5 ###################################################################################################
if($_POST[nu_a5]>0){
$LearnerNo = $_POST[nu_q5];
$Offence_code = $_POST[nu_a5];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q6 ###################################################################################################
if($_POST[nu_a6]>0){
$LearnerNo = $_POST[nu_q6];
$Offence_code = $_POST[nu_a6];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q7 ###################################################################################################
if($_POST[nu_a7]>0){
$LearnerNo = $_POST[nu_q7];
$Offence_code = $_POST[nu_a7];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q8 ###################################################################################################
if($_POST[nu_a8]>0){
$LearnerNo = $_POST[nu_q8];
$Offence_code = $_POST[nu_a8];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q9 ###################################################################################################
if($_POST[nu_a9]>0){
$LearnerNo = $_POST[nu_q9];
$Offence_code = $_POST[nu_a9];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q10 ###################################################################################################
if($_POST[nu_a10]>0){
$LearnerNo = $_POST[nu_q10];
$Offence_code = $_POST[nu_a10];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################


// q11 ###################################################################################################
if($_POST[nu_a11]>0){
$LearnerNo = $_POST[nu_q11];
$Offence_code = $_POST[nu_a11];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q12 ###################################################################################################
if($_POST[nu_a12]>0){
$LearnerNo = $_POST[nu_q12];
$Offence_code = $_POST[nu_a12];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q13 ###################################################################################################
if($_POST[nu_a13]>0){
$LearnerNo = $_POST[nu_q13];
$Offence_code = $_POST[nu_a13];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q14 ###################################################################################################
if($_POST[nu_a14]>0){
$LearnerNo = $_POST[nu_q14];
$Offence_code = $_POST[nu_a14];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q15 ###################################################################################################
if($_POST[nu_a15]>0){
$LearnerNo = $_POST[nu_q15];
$Offence_code = $_POST[nu_a15];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q16 ###################################################################################################
if($_POST[nu_a16]>0){
$LearnerNo = $_POST[nu_q16];
$Offence_code = $_POST[nu_a16];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q17 ###################################################################################################
if($_POST[nu_a17]>0){
$LearnerNo = $_POST[nu_q17];
$Offence_code = $_POST[nu_a17];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q18 ###################################################################################################
if($_POST[nu_a18]>0){
$LearnerNo = $_POST[nu_q18];
$Offence_code = $_POST[nu_a18];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q19 ###################################################################################################
if($_POST[nu_a19]>0){
$LearnerNo = $_POST[nu_q19];
$Offence_code = $_POST[nu_a19];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q20 ###################################################################################################
if($_POST[nu_a20]>0){
$LearnerNo = $_POST[nu_q20];
$Offence_code = $_POST[nu_a20];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################


// q21 ###################################################################################################
if($_POST[nu_a21]>0){
$LearnerNo = $_POST[nu_q21];
$Offence_code = $_POST[nu_a21];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q22 ###################################################################################################
if($_POST[nu_a22]>0){
$LearnerNo = $_POST[nu_q22];
$Offence_code = $_POST[nu_a22];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q23 ###################################################################################################
if($_POST[nu_a23]>0){
$LearnerNo = $_POST[nu_q23];
$Offence_code = $_POST[nu_a23];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q24 ###################################################################################################
if($_POST[nu_a24]>0){
$LearnerNo = $_POST[nu_q24];
$Offence_code = $_POST[nu_a24];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q25 ###################################################################################################
if($_POST[nu_a25]>0){
$LearnerNo = $_POST[nu_q25];
$Offence_code = $_POST[nu_a25];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q26 ###################################################################################################
if($_POST[nu_a26]>0){
$LearnerNo = $_POST[nu_q26];
$Offence_code = $_POST[nu_a26];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q27 ###################################################################################################
if($_POST[nu_a27]>0){
$LearnerNo = $_POST[nu_q27];
$Offence_code = $_POST[nu_a27];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q28 ###################################################################################################
if($_POST[nu_a28]>0){
$LearnerNo = $_POST[nu_q28];
$Offence_code = $_POST[nu_a28];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q29 ###################################################################################################
if($_POST[nu_a29]>0){
$LearnerNo = $_POST[nu_q29];
$Offence_code = $_POST[nu_a29];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q30 ###################################################################################################
if($_POST[nu_a30]>0){
$LearnerNo = $_POST[nu_q30];
$Offence_code = $_POST[nu_a30];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################

// q31 ###################################################################################################
if($_POST[nu_a31]>0){
$LearnerNo = $_POST[nu_q31];
$Offence_code = $_POST[nu_a31];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q32 ###################################################################################################
if($_POST[nu_a32]>0){
$LearnerNo = $_POST[nu_q32];
$Offence_code = $_POST[nu_a32];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q33 ###################################################################################################
if($_POST[nu_a33]>0){
$LearnerNo = $_POST[nu_q33];
$Offence_code = $_POST[nu_a33];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q34 ###################################################################################################
if($_POST[nu_a34]>0){
$LearnerNo = $_POST[nu_q34];
$Offence_code = $_POST[nu_a34];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q35 ###################################################################################################
if($_POST[nu_a35]>0){
$LearnerNo = $_POST[nu_q35];
$Offence_code = $_POST[nu_a35];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q36 ###################################################################################################
if($_POST[nu_a36]>0){
$LearnerNo = $_POST[nu_q36];
$Offence_code = $_POST[nu_a36];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q37 ###################################################################################################
if($_POST[nu_a37]>0){
$LearnerNo = $_POST[nu_q37];
$Offence_code = $_POST[nu_a37];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q38 ###################################################################################################
if($_POST[nu_a38]>0){
$LearnerNo = $_POST[nu_q38];
$Offence_code = $_POST[nu_a38];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q39 ###################################################################################################
if($_POST[nu_a39]>0){
$LearnerNo = $_POST[nu_q39];
$Offence_code = $_POST[nu_a39];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q40 ###################################################################################################
if($_POST[nu_a40]>0){
$LearnerNo = $_POST[nu_q40];
$Offence_code = $_POST[nu_a40];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################

// q41 ###################################################################################################
if($_POST[nu_a41]>0){
$LearnerNo = $_POST[nu_q41];
$Offence_code = $_POST[nu_a41];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q42 ###################################################################################################
if($_POST[nu_a42]>0){
$LearnerNo = $_POST[nu_q42];
$Offence_code = $_POST[nu_a42];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q43 ###################################################################################################
if($_POST[nu_a43]>0){
$LearnerNo = $_POST[nu_q43];
$Offence_code = $_POST[nu_a43];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q44 ###################################################################################################
if($_POST[nu_a44]>0){
$LearnerNo = $_POST[nu_q44];
$Offence_code = $_POST[nu_a44];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q45 ###################################################################################################
if($_POST[nu_a45]>0){
$LearnerNo = $_POST[nu_q45];
$Offence_code = $_POST[nu_a45];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q46 ###################################################################################################
if($_POST[nu_a46]>0){
$LearnerNo = $_POST[nu_q46];
$Offence_code = $_POST[nu_a46];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q47 ###################################################################################################
if($_POST[nu_a47]>0){
$LearnerNo = $_POST[nu_q47];
$Offence_code = $_POST[nu_a47];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q48 ###################################################################################################
if($_POST[nu_a48]>0){
$LearnerNo = $_POST[nu_q48];
$Offence_code = $_POST[nu_a48];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q49 ###################################################################################################
if($_POST[nu_a49]>0){
$LearnerNo = $_POST[nu_q49];
$Offence_code = $_POST[nu_a49];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q50 ###################################################################################################
if($_POST[nu_a50]>0){
$LearnerNo = $_POST[nu_q50];
$Offence_code = $_POST[nu_a50];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################

// q51 ###################################################################################################
if($_POST[nu_a51]>0){
$LearnerNo = $_POST[nu_q51];
$Offence_code = $_POST[nu_a51];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q52 ###################################################################################################
if($_POST[nu_a52]>0){
$LearnerNo = $_POST[nu_q52];
$Offence_code = $_POST[nu_a52];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q53 ###################################################################################################
if($_POST[nu_a53]>0){
$LearnerNo = $_POST[nu_q53];
$Offence_code = $_POST[nu_a53];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q54 ###################################################################################################
if($_POST[nu_a54]>0){
$LearnerNo = $_POST[nu_q54];
$Offence_code = $_POST[nu_a54];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q55 ###################################################################################################
if($_POST[nu_a55]>0){
$LearnerNo = $_POST[nu_q55];
$Offence_code = $_POST[nu_a55];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q56 ###################################################################################################
if($_POST[nu_a56]>0){
$LearnerNo = $_POST[nu_q56];
$Offence_code = $_POST[nu_a56];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q57 ###################################################################################################
if($_POST[nu_a57]>0){
$LearnerNo = $_POST[nu_q57];
$Offence_code = $_POST[nu_a57];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q58 ###################################################################################################
if($_POST[nu_a58]>0){
$LearnerNo = $_POST[nu_q58];
$Offence_code = $_POST[nu_a58];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q59 ###################################################################################################
if($_POST[nu_a59]>0){
$LearnerNo = $_POST[nu_q59];
$Offence_code = $_POST[nu_a59];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################
// q60 ###################################################################################################
if($_POST[nu_a60]>0){
$LearnerNo = $_POST[nu_q60];
$Offence_code = $_POST[nu_a60];
$result=mysql_query('select * from learner WHERE id ="'. mysql_real_escape_string($LearnerNo) .'" ');
			while($row=mysql_fetch_array($result)){
				$GuardianNo=$row['GuardianNo'];
				$school_code=$row['SchoolCode'];
				$LearnerName=$row['LearnerName'];
				$Subject=$row['Subject'];
				$Late=$row['Late'];
				$Absent=$row['Absent'];
				$Present=$row['Present'];
				$Register_Marked=$row['Register_Marked'];
				$Block_SMS=$row['Block_SMS'];
}
$Nu_GuardianNo = '+27' . $GuardianNo;
$Nu_LearnerName = trim($LearnerName);
if(($Offence_code==1) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if(($Offence_code==2) and ($Block_SMS==1)){
$Nu_Block_SMS=0;
$Block_SMS=0;
$sql = "UPDATE `learner` 
        SET 
`Block_SMS`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Block_SMS,$LearnerNo));
}
if($Offence_code==1){
$Nu_Present = $Present + 1;
$sql = "UPDATE `learner` 
        SET 
`Present`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Present,$LearnerNo));
}
if($Offence_code==2){
$Nu_late = $Late + 1;
$sql = "UPDATE `learner` 
        SET 
`Late`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_late,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if($Offence_code==3){
$Nu_Absent = $Absent + 1;
$sql = "UPDATE `learner` 
        SET 
`Absent`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Absent,$LearnerNo));
$Details='Dear parent, ' . $Nu_LearnerName . ' is absent or late for school today. Please call the school and let us know the reason' ;
}
if(($Offence_code>1) and ($Block_SMS==0) and (($current_period==1)||($current_period==2))){
$sql = "INSERT INTO register (Details,Offence_date,GuardianNo,Offence_code,LearnerNo,EducatorNo,Subject,school_code) 
VALUES (:Details,:Offence_date,:GuardianNo,:Offence_code,:LearnerNo,:EducatorNo,:Subject,:school_code)";
$q = $conn->prepare($sql);
$q->execute(array(':Details'=>$Details,
		          ':Offence_date'=>$Log_date,
		          ':GuardianNo'=>$Nu_GuardianNo,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':EducatorNo'=>$Log_by,
		          ':Subject'=>$Subject,
                  ':school_code'=>$school_code));
} 
if($Offence_code>1){
$sql = "INSERT INTO offencedetails (Offence_Date,Offence_code,LearnerNo,SchoolCode,Subject) 
VALUES (:Offence_Date,:Offence_code,:LearnerNo,:SchoolCode,:Subject)";
$q = $conn->prepare($sql);
$q->execute(array(':Offence_Date'=>$Log_date,
		          ':Offence_code'=>$Offence_code,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Subject'=>$Subject));
}

$Nu_Register_Marked = $Register_Marked + 1;
$sql = "UPDATE `learner` 
        SET 
`Register_Marked`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Nu_Register_Marked,$LearnerNo));

$Nu_Attend_Code="A";
$sql = "INSERT INTO attandance (Attand_Date,LearnerNo,SchoolCode,Attend_Code) 
VALUES (:Attand_Date,:LearnerNo,:SchoolCode,:Attend_Code)";
$q = $conn->prepare($sql);
$q->execute(array(':Attand_Date'=>$Log_date,
		          ':LearnerNo'=>$LearnerNo,
		          ':SchoolCode'=>$school_code,
                  ':Attend_Code'=>$Nu_Attend_Code));
		  
if(($Offence_code==1)||($Offence_code==2)){
$receive_sql = mysql_query("SELECT * FROM attandance where LearnerNo='$LearnerNo' and SchoolCode='$school_code' ORDER BY Attand_Date ASC");
while($row = mysql_fetch_assoc($receive_sql)) {
  $id=$row['id'];  
 }
  $Attend_Code="P";
 $sql = "UPDATE `attandance` 
        SET 
`Attend_Code`=? 
WHERE `id`=?";
$q = $conn->prepare($sql);
$q->execute(array($Attend_Code,$id));
}}
// q1 ###################################################################################################

?>


