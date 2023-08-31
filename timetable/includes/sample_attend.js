$('#sample_attend').live('pagecreate', function() {
		  
  			
			$('#select_period6').change(function() {

			check_periods6();
		
          
            });
			
			
});

function check_periods6(){
var day_no = new Date().getDay();

var day_desc;
if(day_no==1){
	day_desc=" (MONDAY)";
}
if(day_no==2){
	day_desc=" (TUESDAY)";
}
if(day_no==3){
	day_desc=" (WEDNESDAY)";
}
if(day_no==4){
	day_desc=" (THURSDAY)";
}
if(day_no==5){
	day_desc=" (FRIDAY)";
}

$('#first_heading6').text('8A, MATHS - '+ day_desc);

$('#period_select6 li').remove();

$('#period_select6').append('<li><a href="sample_ga.html?"><img src="images/Attendance_48.png" width="128" height="128"><h3>Load REGISTER</h3><p>Load attendance register</p></a></li>');


$('#period_select6').listview('refresh');	


}


