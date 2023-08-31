var school_code;
var educ_no = localStorage.getItem("educ_no");


function nu_ck_recent_table(){
// Clear Director
var manday1 = localStorage.getItem("F5");
 alert(manday1);
 $('#nu_prompt_question').append('<li><a href="index.html"><img src="images/help-icon.png" width="128" height="128"><h3>Restart</h3><p>Load Educator Timetable</p></a></li>');
 $('#nu_prompt_question').listview('refresh');	
}



$('#nu_load_edu_table').live('pagecreate', function() {
		  
  			
			
			$('#nu_ck_recent').on("tap click", function() {

			nu_ck_recent_table();
		          
            });
			
			
});

