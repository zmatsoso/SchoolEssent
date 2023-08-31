$('#comments').live('pageshow', function(event) {

		
			$('#nu_test_db4').on("tap click", function() {

			send_cm();
		          
           });
			
       
});


function send_cm(){

var educ_no = localStorage.getItem("educ_no");
var class_code = localStorage.getItem("ma_class");
var subject = localStorage.getItem("ma_subject");
var school_code = localStorage.getItem("school_code");


var com_tel = document.getElementById("com_tel").value;
var cm_details = document.getElementById("cm_details").value;
var com_profile = document.getElementById("com_profile").value;

if(cm_details==""){
alert("Please supply comment details and try again!");
}else{
if(com_tel==""){
alert("Please supply cell no and try again!")
}else{
//#####################################################################################################

	function com1(){
	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);
	
	alert("Feedback submitted successfully!!!");
	window.location.href = '#page';	
			
		}
		
		$.post(serviceURL + 'log_comment.php',{
		
		nu_educ_no: educ_no,	
		nu_class_code: class_code,	
		nu_subject: subject,	
		nu_cm_details: cm_details,	
		nu_school_code: school_code,
		nu_com_tel: com_tel,
		nu_com_profile: com_profile,

		success: com1,
		});

//#####################################################################################################
}}}


