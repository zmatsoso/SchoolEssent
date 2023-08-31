function check_recent(){
//Check director

var de_virgin = localStorage.getItem("ma_virgin");
if (de_virgin>0){

	if (de_virgin==1){
	var PeriodsPerDay = localStorage.getItem("PeriodsPerDay");
		$('#first_heading').text("What would u like to do?");	
		
$('#prompt_question li').remove();
if (PeriodsPerDay==8){
$('#prompt_question').append('<li><a href="learner_table8.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
		}
if (PeriodsPerDay==9){
$('#prompt_question').append('<li><a href="learner_table9.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
		}
if (PeriodsPerDay==10){
$('#prompt_question').append('<li><a href="learner_table10.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
		}
if (PeriodsPerDay==11){
$('#prompt_question').append('<li><a href="learner_table11.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
		}
if (PeriodsPerDay==12){
$('#prompt_question').append('<li><a href="learner_table11.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
		}

$('#second_heading').text("or");	
	
$('#prompt_question1').append('<li><a href="#select_nu_profile"><img src="images/help-icon.png" width="128" height="128"><h3>Reset TIMETABLE</h3><p>Load New TIMETABLE</p></a></li>');
$('#prompt_question').listview('refresh');	
$('#prompt_question1').listview('refresh');	


	}
	if (de_virgin==2){
	var PeriodsPerDay = localStorage.getItem("PeriodsPerDay");
$('#first_heading').text("What would u like to do?");		

$('#prompt_question li').remove();
if (PeriodsPerDay==8){
$('#prompt_question').append('<li><a href="edu_table8.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==9){
$('#prompt_question').append('<li><a href="edu_table9.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==10){
$('#prompt_question').append('<li><a href="edu_table10.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==11){
$('#prompt_question').append('<li><a href="edu_table11.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==12){
$('#prompt_question').append('<li><a href="edu_table11.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		


$('#second_heading').text("or");	

$('#prompt_question1').append('<li><a href="#select_nu_profile"><img src="images/help-icon.png" width="128" height="128"><h3>Reset TIMETABLE</h3><p>Load New TIMETABLE</p></a></li>');
$('#prompt_question').listview('refresh');	
$('#prompt_question1').listview('refresh');	
	}
	if (de_virgin==3){
	var PeriodsPerDay = localStorage.getItem("PeriodsPerDay");
$('#first_heading').text("What would u like to do?");		

$('#prompt_question li').remove();
if (PeriodsPerDay==8){
$('#prompt_question').append('<li><a href="edu_table8.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==9){
$('#prompt_question').append('<li><a href="edu_table9.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==10){
$('#prompt_question').append('<li><a href="edu_table10.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		
if (PeriodsPerDay==11){
$('#prompt_question').append('<li><a href="edu_table11.html"><img src="images/Messaging_48.png" width="128" height="128"><h3>View Timetable</h3><p>Show saved timetable</p></a></li>');
}		

$('#second_heading').text("or");	

$('#prompt_question1').append('<li><a href="#select_nu_profile"><img src="images/help-icon.png" width="128" height="128"><h3>Reset TIMETABLE</h3><p>Load New TIMETABLE</p></a></li>');
$('#prompt_question').listview('refresh');	
$('#prompt_question1').listview('refresh');	
	}

}else{
$('#first_heading').text("---welcome---");
$('#prompt_question li').remove();
$('#prompt_question').append('<li><a href="#select_nu_profile"><img src="images/help-icon.png" width="128" height="128"><h3>Load TIMITABLE</h3><p>Load New TIMETABLE</p></a></li>');
$('#prompt_question').listview('refresh');	
}

}

function check_recent_table(){
//load director

 var de_virgin=0;
 localStorage.setItem("ma_virgin", de_virgin);	
 alert("saved");
}



$('#prompt_questions').live('pageshow', function() {

				  
  			
			$('#send_ld_recent').on("tap click", function() {

			check_recent();
		
          
            });

			
			$('#send_ck_recent').on("tap click", function() {

			check_recent_table();
		          
            });
			

			check_recent();
			
			
});