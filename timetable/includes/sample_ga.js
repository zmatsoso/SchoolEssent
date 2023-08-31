$('#sample_ga').live('pageshow', function(event) {
	get_learn_list11();
	
			$('#nu_test_db7').on("tap click", function() {

			send_values11();
		          
            });



});

function get_learn_list11() {
	
	$('#learn_list7 li').remove();


	$('#learn_list7').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="d1">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<label for="d1" class="bana">' +
							'  Tumelo Motaung</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(14)</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(21)</span></div></li>');
							
	$('#learn_list7').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="d2">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<label for="d2" class="bana">' +
							'  Sabata Malefane</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(0)</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(0)</span></div></li>');
							
	$('#learn_list7').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="d3">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<label for="d3" class="bana">' +
							'  Dikeledi Sebotsa</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(5)</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(9)</span></div></li>');
			
	$('#learn_list7').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="d4">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<label for="d4" class="bana">' +
							'  Lungile Radebe</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(3)</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(9)</span></div></li>');

	$('#learn_list7').listview('refresh');			
	
	};

	
	
	
	



function send_values11(){
 	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);
	$('#first_heading7').text('Register Submitted Successfuly');	
		
	$('#learn_list7 li').remove();
	
	$('#nu_test_db7').remove();

	$('#learn_list7').append('<li><a href="#page"><img src="images/help-icon.png" width="128" height="128"><h3>Continue</h3><p>Back to main menu</p></a></li>');

	$('#learn_list7').listview('refresh');	
			
}
