<?php
	include("../config/table32.php");
	
 session_start();

	$school_code = $_SESSION['school_code'];
	$ma_class=$_GET['ma_class'];
	$ma_subject=$_GET['ma_subject'];
	$perc_incomplete_hw="";
	$perc_hw_not_done="";
	$perc_hw_done="";

		
?>



    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
 		<?php
		echo '<tr bgcolor="#CCCCCC" style="font-weight:bold"><td>Surname</td><td>Name</td><td>Incomplete</td><td>Not done</td><td>Done</td><td>Total Homeworks</td><td>% Incomplete</td><td>% Not Done</td><td>% Done</td></tr>';
			$result=mysql_query('select * from learner WHERE SchoolCode="'. mysql_real_escape_string($school_code) .'" AND ClassCode ="'. mysql_real_escape_string($ma_class) .'" AND Subject ="'. mysql_real_escape_string($ma_subject) .'"') or die("select * from learner"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
			$perc_incomplete_hw=	(($row['incomplete_hw']/$row['No_hw'])*100);
			$perc_hw_not_done=	(($row['hw_not_done']/$row['No_hw'])*100);	
			$perc_hw_done=	(($row['hw_done']/$row['No_hw'])*100);	
				
		?>
             	
			
            		<tr bgcolor="#FFFFFF">
                    <td><?php echo $row['LearnerSurname']?></td>
                    <td><?php echo $row['LearnerName']?></td>
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

