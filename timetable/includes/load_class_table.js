var school_code;
var class_code = getUrlVars()["id"];

 
function class_load_dinako(){

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

function class_load_mon_edu_tt(){
var day_no = 1;
var class_code = getUrlVars()["id"];
 
  	
	$.getJSON(serviceURL + 'learner_tt.php?school_code='+school_code+'&day_no='+day_no+'&class_code='+class_code, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("MP1",clas_tt.MP1);
	localStorage.setItem("M1",clas_tt.M1);
	localStorage.setItem("RM1",clas_tt.RM1);
	
	localStorage.setItem("MP2",clas_tt.MP2);
	localStorage.setItem("M2",clas_tt.M2);
	localStorage.setItem("RM2",clas_tt.RM2);
	
	localStorage.setItem("MP3",clas_tt.MP3);
	localStorage.setItem("M3",clas_tt.M3);
	localStorage.setItem("RM3",clas_tt.RM3);
	
	localStorage.setItem("MP4",clas_tt.MP4);
	localStorage.setItem("M4",clas_tt.M4);
	localStorage.setItem("RM4",clas_tt.RM4);
	
	localStorage.setItem("MP5",clas_tt.MP5);
	localStorage.setItem("M5",clas_tt.M5);
	localStorage.setItem("RM5",clas_tt.RM5);
	
	localStorage.setItem("MP6",clas_tt.MP6);
	localStorage.setItem("M6",clas_tt.M6);
	localStorage.setItem("RM6",clas_tt.RM6);
	
	localStorage.setItem("MP7",clas_tt.MP7);
	localStorage.setItem("M7",clas_tt.M7);
	localStorage.setItem("RM7",clas_tt.RM7);
	
	localStorage.setItem("MP8",clas_tt.MP8);
	localStorage.setItem("M8",clas_tt.M8);
	localStorage.setItem("RM8",clas_tt.RM8);
	
	localStorage.setItem("MP9",clas_tt.MP9);
	localStorage.setItem("M9",clas_tt.M9);
	localStorage.setItem("RM9",clas_tt.RM9);
	
	localStorage.setItem("MP10",clas_tt.MP10);
	localStorage.setItem("M10",clas_tt.M10);
	localStorage.setItem("RM10",clas_tt.RM10);
	
	localStorage.setItem("MP11",clas_tt.MP11);
	localStorage.setItem("M11",clas_tt.M11);
	localStorage.setItem("RM11",clas_tt.RM11);
	
	localStorage.setItem("MP12",clas_tt.MP12);
	localStorage.setItem("M12",clas_tt.M12);
	localStorage.setItem("RM12",clas_tt.RM12);
	});
	});
}

function class_load_tue_edu_tt(){

 var day_no = 2;
var class_code = getUrlVars()["id"];
  	
	$.getJSON(serviceURL + 'learner_tt.php?school_code='+school_code+'&day_no='+day_no+'&class_code='+class_code, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("TP1",clas_tt.MP1);
	localStorage.setItem("T1",clas_tt.M1);
	localStorage.setItem("RT1",clas_tt.RM1);
	
	localStorage.setItem("TP2",clas_tt.MP2);
	localStorage.setItem("T2",clas_tt.M2);
	localStorage.setItem("RT2",clas_tt.RM2);
	
	localStorage.setItem("TP3",clas_tt.MP3);
	localStorage.setItem("T3",clas_tt.M3);
	localStorage.setItem("RT3",clas_tt.RM3);
	
	localStorage.setItem("TP4",clas_tt.MP4);
	localStorage.setItem("T4",clas_tt.M4);
	localStorage.setItem("RT4",clas_tt.RM4);
	
	localStorage.setItem("TP5",clas_tt.MP5);
	localStorage.setItem("T5",clas_tt.M5);
	localStorage.setItem("RT5",clas_tt.RM5);
	
	localStorage.setItem("TP6",clas_tt.MP6);
	localStorage.setItem("T6",clas_tt.M6);
	localStorage.setItem("RT6",clas_tt.RM6);
	
	localStorage.setItem("TP7",clas_tt.MP7);
	localStorage.setItem("T7",clas_tt.M7);
	localStorage.setItem("RT7",clas_tt.RM7);
	
	localStorage.setItem("TP8",clas_tt.MP8);
	localStorage.setItem("T8",clas_tt.M8);
	localStorage.setItem("RT8",clas_tt.RM8);
	
	localStorage.setItem("TP9",clas_tt.MP9);
	localStorage.setItem("T9",clas_tt.M9);
	localStorage.setItem("RT9",clas_tt.RM9);
	
	localStorage.setItem("TP10",clas_tt.MP10);
	localStorage.setItem("T10",clas_tt.M10);
	localStorage.setItem("RT10",clas_tt.RM10);
	
	localStorage.setItem("TP11",clas_tt.MP11);
	localStorage.setItem("T11",clas_tt.M11);
	localStorage.setItem("RT11",clas_tt.RM11);
	
	localStorage.setItem("TP12",clas_tt.MP12);
	localStorage.setItem("T12",clas_tt.M12);
	localStorage.setItem("RT12",clas_tt.RM12);
	});
	});
}

function class_load_wed_edu_tt(){

 var day_no = 3;
  var class_code = getUrlVars()["id"];
	
	$.getJSON(serviceURL + 'learner_tt.php?school_code='+school_code+'&day_no='+day_no+'&class_code='+class_code, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("WP1",clas_tt.MP1);
	localStorage.setItem("W1",clas_tt.M1);
	localStorage.setItem("RW1",clas_tt.RM1);
	
	localStorage.setItem("WP2",clas_tt.MP2);
	localStorage.setItem("W2",clas_tt.M2);
	localStorage.setItem("RW2",clas_tt.RM2);
	
	localStorage.setItem("WP3",clas_tt.MP3);
	localStorage.setItem("W3",clas_tt.M3);
	localStorage.setItem("RW3",clas_tt.RM3);
	
	localStorage.setItem("WP4",clas_tt.MP4);
	localStorage.setItem("W4",clas_tt.M4);
	localStorage.setItem("RW4",clas_tt.RM4);
	
	localStorage.setItem("WP5",clas_tt.MP5);
	localStorage.setItem("W5",clas_tt.M5);
	localStorage.setItem("RW5",clas_tt.RM5);
	
	localStorage.setItem("WP6",clas_tt.MP6);
	localStorage.setItem("W6",clas_tt.M6);
	localStorage.setItem("RW6",clas_tt.RM6);
	
	localStorage.setItem("WP7",clas_tt.MP7);
	localStorage.setItem("W7",clas_tt.M7);
	localStorage.setItem("RW7",clas_tt.RM7);
	
	localStorage.setItem("WP8",clas_tt.MP8);
	localStorage.setItem("W8",clas_tt.M8);
	localStorage.setItem("RW8",clas_tt.RM8);
	
	localStorage.setItem("WP9",clas_tt.MP9);
	localStorage.setItem("W9",clas_tt.M9);
	localStorage.setItem("RW9",clas_tt.RM9);
	
	localStorage.setItem("WP10",clas_tt.MP10);
	localStorage.setItem("W10",clas_tt.M10);
	localStorage.setItem("RW10",clas_tt.RM10);
	
	localStorage.setItem("WP11",clas_tt.MP11);
	localStorage.setItem("W11",clas_tt.M11);
	localStorage.setItem("RW11",clas_tt.RM11);
	
	localStorage.setItem("WP12",clas_tt.MP12);
	localStorage.setItem("W12",clas_tt.M12);
	localStorage.setItem("RW12",clas_tt.RM12);
	});
	});
}

function class_load_thu_edu_tt(){

 var day_no = 4;
 var class_code = getUrlVars()["id"];
 	
	$.getJSON(serviceURL + 'learner_tt.php?school_code='+school_code+'&day_no='+day_no+'&class_code='+class_code, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("THP1",clas_tt.MP1);
	localStorage.setItem("TH1",clas_tt.M1);
	localStorage.setItem("RTH1",clas_tt.RM1);
	
	localStorage.setItem("THP2",clas_tt.MP2);
	localStorage.setItem("TH2",clas_tt.M2);
	localStorage.setItem("RTH2",clas_tt.RM2);
	
	localStorage.setItem("THP3",clas_tt.MP3);
	localStorage.setItem("TH3",clas_tt.M3);
	localStorage.setItem("RTH3",clas_tt.RM3);
	
	localStorage.setItem("THP4",clas_tt.MP4);
	localStorage.setItem("TH4",clas_tt.M4);
	localStorage.setItem("RTH4",clas_tt.RM4);
	
	localStorage.setItem("THP5",clas_tt.MP5);
	localStorage.setItem("TH5",clas_tt.M5);
	localStorage.setItem("RTH5",clas_tt.RM5);
	
	localStorage.setItem("THP6",clas_tt.MP6);
	localStorage.setItem("TH6",clas_tt.M6);
	localStorage.setItem("RTH6",clas_tt.RM6);
	
	localStorage.setItem("THP7",clas_tt.MP7);
	localStorage.setItem("TH7",clas_tt.M7);
	localStorage.setItem("RTH7",clas_tt.RM7);
	
	localStorage.setItem("THP8",clas_tt.MP8);
	localStorage.setItem("TH8",clas_tt.M8);
	localStorage.setItem("RTH8",clas_tt.RM8);
	
	localStorage.setItem("THP9",clas_tt.MP9);
	localStorage.setItem("TH9",clas_tt.M9);
	localStorage.setItem("RTH9",clas_tt.RM9);
	
	localStorage.setItem("THP10",clas_tt.MP10);
	localStorage.setItem("TH10",clas_tt.M10);
	localStorage.setItem("RTH10",clas_tt.RM10);
	
	localStorage.setItem("THP11",clas_tt.MP11);
	localStorage.setItem("TH11",clas_tt.M11);
	localStorage.setItem("RTH11",clas_tt.RM11);
	
	localStorage.setItem("THP12",clas_tt.MP12);
	localStorage.setItem("TH12",clas_tt.M12);
	localStorage.setItem("RTH12",clas_tt.RM12);
	});
	});
}

function class_load_fri_edu_tt(){

 var day_no = 5;
 var class_code = getUrlVars()["id"];
 	
	$.getJSON(serviceURL + 'learner_tt.php?school_code='+school_code+'&day_no='+day_no+'&class_code='+class_code, function(data) {
	
	class_tt = data.items;
	
	$.each(class_tt, function(index, clas_tt) {
	
	localStorage.setItem("FP1",clas_tt.MP1);
	localStorage.setItem("F1",clas_tt.M1);
	localStorage.setItem("RF1",clas_tt.RM1);
	
	localStorage.setItem("FP2",clas_tt.MP2);
	localStorage.setItem("F2",clas_tt.M2);
	localStorage.setItem("RF2",clas_tt.RM2);
	
	localStorage.setItem("FP3",clas_tt.MP3);
	localStorage.setItem("F3",clas_tt.M3);
	localStorage.setItem("RF3",clas_tt.RM3);
	
	localStorage.setItem("FP4",clas_tt.MP4);
	localStorage.setItem("F4",clas_tt.M4);
	localStorage.setItem("RF4",clas_tt.RM4);
	
	localStorage.setItem("FP5",clas_tt.MP5);
	localStorage.setItem("F5",clas_tt.M5);
	localStorage.setItem("RF5",clas_tt.RM5);
	
	localStorage.setItem("FP6",clas_tt.MP6);
	localStorage.setItem("F6",clas_tt.M6);
	localStorage.setItem("RF6",clas_tt.RM6);
	
	localStorage.setItem("FP7",clas_tt.MP7);
	localStorage.setItem("F7",clas_tt.M7);
	localStorage.setItem("RF7",clas_tt.RM7);
	
	localStorage.setItem("FP8",clas_tt.MP8);
	localStorage.setItem("F8",clas_tt.M8);
	localStorage.setItem("RF8",clas_tt.RM8);
	
	localStorage.setItem("FP9",clas_tt.MP9);
	localStorage.setItem("F9",clas_tt.M9);
	localStorage.setItem("RF9",clas_tt.RM9);
	
	localStorage.setItem("FP10",clas_tt.MP10);
	localStorage.setItem("F10",clas_tt.M10);
	localStorage.setItem("RF10",clas_tt.RM10);
	
	localStorage.setItem("FP11",clas_tt.MP11);
	localStorage.setItem("F11",clas_tt.M11);
	localStorage.setItem("RF11",clas_tt.RM11);
	
	localStorage.setItem("FP12",clas_tt.MP12);
	localStorage.setItem("F12",clas_tt.M12);
	localStorage.setItem("RF12",clas_tt.RM12);
	});
	});
	
	var ma_virgin = 1;
		var reloader = 1;
	localStorage.setItem("reloader", reloader);

	$('#class_prompt_question li').remove();
	localStorage.setItem("ma_virgin", ma_virgin);
 $('#first_heading4').text("Timetable Loaded Successfully");
 $('#class_ld_recent').remove();
	
 $('#class_prompt_question').append('<li><a href="#page"><img src="images/help-icon.png" width="128" height="128"><h3>Restart</h3><p>Go to main menu</p></a></li>');
 $('#class_prompt_question').listview('refresh');	
}




$('#load_class_table').live('pageshow', function() {
		  
  			

			class_load_dinako();
			class_load_mon_edu_tt();
			class_load_tue_edu_tt();
			class_load_wed_edu_tt();
			class_load_thu_edu_tt();
			class_load_fri_edu_tt();
          
 
			
});


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
