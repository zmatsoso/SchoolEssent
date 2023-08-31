var ma_hw=7;
function clear_var(){

var clear_ls = "";
localStorage.setItem("q1", clear_ls);
localStorage.setItem("q2", clear_ls);
localStorage.setItem("q3", clear_ls);
localStorage.setItem("q4", clear_ls);
localStorage.setItem("q5", clear_ls);
localStorage.setItem("q6", clear_ls);
localStorage.setItem("q7", clear_ls);
localStorage.setItem("q8", clear_ls);
localStorage.setItem("q9", clear_ls);
localStorage.setItem("q10", clear_ls);
localStorage.setItem("q11", clear_ls);
localStorage.setItem("q12", clear_ls);
localStorage.setItem("q13", clear_ls);
localStorage.setItem("q14", clear_ls);
localStorage.setItem("q15", clear_ls);
localStorage.setItem("q16", clear_ls);
localStorage.setItem("q17", clear_ls);
localStorage.setItem("q18", clear_ls);
localStorage.setItem("q19", clear_ls);
localStorage.setItem("q20", clear_ls);

localStorage.setItem("q21", clear_ls);
localStorage.setItem("q22", clear_ls);
localStorage.setItem("q23", clear_ls);
localStorage.setItem("q24", clear_ls);
localStorage.setItem("q25", clear_ls);
localStorage.setItem("q26", clear_ls);
localStorage.setItem("q27", clear_ls);
localStorage.setItem("q28", clear_ls);
localStorage.setItem("q29", clear_ls);
localStorage.setItem("q30", clear_ls);
localStorage.setItem("q32", clear_ls);
localStorage.setItem("q32", clear_ls);
localStorage.setItem("q33", clear_ls);
localStorage.setItem("q34", clear_ls);
localStorage.setItem("q35", clear_ls);
localStorage.setItem("q36", clear_ls);
localStorage.setItem("q37", clear_ls);
localStorage.setItem("q38", clear_ls);
localStorage.setItem("q39", clear_ls);
localStorage.setItem("q40", clear_ls);

localStorage.setItem("q41", clear_ls);
localStorage.setItem("q42", clear_ls);
localStorage.setItem("q43", clear_ls);
localStorage.setItem("q44", clear_ls);
localStorage.setItem("q45", clear_ls);
localStorage.setItem("q46", clear_ls);
localStorage.setItem("q47", clear_ls);
localStorage.setItem("q48", clear_ls);
localStorage.setItem("q49", clear_ls);
localStorage.setItem("q50", clear_ls);
localStorage.setItem("q51", clear_ls);
localStorage.setItem("q52", clear_ls);
localStorage.setItem("q53", clear_ls);
localStorage.setItem("q54", clear_ls);
localStorage.setItem("q55", clear_ls);
localStorage.setItem("q56", clear_ls);
localStorage.setItem("q57", clear_ls);
localStorage.setItem("q58", clear_ls);
localStorage.setItem("q59", clear_ls);
localStorage.setItem("q60", clear_ls);

localStorage.setItem("a1", clear_ls);
localStorage.setItem("a2", clear_ls);
localStorage.setItem("a3", clear_ls);
localStorage.setItem("a4", clear_ls);
localStorage.setItem("a5", clear_ls);
localStorage.setItem("a6", clear_ls);
localStorage.setItem("a7", clear_ls);
localStorage.setItem("a8", clear_ls);
localStorage.setItem("a9", clear_ls);
localStorage.setItem("a10", clear_ls);
localStorage.setItem("a11", clear_ls);
localStorage.setItem("a12", clear_ls);
localStorage.setItem("a13", clear_ls);
localStorage.setItem("a14", clear_ls);
localStorage.setItem("a15", clear_ls);
localStorage.setItem("a16", clear_ls);
localStorage.setItem("a17", clear_ls);
localStorage.setItem("a18", clear_ls);
localStorage.setItem("a19", clear_ls);
localStorage.setItem("a20", clear_ls);

localStorage.setItem("a21", clear_ls);
localStorage.setItem("a22", clear_ls);
localStorage.setItem("a23", clear_ls);
localStorage.setItem("a24", clear_ls);
localStorage.setItem("a25", clear_ls);
localStorage.setItem("a26", clear_ls);
localStorage.setItem("a27", clear_ls);
localStorage.setItem("a28", clear_ls);
localStorage.setItem("a29", clear_ls);
localStorage.setItem("a30", clear_ls);
localStorage.setItem("a32", clear_ls);
localStorage.setItem("a32", clear_ls);
localStorage.setItem("a33", clear_ls);
localStorage.setItem("a34", clear_ls);
localStorage.setItem("a35", clear_ls);
localStorage.setItem("a36", clear_ls);
localStorage.setItem("a37", clear_ls);
localStorage.setItem("a38", clear_ls);
localStorage.setItem("a39", clear_ls);
localStorage.setItem("a40", clear_ls);

localStorage.setItem("a41", clear_ls);
localStorage.setItem("a42", clear_ls);
localStorage.setItem("a43", clear_ls);
localStorage.setItem("a44", clear_ls);
localStorage.setItem("a45", clear_ls);
localStorage.setItem("a46", clear_ls);
localStorage.setItem("a47", clear_ls);
localStorage.setItem("a48", clear_ls);
localStorage.setItem("a49", clear_ls);
localStorage.setItem("a50", clear_ls);
localStorage.setItem("a51", clear_ls);
localStorage.setItem("a52", clear_ls);
localStorage.setItem("a53", clear_ls);
localStorage.setItem("a54", clear_ls);
localStorage.setItem("a55", clear_ls);
localStorage.setItem("a56", clear_ls);
localStorage.setItem("a57", clear_ls);
localStorage.setItem("a58", clear_ls);
localStorage.setItem("a59", clear_ls);
localStorage.setItem("a60", clear_ls);

}

$('#ga').live('pageshow', function(event) {
	clear_var();
	get_hw();
	get_learn_list();
			$('#nu_test_db').on("tap click", function() {

			send_values();
		          
            });
			
       
});

function get_hw(){
var class_code = localStorage.getItem("ma_class");
var subject = localStorage.getItem("ma_subject");
var school_code = localStorage.getItem("school_code");

	$.getJSON(serviceURL + 'hw_check.php?school_code='+school_code+'&subject='+subject+'&class_code='+class_code, displayEmployee);

}

function displayEmployee(data){

	var employee = data.item;
	console.log(employee);
	$('#first_heading12').text('Homework due: '+ employee.details);	
	ma_hw=1;
}	

var q = 0;

function get_learn_list() {

	alert("Ready to load register");

var class_code = localStorage.getItem("ma_class");
var subject = localStorage.getItem("ma_subject");
	var t = 0;
	var school_code = localStorage.getItem("school_code");
	$.getJSON(serviceURL + 'ga.php?school_code='+school_code+'&subject='+subject+'&class_code='+class_code, function(data) {
	
	$('#learn_list li').remove();
	learners = data.items;
	
		$.each(learners, function(index, learner) {
		
		q = q + 1;
		qid = learner.id;
		
		if(q==1){
		localStorage.setItem("q1", learner.id)
		}
		if(q==2){
		localStorage.setItem("q2", learner.id)
		}
		if(q==3){
		localStorage.setItem("q3", learner.id)
		}
		if(q==4){
		localStorage.setItem("q4", learner.id)
		}
		if(q==5){
		localStorage.setItem("q5", learner.id)
		}
		if(q==6){
		localStorage.setItem("q6", learner.id)
		}
		if(q==7){
		localStorage.setItem("q7", learner.id)
		}
		if(q==8){
		localStorage.setItem("q8", learner.id)
		}
		if(q==9){
		localStorage.setItem("q9", learner.id)
		}
		if(q==10){
		localStorage.setItem("q10", learner.id)
		}

		if(q==11){
		localStorage.setItem("q11", learner.id)
		}
		if(q==12){
		localStorage.setItem("q12", learner.id)
		}
		if(q==13){
		localStorage.setItem("q13", learner.id)
		}
		if(q==14){
		localStorage.setItem("q14", learner.id)
		}
		if(q==15){
		localStorage.setItem("q15", learner.id)
		}
		if(q==16){
		localStorage.setItem("q16", learner.id)
		}
		if(q==17){
		localStorage.setItem("q17", learner.id)
		}
		if(q==18){
		localStorage.setItem("q18", learner.id)
		}
		if(q==19){
		localStorage.setItem("q19", learner.id)
		}
		if(q==20){
		localStorage.setItem("q20", learner.id)
		}
		
		if(q==21){
		localStorage.setItem("q21", learner.id)
		}
		if(q==22){
		localStorage.setItem("q22", learner.id)
		}
		if(q==23){
		localStorage.setItem("q23", learner.id)
		}
		if(q==24){
		localStorage.setItem("q24", learner.id)
		}
		if(q==25){
		localStorage.setItem("q25", learner.id)
		}
		if(q==26){
		localStorage.setItem("q26", learner.id)
		}
		if(q==27){
		localStorage.setItem("q27", learner.id)
		}
		if(q==28){
		localStorage.setItem("q28", learner.id)
		}
		if(q==29){
		localStorage.setItem("q29", learner.id)
		}
		if(q==30){
		localStorage.setItem("q30", learner.id)
		}

		if(q==31){
		localStorage.setItem("q31", learner.id)
		}
		if(q==32){
		localStorage.setItem("q32", learner.id)
		}
		if(q==33){
		localStorage.setItem("q33", learner.id)
		}
		if(q==34){
		localStorage.setItem("q34", learner.id)
		}
		if(q==35){
		localStorage.setItem("q35", learner.id)
		}
		if(q==36){
		localStorage.setItem("q36", learner.id)
		}
		if(q==37){
		localStorage.setItem("q37", learner.id)
		}
		if(q==38){
		localStorage.setItem("q38", learner.id)
		}
		if(q==39){
		localStorage.setItem("q39", learner.id)
		}
		if(q==40){
		localStorage.setItem("q40", learner.id)
		}

		if(q==41){
		localStorage.setItem("q41", learner.id)
		}
		if(q==42){
		localStorage.setItem("q42", learner.id)
		}
		if(q==43){
		localStorage.setItem("q43", learner.id)
		}
		if(q==44){
		localStorage.setItem("q44", learner.id)
		}
		if(q==45){
		localStorage.setItem("q45", learner.id)
		}
		if(q==46){
		localStorage.setItem("q46", learner.id)
		}
		if(q==47){
		localStorage.setItem("q47", learner.id)
		}
		if(q==48){
		localStorage.setItem("q48", learner.id)
		}
		if(q==49){
		localStorage.setItem("q49", learner.id)
		}
		if(q==50){
		localStorage.setItem("q50", learner.id)
		}

		if(q==51){
		localStorage.setItem("q51", learner.id)
		}
		if(q==52){
		localStorage.setItem("q52", learner.id)
		}
		if(q==53){
		localStorage.setItem("q53", learner.id)
		}
		if(q==54){
		localStorage.setItem("q54", learner.id)
		}
		if(q==55){
		localStorage.setItem("q55", learner.id)
		}
		if(q==56){
		localStorage.setItem("q56", learner.id)
		}
		if(q==57){
		localStorage.setItem("q57", learner.id)
		}
		if(q==58){
		localStorage.setItem("q58", learner.id)
		}
		if(q==59){
		localStorage.setItem("q59", learner.id)
		}
		if(q==60){
		localStorage.setItem("q60", learner.id)
		}

	if(ma_hw==7){
	$('#learn_list').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="' + qid + '">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<label for="' + q + ';' + qid + '" class="bana">' +
							'  ' + learner.LearnerName + ' '+ learner.LearnerSurname +'</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(' + learner.Late + ')</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(' + learner.Absent + ')</span></div></li>');
	}						
	if(ma_hw==1){
	$('#learn_list').append('<li><div data-role="fieldcontain" class="cava">' +
							'<select name="selectmenu" id="' + qid + '">'+	
							' <option value="1">Present</option>' +
							' <option value="2">Late</option>' +
							' <option value="3">Absent</option>' +
							' </select>' +
							'<select name="selectmenu"  id="hw' + qid + '">'+	
							' <option value="1">Done</option>' +
							' <option value="2">Partial</option>' +
							' <option value="3">Not Done</option>' +
							' </select>' +
							'<label for="' + q + ';' + qid + '" class="bana">' +
							'  ' + learner.LearnerName + ' '+ learner.LearnerSurname +'</label>' +
							'  ' +
							'<span class="caonta" align="right"> Late(' + learner.Late + ')</span>' +
							'  ' +
							'<span class="caonta" align="right">Absent(' + learner.Absent + ')</span></div></li>');
	}						
						
			});
	});
	$('#learn_list').listview('refresh');
	
}


function send_values(){
 var the_q;
 var the_a;

   for(var i = 0; i < q; i++)
    {
		var nu_p = i + 1;
		the_q = localStorage.getItem("q"+ nu_p);
		the_a = document.getElementById(the_q).value;
		localStorage.setItem("a"+ nu_p, the_a);

	}
			//###################################################
		var educ_no = localStorage.getItem("educ_no");
		var current_period = localStorage.getItem("current_period"); 
		
		var q1 = localStorage.getItem("q1");
		var a1 = localStorage.getItem("a1");

		var q2 = localStorage.getItem("q2");
		var a2 = localStorage.getItem("a2");

		var q3 = localStorage.getItem("q3");
		var a3 = localStorage.getItem("a3");

		var q4 = localStorage.getItem("q4");
		var a4 = localStorage.getItem("a4");

		var q5 = localStorage.getItem("q5");
		var a5 = localStorage.getItem("a5");

		var q6 = localStorage.getItem("q6");
		var a6 = localStorage.getItem("a6");

		var q7 = localStorage.getItem("q7");
		var a7 = localStorage.getItem("a7");

		var q8 = localStorage.getItem("q8");
		var a8 = localStorage.getItem("a8");

		var q9 = localStorage.getItem("q9");
		var a9 = localStorage.getItem("a9");

		var q10 = localStorage.getItem("q10");
		var a10 = localStorage.getItem("a10");

		var q11 = localStorage.getItem("q11");
		var a11 = localStorage.getItem("a11");

		var q12 = localStorage.getItem("q12");
		var a12 = localStorage.getItem("a12");

		var q13 = localStorage.getItem("q13");
		var a13 = localStorage.getItem("a13");

		var q14 = localStorage.getItem("q14");
		var a14 = localStorage.getItem("a14");

		var q15 = localStorage.getItem("q15");
		var a15 = localStorage.getItem("a15");

		var q16 = localStorage.getItem("q16");
		var a16 = localStorage.getItem("a16");

		var q17 = localStorage.getItem("q17");
		var a17 = localStorage.getItem("a17");

		var q18 = localStorage.getItem("q18");
		var a18 = localStorage.getItem("a18");

		var q19 = localStorage.getItem("q19");
		var a19 = localStorage.getItem("a19");

		var q20 = localStorage.getItem("q20");
		var a20 = localStorage.getItem("a20");

		var q21 = localStorage.getItem("q21");
		var a21 = localStorage.getItem("a21");

		var q22 = localStorage.getItem("q22");
		var a22 = localStorage.getItem("a22");

		var q23 = localStorage.getItem("q23");
		var a23 = localStorage.getItem("a23");

		var q24 = localStorage.getItem("q24");
		var a24 = localStorage.getItem("a24");

		var q25 = localStorage.getItem("q25");
		var a25 = localStorage.getItem("a25");

		var q26 = localStorage.getItem("q26");
		var a26 = localStorage.getItem("a26");

		var q27 = localStorage.getItem("q27");
		var a27 = localStorage.getItem("a27");

		var q28 = localStorage.getItem("q28");
		var a28 = localStorage.getItem("a28");

		var q29 = localStorage.getItem("q29");
		var a29 = localStorage.getItem("a29");

		var q30 = localStorage.getItem("q30");
		var a30 = localStorage.getItem("a30");

		var q31 = localStorage.getItem("q31");
		var a31 = localStorage.getItem("a31");

		var q32 = localStorage.getItem("q32");
		var a32 = localStorage.getItem("a32");

		var q33 = localStorage.getItem("q33");
		var a33 = localStorage.getItem("a33");

		var q34 = localStorage.getItem("q34");
		var a34 = localStorage.getItem("a34");

		var q35 = localStorage.getItem("q35");
		var a35 = localStorage.getItem("a35");

		var q36 = localStorage.getItem("q36");
		var a36 = localStorage.getItem("a36");

		var q37 = localStorage.getItem("q37");
		var a37 = localStorage.getItem("a37");

		var q38 = localStorage.getItem("q38");
		var a38 = localStorage.getItem("a38");

		var q39 = localStorage.getItem("q39");
		var a39 = localStorage.getItem("a39");

		var q40 = localStorage.getItem("q40");
		var a40 = localStorage.getItem("a40");

		var q41 = localStorage.getItem("q41");
		var a41 = localStorage.getItem("a41");

		var q42 = localStorage.getItem("q42");
		var a42 = localStorage.getItem("a42");

		var q43 = localStorage.getItem("q43");
		var a43 = localStorage.getItem("a43");

		var q44 = localStorage.getItem("q44");
		var a44 = localStorage.getItem("a44");

		var q45 = localStorage.getItem("q45");
		var a45 = localStorage.getItem("a45");

		var q46 = localStorage.getItem("q46");
		var a46 = localStorage.getItem("a46");

		var q47 = localStorage.getItem("q47");
		var a47 = localStorage.getItem("a47");

		var q48 = localStorage.getItem("q48");
		var a48 = localStorage.getItem("a48");

		var q49 = localStorage.getItem("q49");
		var a49 = localStorage.getItem("a49");

		var q50 = localStorage.getItem("q50");
		var a50 = localStorage.getItem("a50");

		var q51 = localStorage.getItem("q51");
		var a51 = localStorage.getItem("a51");

		var q52 = localStorage.getItem("q52");
		var a52 = localStorage.getItem("a52");

		var q53 = localStorage.getItem("q53");
		var a53 = localStorage.getItem("a53");

		var q54 = localStorage.getItem("q54");
		var a54 = localStorage.getItem("a54");

		var q55 = localStorage.getItem("q55");
		var a55 = localStorage.getItem("a55");

		var q56 = localStorage.getItem("q56");
		var a56 = localStorage.getItem("a56");

		var q57 = localStorage.getItem("q57");
		var a57 = localStorage.getItem("a57");

		var q58 = localStorage.getItem("q58");
		var a58 = localStorage.getItem("a58");

		var q59 = localStorage.getItem("q59");
		var a59 = localStorage.getItem("a59");

		var q60 = localStorage.getItem("q60");
		var a60 = localStorage.getItem("a60");
		
		
		$.post(serviceURL + 'log_register.php',{
		
		nu_educ_no: educ_no,	
		nu_current_period: current_period,
		
		nu_q1: q1,
		nu_a1: a1,
		
		nu_q2: q2,
		nu_a2: a2,
		
		nu_q3: q3,
		nu_a3: a3,
		
		nu_q4: q4,
		nu_a4: a4,
		
		nu_q5: q5,
		nu_a5: a5,
		
		nu_q6: q6,
		nu_a6: a6,
		
		nu_q7: q7,
		nu_a7: a7,
		
		nu_q8: q8,
		nu_a8: a8,
		
		nu_q9: q9,
		nu_a9: a9,
		
		nu_q10: q10,
		nu_a10: a10,
		
		nu_q11: q11,
		nu_a11: a11,
		
		nu_q12: q12,
		nu_a12: a12,
		
		nu_q13: q13,
		nu_a13: a13,
		
		nu_q14: q14,
		nu_a14: a14,
		
		nu_q15: q15,
		nu_a15: a15,
		
		nu_q16: q16,
		nu_a16: a16,
		
		nu_q17: q17,
		nu_a17: a17,
		
		nu_q18: q18,
		nu_a18: a18,
		
		nu_q19: q19,
		nu_a19: a19,
		
		nu_q20: q20,
		nu_a20: a20,

		nu_q21: q21,
		nu_a21: a21,
		
		nu_q22: q22,
		nu_a22: a22,
		
		nu_q23: q23,
		nu_a23: a23,
		
		nu_q24: q24,
		nu_a24: a24,
		
		nu_q25: q25,
		nu_a25: a25,
		
		nu_q26: q26,
		nu_a26: a26,
		
		nu_q27: q27,
		nu_a27: a27,
		
		nu_q28: q28,
		nu_a28: a28,
		
		nu_q29: q29,
		nu_a29: a29,
		
		nu_q30: q30,
		nu_a30: a30,

		nu_q31: q31,
		nu_a31: a31,
		
		nu_q32: q32,
		nu_a32: a32,
		
		nu_q33: q33,
		nu_a33: a33,
		
		nu_q34: q34,
		nu_a34: a34,
		
		nu_q35: q35,
		nu_a35: a35,
		
		nu_q36: q36,
		nu_a36: a36,
		
		nu_q37: q37,
		nu_a37: a37,
		
		nu_q38: q38,
		nu_a38: a38,
		
		nu_q39: q39,
		nu_a39: a39,
		
		nu_q40: q40,
		nu_a40: a40,

		nu_q41: q41,
		nu_a41: a41,
		
		nu_q42: q42,
		nu_a42: a42,
		
		nu_q43: q43,
		nu_a43: a43,
		
		nu_q44: q44,
		nu_a44: a44,
		
		nu_q45: q45,
		nu_a45: a45,
		
		nu_q46: q46,
		nu_a46: a46,
		
		nu_q47: q47,
		nu_a47: a47,
		
		nu_q48: q48,
		nu_a48: a48,
		
		nu_q49: q49,
		nu_a49: a49,
		
		nu_q50: q50,
		nu_a50: a50,

		nu_q51: q51,
		nu_a51: a51,
		
		nu_q52: q52,
		nu_a52: a52,
		
		nu_q53: q53,
		nu_a53: a53,
		
		nu_q54: q54,
		nu_a54: a54,
		
		nu_q55: q55,
		nu_a55: a55,
		
		nu_q56: q56,
		nu_a56: a56,
		
		nu_q57: q57,
		nu_a57: a57,
		
		nu_q58: q58,
		nu_a58: a58,
		
		nu_q59: q59,
		nu_a59: a59,
		
		nu_q60: q60,
		nu_a60: a60,


		success: wl,
		});
		
			//###################################################
			
}

function wl(){
	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);
	
	if(ma_hw==7){
	$('#first_heading').text('Register Submitted Successfuly');	
		
	$('#learn_list li').remove();
	
	$('#nu_test_db').remove();
	
	$('#first_heading12').remove();
	
	$('#learn_list').append('<li><a href="home_work.html"><img src="images/Subject_48.png" width="128" height="128"><h3>Home Work</h3><p>Load homework page</p></a></li>');

	$('#learn_list').append('<li><a href="#page"><img src="images/Timetable_48.png" width="128" height="128"><h3>Done</h3><p>Back to main menu</p></a></li>');

	$('#learn_list').listview('refresh');	
	}
	if(ma_hw==1){
	nu_send_hw();
	}
	
			
}

function nu_send_hw(){
	
 var the_q;
 var the_a;

   for(var i = 0; i < q; i++)
    {
		var nu_p = i + 1;
		the_q = localStorage.getItem("q"+ nu_p);
		the_a = document.getElementById("hw"+the_q).value;
		localStorage.setItem("a"+ nu_p, the_a);

	}
				//###################################################
		var educ_no = localStorage.getItem("educ_no");
		var current_period = localStorage.getItem("current_period"); 
		
		var q1 = localStorage.getItem("q1");
		var a1 = localStorage.getItem("a1");

		var q2 = localStorage.getItem("q2");
		var a2 = localStorage.getItem("a2");

		var q3 = localStorage.getItem("q3");
		var a3 = localStorage.getItem("a3");

		var q4 = localStorage.getItem("q4");
		var a4 = localStorage.getItem("a4");

		var q5 = localStorage.getItem("q5");
		var a5 = localStorage.getItem("a5");

		var q6 = localStorage.getItem("q6");
		var a6 = localStorage.getItem("a6");

		var q7 = localStorage.getItem("q7");
		var a7 = localStorage.getItem("a7");

		var q8 = localStorage.getItem("q8");
		var a8 = localStorage.getItem("a8");

		var q9 = localStorage.getItem("q9");
		var a9 = localStorage.getItem("a9");

		var q10 = localStorage.getItem("q10");
		var a10 = localStorage.getItem("a10");

		var q11 = localStorage.getItem("q11");
		var a11 = localStorage.getItem("a11");

		var q12 = localStorage.getItem("q12");
		var a12 = localStorage.getItem("a12");

		var q13 = localStorage.getItem("q13");
		var a13 = localStorage.getItem("a13");

		var q14 = localStorage.getItem("q14");
		var a14 = localStorage.getItem("a14");

		var q15 = localStorage.getItem("q15");
		var a15 = localStorage.getItem("a15");

		var q16 = localStorage.getItem("q16");
		var a16 = localStorage.getItem("a16");

		var q17 = localStorage.getItem("q17");
		var a17 = localStorage.getItem("a17");

		var q18 = localStorage.getItem("q18");
		var a18 = localStorage.getItem("a18");

		var q19 = localStorage.getItem("q19");
		var a19 = localStorage.getItem("a19");

		var q20 = localStorage.getItem("q20");
		var a20 = localStorage.getItem("a20");

		var q21 = localStorage.getItem("q21");
		var a21 = localStorage.getItem("a21");

		var q22 = localStorage.getItem("q22");
		var a22 = localStorage.getItem("a22");

		var q23 = localStorage.getItem("q23");
		var a23 = localStorage.getItem("a23");

		var q24 = localStorage.getItem("q24");
		var a24 = localStorage.getItem("a24");

		var q25 = localStorage.getItem("q25");
		var a25 = localStorage.getItem("a25");

		var q26 = localStorage.getItem("q26");
		var a26 = localStorage.getItem("a26");

		var q27 = localStorage.getItem("q27");
		var a27 = localStorage.getItem("a27");

		var q28 = localStorage.getItem("q28");
		var a28 = localStorage.getItem("a28");

		var q29 = localStorage.getItem("q29");
		var a29 = localStorage.getItem("a29");

		var q30 = localStorage.getItem("q30");
		var a30 = localStorage.getItem("a30");

		var q31 = localStorage.getItem("q31");
		var a31 = localStorage.getItem("a31");

		var q32 = localStorage.getItem("q32");
		var a32 = localStorage.getItem("a32");

		var q33 = localStorage.getItem("q33");
		var a33 = localStorage.getItem("a33");

		var q34 = localStorage.getItem("q34");
		var a34 = localStorage.getItem("a34");

		var q35 = localStorage.getItem("q35");
		var a35 = localStorage.getItem("a35");

		var q36 = localStorage.getItem("q36");
		var a36 = localStorage.getItem("a36");

		var q37 = localStorage.getItem("q37");
		var a37 = localStorage.getItem("a37");

		var q38 = localStorage.getItem("q38");
		var a38 = localStorage.getItem("a38");

		var q39 = localStorage.getItem("q39");
		var a39 = localStorage.getItem("a39");

		var q40 = localStorage.getItem("q40");
		var a40 = localStorage.getItem("a40");

		var q41 = localStorage.getItem("q41");
		var a41 = localStorage.getItem("a41");

		var q42 = localStorage.getItem("q42");
		var a42 = localStorage.getItem("a42");

		var q43 = localStorage.getItem("q43");
		var a43 = localStorage.getItem("a43");

		var q44 = localStorage.getItem("q44");
		var a44 = localStorage.getItem("a44");

		var q45 = localStorage.getItem("q45");
		var a45 = localStorage.getItem("a45");

		var q46 = localStorage.getItem("q46");
		var a46 = localStorage.getItem("a46");

		var q47 = localStorage.getItem("q47");
		var a47 = localStorage.getItem("a47");

		var q48 = localStorage.getItem("q48");
		var a48 = localStorage.getItem("a48");

		var q49 = localStorage.getItem("q49");
		var a49 = localStorage.getItem("a49");

		var q50 = localStorage.getItem("q50");
		var a50 = localStorage.getItem("a50");

		var q51 = localStorage.getItem("q51");
		var a51 = localStorage.getItem("a51");

		var q52 = localStorage.getItem("q52");
		var a52 = localStorage.getItem("a52");

		var q53 = localStorage.getItem("q53");
		var a53 = localStorage.getItem("a53");

		var q54 = localStorage.getItem("q54");
		var a54 = localStorage.getItem("a54");

		var q55 = localStorage.getItem("q55");
		var a55 = localStorage.getItem("a55");

		var q56 = localStorage.getItem("q56");
		var a56 = localStorage.getItem("a56");

		var q57 = localStorage.getItem("q57");
		var a57 = localStorage.getItem("a57");

		var q58 = localStorage.getItem("q58");
		var a58 = localStorage.getItem("a58");

		var q59 = localStorage.getItem("q59");
		var a59 = localStorage.getItem("a59");

		var q60 = localStorage.getItem("q60");
		var a60 = localStorage.getItem("a60");
		
		function hw2(){
	
	$('#first_heading').text('Register Submitted Successfuly');	
		
	$('#learn_list li').remove();
	
	$('#nu_test_db').remove();
	
	$('#first_heading12').remove();
	
	$('#learn_list').append('<li><a href="home_work.html"><img src="images/Subject_48.png" width="128" height="128"><h3>Home Work</h3><p>Load homework page</p></a></li>');

	$('#learn_list').append('<li><a href="#page"><img src="images/Timetable_48.png" width="128" height="128"><h3>Done</h3><p>Back to main menu</p></a></li>');

	$('#learn_list').listview('refresh');	
	
			
		}
		
		$.post(serviceURL + 'log_homework.php',{
		
		nu_educ_no: educ_no,	
		nu_current_period: current_period,
		
		nu_q1: q1,
		nu_a1: a1,
		
		nu_q2: q2,
		nu_a2: a2,
		
		nu_q3: q3,
		nu_a3: a3,
		
		nu_q4: q4,
		nu_a4: a4,
		
		nu_q5: q5,
		nu_a5: a5,
		
		nu_q6: q6,
		nu_a6: a6,
		
		nu_q7: q7,
		nu_a7: a7,
		
		nu_q8: q8,
		nu_a8: a8,
		
		nu_q9: q9,
		nu_a9: a9,
		
		nu_q10: q10,
		nu_a10: a10,
		
		nu_q11: q11,
		nu_a11: a11,
		
		nu_q12: q12,
		nu_a12: a12,
		
		nu_q13: q13,
		nu_a13: a13,
		
		nu_q14: q14,
		nu_a14: a14,
		
		nu_q15: q15,
		nu_a15: a15,
		
		nu_q16: q16,
		nu_a16: a16,
		
		nu_q17: q17,
		nu_a17: a17,
		
		nu_q18: q18,
		nu_a18: a18,
		
		nu_q19: q19,
		nu_a19: a19,
		
		nu_q20: q20,
		nu_a20: a20,

		nu_q21: q21,
		nu_a21: a21,
		
		nu_q22: q22,
		nu_a22: a22,
		
		nu_q23: q23,
		nu_a23: a23,
		
		nu_q24: q24,
		nu_a24: a24,
		
		nu_q25: q25,
		nu_a25: a25,
		
		nu_q26: q26,
		nu_a26: a26,
		
		nu_q27: q27,
		nu_a27: a27,
		
		nu_q28: q28,
		nu_a28: a28,
		
		nu_q29: q29,
		nu_a29: a29,
		
		nu_q30: q30,
		nu_a30: a30,

		nu_q31: q31,
		nu_a31: a31,
		
		nu_q32: q32,
		nu_a32: a32,
		
		nu_q33: q33,
		nu_a33: a33,
		
		nu_q34: q34,
		nu_a34: a34,
		
		nu_q35: q35,
		nu_a35: a35,
		
		nu_q36: q36,
		nu_a36: a36,
		
		nu_q37: q37,
		nu_a37: a37,
		
		nu_q38: q38,
		nu_a38: a38,
		
		nu_q39: q39,
		nu_a39: a39,
		
		nu_q40: q40,
		nu_a40: a40,

		nu_q41: q41,
		nu_a41: a41,
		
		nu_q42: q42,
		nu_a42: a42,
		
		nu_q43: q43,
		nu_a43: a43,
		
		nu_q44: q44,
		nu_a44: a44,
		
		nu_q45: q45,
		nu_a45: a45,
		
		nu_q46: q46,
		nu_a46: a46,
		
		nu_q47: q47,
		nu_a47: a47,
		
		nu_q48: q48,
		nu_a48: a48,
		
		nu_q49: q49,
		nu_a49: a49,
		
		nu_q50: q50,
		nu_a50: a50,

		nu_q51: q51,
		nu_a51: a51,
		
		nu_q52: q52,
		nu_a52: a52,
		
		nu_q53: q53,
		nu_a53: a53,
		
		nu_q54: q54,
		nu_a54: a54,
		
		nu_q55: q55,
		nu_a55: a55,
		
		nu_q56: q56,
		nu_a56: a56,
		
		nu_q57: q57,
		nu_a57: a57,
		
		nu_q58: q58,
		nu_a58: a58,
		
		nu_q59: q59,
		nu_a59: a59,
		
		nu_q60: q60,
		nu_a60: a60,


		success: hw2,
		});
		
}

function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
