function getMenuList() {
var ma_virgin = localStorage.getItem("ma_virgin");


$('#main_menu li').remove();
	
$('#main_menu').append('<li><a href="school_code.html"><img src="images/Calendar_48.png" width="auto" height="auto"><h3>Timetable</h3><p>View your school timetable</p></a></li>');

$('#main_menu').append('<li><a href="#sample_profiles"><img src="images/Timetable_48.png" width="auto" height="auto"><h3>Samples</h3><p>View timetable samples</p></a></li>');

$('#main_menu').append('<li><a href="#calc"><img src="images/Ask_48.png" width="auto" height="auto"><h3>More Info</h3><p>Features and billing</p></a></li>');

$('#main_menu').append('<li><a href="#comments"><img src="images/Language_48.png" width="auto" height="auto"><h3>Feedback</h3><p>Comments or complains</p></a></li>');
		
$('#main_menu').listview('refresh');	

}


$('#page').live('pageshow', function() {

	refreshPage()	
	getMenuList();		
			
});

function refreshPage(){

var reloader = localStorage.getItem("reloader");

if (reloader==1){
	var resetter = 2;
	localStorage.setItem("reloader", resetter);
	location.reload();
}
  	
}
