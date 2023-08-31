$('#advanceddemo').live('pageshow', function(event) {

	
	set_hearding();
	
			$('#nu_test_db3').on("tap click", function() {

			send_hw();
		          
           });
			
       
});

function set_hearding(){

var class_code = localStorage.getItem("ma_class");
var subject = localStorage.getItem("ma_subject");
$('#first_heading11').text(class_code + ', '+ subject + ' homework');


}

function send_hw(){

var educ_no = localStorage.getItem("educ_no");
var class_code = localStorage.getItem("ma_class");
var subject = localStorage.getItem("ma_subject");
var school_code = localStorage.getItem("school_code");
var due_date = document.getElementById("due_date").value;
var hw_details = document.getElementById("hw_details").value;


if(hw_details==""){
alert("Please supply homework details and try again!");
}else{
if(due_date==""){
alert("Please supply due date and try again!")
}else{
//#####################################################################################################

	function wl11(){
	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);
	
	window.location.href = '#page';	
			
		}
		
		$.post(serviceURL + 'log_new_hw.php',{
		
		nu_educ_no: educ_no,	
		nu_class_code: class_code,	
		nu_subject: subject,	
		nu_due_date: due_date,	
		nu_hw_details: hw_details,	
		nu_school_code: school_code,


		success: wl11,
		});

//#####################################################################################################
}}}


