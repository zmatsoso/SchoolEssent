$('#select_profile_page').live('pageshow', function(event) {
list_profiles();
	
});

function list_profiles() {


$('#profile_select li').remove();

$('#profile_select').append('<li><a href="select_educ.html"><img src="images/Staff_48.png" width="auto" height="auto"><h3>Educator</h3><p>This will load most recent educator timetable</p></a></li>');
$('#profile_select').append('<li><a href="select_class.html"><img src="images/Student_48.png" width="auto" height="auto"><h3>Learner/class</h3><p>This will load most recent learner/class timetable</p></a></li>');
$('#profile_select').listview('refresh');
}

