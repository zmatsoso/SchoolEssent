var school_code;
 
function load_dinako(){
var hold_IftwoFirst;
var hold_IftwoSecond;
var hold_Iftwo2First;
var hold_Iftwo2Second;

	school_code = localStorage.getItem("school_code");
	$.getJSON(serviceURL + 'get_dinako_tt.php?school_code='+school_code, function(data) {
	
	ActCode = data.items;
	
	$.each(ActCode, function(index, dinako) {

	localStorage.setItem("BreaksPerDay", dinako.BreaksPerDay);
	localStorage.setItem("PeriodsPerDay", dinako.PeriodsPerDay);
	localStorage.setItem("IfTwo1", dinako.IfTwo1);
	localStorage.setItem("IfTwo2", dinako.IfTwo2);
	
	zP1S = (dinako.P1S).split(':');
	zP1E = (dinako.P1E).split(':');
	localStorage.setItem("P1S", zP1S[0] + ':' + zP1S[1]);
	localStorage.setItem("P1E", zP1E[0] + ':' + zP1E[1]);
	
	var zP2S = (dinako.P2S).split(':');
	var zP2E = (dinako.P2E).split(':');
	localStorage.setItem("P2S", zP2S[0] + ':' + zP2S[1]);
	localStorage.setItem("P2E", zP2E[0] + ':' + zP2E[1]);
	
	var zP3S = (dinako.P3S).split(':');
	var zP3E = (dinako.P3E).split(':');
	localStorage.setItem("P3S", zP3S[0] + ':' + zP3S[1]);
	localStorage.setItem("P3E", zP3E[0] + ':' + zP3E[1]);
	
	var zP4S = (dinako.P4S).split(':');
	var zP4E = (dinako.P4E).split(':');
	localStorage.setItem("P4S", zP4S[0] + ':' + zP4S[1]);
	localStorage.setItem("P4E", zP4E[0] + ':' + zP4E[1]);
	
	var zP5S = (dinako.P5S).split(':');
	var zP5E = (dinako.P5E).split(':');
	localStorage.setItem("P5S", zP5S[0] + ':' + zP5S[1]);
	localStorage.setItem("P5E", zP5E[0] + ':' + zP5E[1]);
	
	var zP6S = (dinako.P6S).split(':');
	var zP6E = (dinako.P6E).split(':');
	localStorage.setItem("P6S", zP6S[0] + ':' + zP6S[1]);
	localStorage.setItem("P6E", zP6E[0] + ':' + zP6E[1]);
	
	var zP7S = (dinako.P7S).split(':');
	var zP7E = (dinako.P7E).split(':');
	localStorage.setItem("P7S", zP7S[0] + ':' + zP7S[1]);
	localStorage.setItem("P7E", zP7E[0] + ':' + zP7E[1]);
	
	var zP8S = (dinako.P8S).split(':');
	var zP8E = (dinako.P8E).split(':');
	localStorage.setItem("P8S", zP8S[0] + ':' + zP8S[1]);
	localStorage.setItem("P8E", zP8E[0] + ':' + zP8E[1]);
	
	var zP9S = (dinako.P9S).split(':');
	var zP9E = (dinako.P9E).split(':');
	localStorage.setItem("P9S", zP9S[0] + ':' + zP9S[1]);
	localStorage.setItem("P9E", zP9E[0] + ':' + zP9E[1]);
	
	var zP10S = (dinako.P10S).split(':');
	var zP10E = (dinako.P10E).split(':');
	localStorage.setItem("P10S", zP10S[0] + ':' + zP10S[1]);
	localStorage.setItem("P10E", zP10E[0] + ':' + zP10E[1]);
	
	var zP11S = (dinako.P11S).split(':');
	var zP11E = (dinako.P11E).split(':');
	localStorage.setItem("P11S", zP11S[0] + ':' + zP11S[1]);
	localStorage.setItem("P11E", zP11E[0] + ':' + zP11E[1]);
	
	var zP12S = (dinako.P12S).split(':');
	var zP12E = (dinako.P12E).split(':');
	localStorage.setItem("P12S", zP12S[0] + ':' + zP12S[1]);
	localStorage.setItem("P12E", zP12E[0] + ':' + zP12E[1]);
	
	});
	});
	var IfTwo1 = localStorage.getItem("IfTwo1");
	if(IfTwo1==2){
		 hold_IftwoFirst = localStorage.getItem("P2E");
		 hold_IftwoSecond = localStorage.getItem("P3S");
	}
	if(IfTwo1==3){
		 hold_IftwoFirst = localStorage.getItem("P3E");
		 hold_IftwoSecond = localStorage.getItem("P4S");
	}
	if(IfTwo1==4){
		 hold_IftwoFirst = localStorage.getItem("P4E");
		 hold_IftwoSecond = localStorage.getItem("P5S");
	}
	if(IfTwo1==5){
		 hold_IftwoFirst = localStorage.getItem("P5E");
		 hold_IftwoSecond = localStorage.getItem("P6S");
	}
	if(IfTwo1==6){
		 hold_IftwoFirst = localStorage.getItem("P6E");
		 hold_IftwoSecond = localStorage.getItem("P7S");
	}
	if(IfTwo1==7){
		 hold_IftwoFirst = localStorage.getItem("P7E");
		 hold_IftwoSecond = localStorage.getItem("P8S");
	}
	if(IfTwo1==8){
		 hold_IftwoFirst = localStorage.getItem("P8E");
		 hold_IftwoSecond = localStorage.getItem("P9S");
	}
	if(IfTwo1==9){
		 hold_IftwoFirst = localStorage.getItem("P9E");
		 hold_IftwoSecond = localStorage.getItem("P10S");
	}

	localStorage.setItem("first_lunch", hold_IftwoFirst+' - '+hold_IftwoSecond+'  Break');
	
	var IfTwo2 = localStorage.getItem("IfTwo2");
	if(IfTwo2==3){
		 hold_Iftwo2First = localStorage.getItem("P3E");
		 hold_Iftwo2Second = localStorage.getItem("P4S");
	}
	if(IfTwo2==4){
		 hold_Iftwo2First = localStorage.getItem("P4E");
		 hold_Iftwo2Second = localStorage.getItem("P5S");
	}
	if(IfTwo2==5){
		 hold_Iftwo2First = localStorage.getItem("P5E");
		 hold_Iftwo2Second = localStorage.getItem("P6S");
	}
	if(IfTwo2==6){
		 hold_Iftwo2First = localStorage.getItem("P6E");
		 hold_Iftwo2Second = localStorage.getItem("P7S");
	}
	if(IfTwo2==7){
		 hold_Iftwo2First = localStorage.getItem("P7E");
		 hold_Iftwo2Second = localStorage.getItem("P8S");
	}
	if(IfTwo2==8){
		 hold_Iftwo2First = localStorage.getItem("P8E");
		 hold_Iftwo2Second = localStorage.getItem("P9S");
	}
	if(IfTwo2==9){
		 hold_Iftwo2First = localStorage.getItem("P9E");
		 hold_Iftwo2Second = localStorage.getItem("P10S");
	}

	localStorage.setItem("second_lunch", hold_Iftwo2First+' - '+hold_Iftwo2Second+'  Lunch');

}

function load_mon_edu_tt(){
 var educ_no = getUrlVars()["id"];
 var day_no = 1;
 
 $.getJSON(serviceURL + 'edu_tt.php?school_code='+school_code+'&day_no='+day_no+'&educ_no='+educ_no, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("MC1", clas_tt.MC1);
	localStorage.setItem("M1", clas_tt.M1);

	localStorage.setItem("MC2", clas_tt.MC2);
	localStorage.setItem("M2", clas_tt.M2);

	localStorage.setItem("MC3", clas_tt.MC3);
	localStorage.setItem("M3", clas_tt.M3);

	localStorage.setItem("MC4", clas_tt.MC4);
	localStorage.setItem("M4", clas_tt.M4);

	localStorage.setItem("MC5", clas_tt.MC5);
	localStorage.setItem("M5", clas_tt.M5);

	localStorage.setItem("MC6", clas_tt.MC6);
	localStorage.setItem("M6", clas_tt.M6);

	localStorage.setItem("MC7", clas_tt.MC7);
	localStorage.setItem("M7", clas_tt.M7);

	localStorage.setItem("MC8", clas_tt.MC8);
	localStorage.setItem("M8", clas_tt.M8);

	localStorage.setItem("MC9", clas_tt.MC9);
	localStorage.setItem("M9", clas_tt.M9);

	localStorage.setItem("MC10", clas_tt.MC10);
	localStorage.setItem("M10", clas_tt.M10);

	localStorage.setItem("MC11", clas_tt.MC11);
	localStorage.setItem("M11", clas_tt.M11);


	});
	});
	
}


function load_Tue_edu_tt(){
 var educ_no = getUrlVars()["id"];
 var day_no = 2;
 	
	$.getJSON(serviceURL + 'edu_tt.php?school_code='+school_code+'&day_no='+day_no+'&educ_no='+educ_no, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("TC1", clas_tt.MC1);
	localStorage.setItem("T1", clas_tt.M1);

	localStorage.setItem("TC2", clas_tt.MC2);
	localStorage.setItem("T2", clas_tt.M2);

	localStorage.setItem("TC3", clas_tt.MC3);
	localStorage.setItem("T3", clas_tt.M3);

	localStorage.setItem("TC4", clas_tt.MC4);
	localStorage.setItem("T4", clas_tt.M4);

	localStorage.setItem("TC5", clas_tt.MC5);
	localStorage.setItem("T5", clas_tt.M5);

	localStorage.setItem("TC6", clas_tt.MC6);
	localStorage.setItem("T6", clas_tt.M6);

	localStorage.setItem("TC7", clas_tt.MC7);
	localStorage.setItem("T7", clas_tt.M7);

	localStorage.setItem("TC8", clas_tt.MC8);
	localStorage.setItem("T8", clas_tt.M8);

	localStorage.setItem("TC9", clas_tt.MC9);
	localStorage.setItem("T9", clas_tt.M9);

	localStorage.setItem("TC10", clas_tt.MC10);
	localStorage.setItem("T10", clas_tt.M10);

	localStorage.setItem("TC11", clas_tt.MC11);
	localStorage.setItem("T11", clas_tt.M11);


	});
	});
	
}


function load_Wed_edu_tt(){
 var educ_no = getUrlVars()["id"];
 var day_no = 3;
 	
	$.getJSON(serviceURL + 'edu_tt.php?school_code='+school_code+'&day_no='+day_no+'&educ_no='+educ_no, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("WC1", clas_tt.MC1);
	localStorage.setItem("W1", clas_tt.M1);

	localStorage.setItem("WC2", clas_tt.MC2);
	localStorage.setItem("W2", clas_tt.M2);

	localStorage.setItem("WC3", clas_tt.MC3);
	localStorage.setItem("W3", clas_tt.M3);

	localStorage.setItem("WC4", clas_tt.MC4);
	localStorage.setItem("W4", clas_tt.M4);

	localStorage.setItem("WC5", clas_tt.MC5);
	localStorage.setItem("W5", clas_tt.M5);

	localStorage.setItem("WC6", clas_tt.MC6);
	localStorage.setItem("W6", clas_tt.M6);

	localStorage.setItem("WC7", clas_tt.MC7);
	localStorage.setItem("W7", clas_tt.M7);

	localStorage.setItem("WC8", clas_tt.MC8);
	localStorage.setItem("W8", clas_tt.M8);

	localStorage.setItem("WC9", clas_tt.MC9);
	localStorage.setItem("W9", clas_tt.M9);

	localStorage.setItem("WC10", clas_tt.MC10);
	localStorage.setItem("W10", clas_tt.M10);

	localStorage.setItem("WC11", clas_tt.MC11);
	localStorage.setItem("W11", clas_tt.M11);


	});
	});
	
}

function load_Thur_edu_tt(){
 var educ_no = getUrlVars()["id"];
 var day_no = 4;
 	
	$.getJSON(serviceURL + 'edu_tt.php?school_code='+school_code+'&day_no='+day_no+'&educ_no='+educ_no, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("THC1", clas_tt.MC1);
	localStorage.setItem("TH1", clas_tt.M1);

	localStorage.setItem("THC2", clas_tt.MC2);
	localStorage.setItem("TH2", clas_tt.M2);

	localStorage.setItem("THC3", clas_tt.MC3);
	localStorage.setItem("TH3", clas_tt.M3);

	localStorage.setItem("THC4", clas_tt.MC4);
	localStorage.setItem("TH4", clas_tt.M4);

	localStorage.setItem("THC5", clas_tt.MC5);
	localStorage.setItem("TH5", clas_tt.M5);

	localStorage.setItem("THC6", clas_tt.MC6);
	localStorage.setItem("TH6", clas_tt.M6);

	localStorage.setItem("THC7", clas_tt.MC7);
	localStorage.setItem("TH7", clas_tt.M7);

	localStorage.setItem("THC8", clas_tt.MC8);
	localStorage.setItem("TH8", clas_tt.M8);

	localStorage.setItem("THC9", clas_tt.MC9);
	localStorage.setItem("TH9", clas_tt.M9);

	localStorage.setItem("THC10", clas_tt.MC10);
	localStorage.setItem("TH10", clas_tt.M10);

	localStorage.setItem("THC11", clas_tt.MC11);
	localStorage.setItem("TH11", clas_tt.M11);


	});
	});
	
}

function load_Fri_edu_tt(){
 var educ_no = getUrlVars()["id"];
 var day_no = 5;
 	
	$.getJSON(serviceURL + 'edu_tt.php?school_code='+school_code+'&day_no='+day_no+'&educ_no='+educ_no, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("FC1", clas_tt.MC1);
	localStorage.setItem("F1", clas_tt.M1);

	localStorage.setItem("FC2", clas_tt.MC2);
	localStorage.setItem("F2", clas_tt.M2);

	localStorage.setItem("FC3", clas_tt.MC3);
	localStorage.setItem("F3", clas_tt.M3);

	localStorage.setItem("FC4", clas_tt.MC4);
	localStorage.setItem("F4", clas_tt.M4);

	localStorage.setItem("FC5", clas_tt.MC5);
	localStorage.setItem("F5", clas_tt.M5);

	localStorage.setItem("FC6", clas_tt.MC6);
	localStorage.setItem("F6", clas_tt.M6);

	localStorage.setItem("FC7", clas_tt.MC7);
	localStorage.setItem("F7", clas_tt.M7);

	localStorage.setItem("FC8", clas_tt.MC8);
	localStorage.setItem("F8", clas_tt.M8);

	localStorage.setItem("FC9", clas_tt.MC9);
	localStorage.setItem("F9", clas_tt.M9);

	localStorage.setItem("FC10", clas_tt.MC10);
	localStorage.setItem("F10", clas_tt.M10);

	localStorage.setItem("FC11", clas_tt.MC11);
	localStorage.setItem("F11", clas_tt.M11);


	});
	});
	var ma_virgin;
	var ret_active_version = localStorage.getItem("ret_active_version");
	if(Number(ret_active_version)==1){
	ma_virgin = 2;
	}else{
	ma_virgin = 3;
	}
	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);

	$('#prompt_question li').remove();
	localStorage.setItem("ma_virgin", ma_virgin);
 $('#first_heading2').text("Timetable Loaded Successfully");
 $('#ld_recent').remove();
	
 $('#prompt_question').append('<li><a href="#page""><img src="images/help-icon.png" width="128" height="128"><h3>Restart</h3><p>Go to main menu</p></a></li>');
 $('#prompt_question').listview('refresh');	

}





$('#load_edu_table').live('pageshow', function() {
		  
  			

			load_dinako();
			load_mon_edu_tt();
			load_Tue_edu_tt();
			load_Wed_edu_tt();
			load_Thur_edu_tt();
			load_Fri_edu_tt();
          
 
			
			
			
});