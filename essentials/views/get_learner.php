<?php
	include("../config/table32.php");
	
 session_start();

	$school_code = $_SESSION['school_code'];
	$ma_class=$_GET['ma_class'];
	$ma_name=$_GET['ma_name'];
	$ma_surname=$_GET['ma_surname'];
	//$perc_Late="";
	//$perc_Absent="";
		
?>


     	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
 		<?php
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td style="font-weight:bold">Attendance</td></tr>';
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td>Learning Area</td><td>Days Late</td><td>Days Absent</td><td>Days Present</td><td>Total Days</td><td>% Late</td><td>% Absent</td><td>% Present</td></tr>';
			$result=mysql_query('select * from learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND ClassCode ="'. mysql_real_escape_string($ma_class) .'" AND LearnerSurname ="'. mysql_real_escape_string($ma_surname) .'" AND LearnerName ="'. mysql_real_escape_string($ma_name) .'"') or die("select * from learner"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
			$perc_Late=	(($row['Late']/$row['Register_Marked'])*100);
			$perc_Absent=	(($row['Absent']/$row['Register_Marked'])*100);	
			$perc_Present=	(($row['Present']/$row['Register_Marked'])*100);	
				
		?>
             	
			
            		<tr bgcolor="#FFFFFF">
                     <td><?php echo $row['Subject']?></td>
                    <td><?php echo $row['Late']?></td>
                    <td><?php echo $row['Absent']?></td>
                    <td><?php echo $row['Present']?></td>  
					<td><?php echo $row['Register_Marked']?></td> 										
                    <td><?php echo number_format($perc_Late, 2, '.', '');?>%</td>        
                    <td><?php echo number_format($perc_Absent, 2, '.', '');?>%</td>        
                    <td><?php echo number_format($perc_Present, 2, '.', '');?>%</td>        
                   </tr>
                    
			
       <?php }
	   
		$perc_Late="";
		$perc_Absent="";
		$perc_Present="";
	   ?>				
        </table>
		</br>
<hr />
	
   	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
 		<?php
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td style="font-weight:bold">Homeworks</td></tr>';
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td>Learning Area</td><td>Incomplete</td><td>Not done</td><td>Done</td><td>Total Homeworks</td><td>% Incomplete</td><td>% Not Done</td><td>% Done</td></tr>';
			$result=mysql_query('select * from learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND ClassCode ="'. mysql_real_escape_string($ma_class) .'" AND LearnerSurname ="'. mysql_real_escape_string($ma_surname) .'" AND LearnerName ="'. mysql_real_escape_string($ma_name) .'"') or die("select * from learner"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
			$perc_incomplete_hw=	(($row['incomplete_hw']/$row['No_hw'])*100);
			$perc_hw_not_done=	(($row['hw_not_done']/$row['No_hw'])*100);	
			$perc_hw_done=	(($row['hw_done']/$row['No_hw'])*100);	
				
		?>
             	
			
            		<tr bgcolor="#FFFFFF">
                    <td><?php echo $row['Subject']?></td>
                    <td><?php echo $row['incomplete_hw']?></td>
                    <td><?php echo $row['hw_not_done']?></td>
                    <td><?php echo $row['hw_done']?></td>    
					<td><?php echo $row['No_hw']?></td> 	
                    <td><?php echo number_format($perc_incomplete_hw, 2, '.', '');?>%</td>        
                    <td><?php echo number_format($perc_hw_not_done, 2, '.', '');?>%</td>        
                    <td><?php echo number_format($perc_hw_done, 2, '.', '');?>%</td>        
								
                   </tr>
                    
			
       <?php }
	   
		$perc_incomplete_hw="";
		$perc_hw_not_done="";
		$perc_hw_done="";
	   ?>				
        </table>
		</br>

