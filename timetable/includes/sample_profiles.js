$('#sample_profiles').bind('pageinit', function(event) {
getProf_list();
});

function getProf_list() {
	
$('#sample_profile').append('<li><a href="#sample_edu_lists"><img src="images/Staff_48.png" width="auto" height="auto"><h3>Educator timetable</h3><p>This will load most recent educator timetable</p></a></li>');

$('#sample_profile').append('<li><a href="#sample_class_lists"><img src="images/Student_48.png" width="auto" height="auto"><h3>Learner/class timetable</h3><p>This will load most recent learner/class timetable</p></a></li>');


		
$('#sample_profile').listview('refresh');	
}

