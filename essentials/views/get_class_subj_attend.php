<?php
	include("../config/table32.php");
	
 session_start();

	$school_code = $_SESSION['school_code'];
	$ma_class=$_GET['ma_class'];
	$ma_subject=$_GET['ma_subject'];
	$perc_Late="";
	$perc_Absent="";
	$perc_Present="";

		
?>



    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
 		<?php
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td>Surname</td><td>Name</td><td>Days Late</td><td>Days Absent</td><td>Days Present</td><td>Total Days</td><td>% Late</td><td>% Absent</td><td>% Present</td></tr>';
			$result=mysql_query('select * from learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND ClassCode ="'. mysql_real_escape_string($ma_class) .'" AND Subject ="'. mysql_real_escape_string($ma_subject) .'"') or die("select * from learner"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
			$perc_Late=	(($row['Late']/$row['Register_Marked'])*100);
			$perc_Absent=	(($row['Absent']/$row['Register_Marked'])*100);	
			$perc_Present=	(($row['Present']/$row['Register_Marked'])*100);	
				
		?>
             	
			
            		<tr bgcolor="#FFFFFF">
                    <td><?php echo $row['LearnerSurname']?></td>
                    <td><?php echo $row['LearnerName']?></td>
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

