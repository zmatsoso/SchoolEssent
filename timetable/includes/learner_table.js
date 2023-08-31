var day_no;
var school_code = localStorage.getItem("school_code");

$('#learner_tt').live('pageshow', function(event) {
	
	load_periods();
	load_tt();

			$('#mon').on("tap click", function() {

			load_tt_mon();
          
            });

			
			$('#tue').on("tap click", function() {

			load_tt_tue();
		          
            });

			$('#wed').on("tap click", function() {

			load_tt_wed();
		          
            });

			$('#thur').on("tap click", function() {

			load_tt_thur();
		          
            });

			$('#fri').on("tap click", function() {

			load_tt_fri();
		          
            });

});

function load_periods(){
	var P1S = localStorage.getItem("P1S");
	var P1E = localStorage.getItem("P1E");
	
	var P2S = localStorage.getItem("P2S");
	var P2E = localStorage.getItem("P2E");
	
	var P3S = localStorage.getItem("P3S");
	var P3E = localStorage.getItem("P3E");
	
	var P4S = localStorage.getItem("P4S");
	var P4E = localStorage.getItem("P4E");
	
	var P5S = localStorage.getItem("P5S");
	var P5E = localStorage.getItem("P5E");
	
	var P6S = localStorage.getItem("P6S");
	var P6E = localStorage.getItem("P6E");
	
	var P7S = localStorage.getItem("P7S");
	var P7E = localStorage.getItem("P7E");
	
	var P8S = localStorage.getItem("P8S");
	var P8E = localStorage.getItem("P8E");
	
	var P9S = localStorage.getItem("P9S");
	var P9E = localStorage.getItem("P9E");
	
	var P10S = localStorage.getItem("P10S");
	var P10E = localStorage.getItem("P10E");
	
	var P11S = localStorage.getItem("P11S");
	var P11E = localStorage.getItem("P11E");
	
	var P12S = localStorage.getItem("P12S");
	var P12E = localStorage.getItem("P12E");
	
	$('#P1S').text(P1S);
	$('#P1E').text(P1E);
	
	$('#P2S').text(P2S);
	$('#P2E').text(P2E);

	$('#P3S').text(P3S);
	$('#P3E').text(P3E);

	$('#P4S').text(P4S);
	$('#P4E').text(P4E);

	$('#P5S').text(P5S);
	$('#P5E').text(P5E);

	$('#P6S').text(P6S);
	$('#P6E').text(P6E);

	$('#P7S').text(P7S);
	$('#P7E').text(P7E);

	$('#P8S').text(P8S);
	$('#P8E').text(P8E);

	$('#P9S').text(P9S);
	$('#P9E').text(P9E);

	$('#P10S').text(P10S);
	$('#P10E').text(P10E);

	$('#P11S').text(P11S);
	$('#P11E').text(P11E);

	$('#P12S').text(P12S);
	$('#P12E').text(P12E);

		var IfTwo1 = localStorage.getItem("IfTwo1");
	if(IfTwo1==2){
		$('#class_first_lunch').text(P2E+" - "+P3S+"  Break");
	}
	if(IfTwo1==3){
		$('#class_first_lunch').text(P3E+" - "+P4S+"  Break");
	}
	if(IfTwo1==4){
		$('#class_first_lunch').text(P4E+" - "+P5S+"  Break");
	}
	if(IfTwo1==5){
		$('#class_first_lunch').text(P5E+" - "+P6S+"  Break");
	}
	if(IfTwo1==6){
		$('#class_first_lunch').text(P6E+" - "+P7S+"  Break");
	}
	if(IfTwo1==7){
		$('#class_first_lunch').text(P7E+" - "+P8S+"  Break");
	}
	if(IfTwo1==8){
		$('#class_first_lunch').text(P8E+" - "+P9S+"  Break");
	}
	if(IfTwo1==9){
		$('#class_first_lunch').text(P9E+" - "+P10S+"  Break");
	}

	
	var IfTwo2 = localStorage.getItem("IfTwo2");
	if(IfTwo2==3){
		$('#class_second_lunch').text(P3E+" - "+P4S+" : Lunch");
	}
	if(IfTwo2==4){
		$('#class_second_lunch').text(P4E+" - "+P5S+" : Lunch");
	}
	if(IfTwo2==5){
		$('#class_second_lunch').text(P5E+" - "+P6S+" : Lunch");
	}
	if(IfTwo2==6){
		$('#class_second_lunch').text(P6E+" - "+P7S+"  Lunch");
	}
	if(IfTwo2==7){
		$('#class_second_lunch').text(P7E+" - "+P8S+" : Lunch");
	}
	if(IfTwo2==8){
		$('#class_second_lunch').text(P8E+" - "+P9S+" : Lunch");
	}
	if(IfTwo2==9){
		$('#class_second_lunch').text(P9E+" - "+P10S+" : Lunch");
	}
	if(IfTwo2==10){
		$('#class_second_lunch').text(P10E+" - "+P11S+" : Lunch");
	}

}


function load_tt(){


var day_of_week = new Date().getDay();


if(day_of_week==1){
	load_tt_mon();
}
if(day_of_week==2){
	load_tt_tue();
}
if(day_of_week==3){
	load_tt_wed();
}
if(day_of_week==4){
	load_tt_thur();
}
if(day_of_week==5){
	load_tt_fri();
}

}


function load_tt_mon(){

var class_code = localStorage.getItem("class_code");
var disp_class_code = class_code.split('%');
$('#Class_Name').text(disp_class_code[0]);
$('#day_name').text("MONDAY");

	var MP1 = localStorage.getItem("MP1");
	$('#MP1').text(MP1);
	var M1 = localStorage.getItem("M1");
	$('#M1').text(M1);
	var RM1 = localStorage.getItem("RM1");
	$('#RM1').text(RM1);

		var MP2 = localStorage.getItem("MP2");
	$('#MP2').text(MP2);
	var M2 = localStorage.getItem("M2");
	$('#M2').text(M2);
	var RM2 = localStorage.getItem("RM2");
	$('#RM2').text(RM2);

	var MP3 = localStorage.getItem("MP3");
	$('#MP3').text(MP3);
	var M3 = localStorage.getItem("M3");
	$('#M3').text(M3);
	var RM3 = localStorage.getItem("RM3");
	$('#RM3').text(RM3);

			var MP4 = localStorage.getItem("MP4");
	$('#MP4').text(MP4);
	var M4 = localStorage.getItem("M4");
	$('#M4').text(M4);
	var RM4 = localStorage.getItem("RM4");
	$('#RM4').text(RM4);

		var MP5 = localStorage.getItem("MP5");
	$('#MP5').text(MP5);
	var M5 = localStorage.getItem("M5");
	$('#M5').text(M5);
	var RM5 = localStorage.getItem("RM5");
	$('#RM5').text(RM5);

		var MP6 = localStorage.getItem("MP6");
	$('#MP6').text(MP6);
	var M6 = localStorage.getItem("M6");
	$('#M6').text(M6);
	var RM6 = localStorage.getItem("RM6");
	$('#RM6').text(RM6);

		var MP7 = localStorage.getItem("MP7");
	$('#MP7').text(MP7);
	var M7 = localStorage.getItem("M7");
	$('#M7').text(M7);
	var RM7 = localStorage.getItem("RM7");
	$('#RM7').text(RM7);

		var MP8 = localStorage.getItem("MP8");
	$('#MP8').text(MP8);
	var M8 = localStorage.getItem("M8");
	$('#M8').text(M8);
	var RM8 = localStorage.getItem("RM8");
	$('#RM8').text(RM8);

		var MP9 = localStorage.getItem("MP9");
	$('#MP9').text(MP9);
	var M9 = localStorage.getItem("M9");
	$('#M9').text(M9);
	var RM9 = localStorage.getItem("RM9");
	$('#RM9').text(RM9);

		var MP10 = localStorage.getItem("MP10");
	$('#MP10').text(MP10);
	var M10 = localStorage.getItem("M10");
	$('#M10').text(M10);
	var RM10 = localStorage.getItem("RM10");
	$('#RM10').text(RM10);

		var MP11 = localStorage.getItem("MP11");
	$('#MP11').text(MP11);
	var M11 = localStorage.getItem("M11");
	$('#M11').text(M11);
	var RM11 = localStorage.getItem("RM11");
	$('#RM11').text(RM11);

		var MP12 = localStorage.getItem("MP12");
	$('#MP12').text(MP12);
	var M12 = localStorage.getItem("M12");
	$('#M12').text(M12);
	var RM12 = localStorage.getItem("RM12");
	$('#RM12').text(RM12);

}

function load_tt_tue(){

var class_code = localStorage.getItem("class_code");
var disp_class_code = class_code.split('%');
$('#Class_Name').text(disp_class_code[0]);
$('#day_name').text("TUESDAY");

	var MP1 = localStorage.getItem("TP1");
	$('#MP1').text(MP1);
	var M1 = localStorage.getItem("T1");
	$('#M1').text(M1);
	var RM1 = localStorage.getItem("RT1");
	$('#RM1').text(RM1);

		var MP2 = localStorage.getItem("TP2");
	$('#MP2').text(MP2);
	var M2 = localStorage.getItem("T2");
	$('#M2').text(M2);
	var RM2 = localStorage.getItem("RT2");
	$('#RM2').text(RM2);

	var MP3 = localStorage.getItem("TP3");
	$('#MP3').text(MP3);
	var M3 = localStorage.getItem("T3");
	$('#M3').text(M3);
	var RM3 = localStorage.getItem("RT3");
	$('#RM3').text(RM3);

	var MP4 = localStorage.getItem("TP4");
	$('#MP4').text(MP4);
	var M4 = localStorage.getItem("T4");
	$('#M4').text(M4);
	var RM4 = localStorage.getItem("RT4");
	$('#RM4').text(RM4);

	var MP5 = localStorage.getItem("TP5");
	$('#MP5').text(MP5);
	var M5 = localStorage.getItem("T5");
	$('#M5').text(M5);
	var RM5 = localStorage.getItem("RT5");
	$('#RM5').text(RM5);

	var MP6 = localStorage.getItem("TP6");
	$('#MP6').text(MP6);
	var M6 = localStorage.getItem("T6");
	$('#M6').text(M6);
	var RM6 = localStorage.getItem("RT6");
	$('#RM6').text(RM6);

	var MP7 = localStorage.getItem("TP7");
	$('#MP7').text(MP7);
	var M7 = localStorage.getItem("T7");
	$('#M7').text(M7);
	var RM7 = localStorage.getItem("RT7");
	$('#RM7').text(RM7);

	var MP8 = localStorage.getItem("TP8");
	$('#MP8').text(MP8);
	var M8 = localStorage.getItem("T8");
	$('#M8').text(M8);
	var RM8 = localStorage.getItem("RT8");
	$('#RM8').text(RM8);

	var MP9 = localStorage.getItem("TP9");
	$('#MP9').text(MP9);
	var M9 = localStorage.getItem("T9");
	$('#M9').text(M9);
	var RM9 = localStorage.getItem("RT9");
	$('#RM9').text(RM9);

	var MP10 = localStorage.getItem("TP10");
	$('#MP10').text(MP10);
	var M10 = localStorage.getItem("T10");
	$('#M10').text(M10);
	var RM10 = localStorage.getItem("RT10");
	$('#RM10').text(RM10);

	var MP11 = localStorage.getItem("TP11");
	$('#MP11').text(MP11);
	var M11 = localStorage.getItem("T11");
	$('#M11').text(M11);
	var RM11 = localStorage.getItem("RT11");
	$('#RM11').text(RM11);

	var MP12 = localStorage.getItem("TP12");
	$('#MP12').text(MP12);
	var M12 = localStorage.getItem("T12");
	$('#M12').text(M12);
	var RM12 = localStorage.getItem("RT12");
	$('#RM12').text(RM12);

}

function load_tt_wed(){

var class_code = localStorage.getItem("class_code");
var disp_class_code = class_code.split('%');
$('#Class_Name').text(disp_class_code[0]);
$('#day_name').text("WEDNESDAY");

	var MP1 = localStorage.getItem("WP1");
	$('#MP1').text(MP1);
	var M1 = localStorage.getItem("W1");
	$('#M1').text(M1);
	var RM1 = localStorage.getItem("RW1");
	$('#RM1').text(RM1);

		var MP2 = localStorage.getItem("WP2");
	$('#MP2').text(MP2);
	var M2 = localStorage.getItem("W2");
	$('#M2').text(M2);
	var RM2 = localStorage.getItem("RW2");
	$('#RM2').text(RM2);

	var MP3 = localStorage.getItem("WP3");
	$('#MP3').text(MP3);
	var M3 = localStorage.getItem("W3");
	$('#M3').text(M3);
	var RM3 = localStorage.getItem("RW3");
	$('#RM3').text(RM3);

	var MP4 = localStorage.getItem("WP4");
	$('#MP4').text(MP4);
	var M4 = localStorage.getItem("W4");
	$('#M4').text(M4);
	var RM4 = localStorage.getItem("RW4");
	$('#RM4').text(RM4);

	var MP5 = localStorage.getItem("WP5");
	$('#MP5').text(MP5);
	var M5 = localStorage.getItem("W5");
	$('#M5').text(M5);
	var RM5 = localStorage.getItem("RW5");
	$('#RM5').text(RM5);

	var MP6 = localStorage.getItem("WP6");
	$('#MP6').text(MP6);
	var M6 = localStorage.getItem("W6");
	$('#M6').text(M6);
	var RM6 = localStorage.getItem("RW6");
	$('#RM6').text(RM6);

	var MP7 = localStorage.getItem("WP7");
	$('#MP7').text(MP7);
	var M7 = localStorage.getItem("W7");
	$('#M7').text(M7);
	var RM7 = localStorage.getItem("RW7");
	$('#RM7').text(RM7);

	var MP8 = localStorage.getItem("WP8");
	$('#MP8').text(MP8);
	var M8 = localStorage.getItem("W8");
	$('#M8').text(M8);
	var RM8 = localStorage.getItem("RW8");
	$('#RM8').text(RM8);

	var MP9 = localStorage.getItem("WP9");
	$('#MP9').text(MP9);
	var M9 = localStorage.getItem("W9");
	$('#M9').text(M9);
	var RM9 = localStorage.getItem("RW9");
	$('#RM9').text(RM9);

	var MP10 = localStorage.getItem("WP10");
	$('#MP10').text(MP10);
	var M10 = localStorage.getItem("W10");
	$('#M10').text(M10);
	var RM10 = localStorage.getItem("RW10");
	$('#RM10').text(RM10);

	var MP11 = localStorage.getItem("WP11");
	$('#MP11').text(MP11);
	var M11 = localStorage.getItem("W11");
	$('#M11').text(M11);
	var RM11 = localStorage.getItem("RW11");
	$('#RM11').text(RM11);

	var MP12 = localStorage.getItem("WP12");
	$('#MP12').text(MP12);
	var M12 = localStorage.getItem("W12");
	$('#M12').text(M12);
	var RM12 = localStorage.getItem("RW12");
	$('#RM12').text(RM12);


}	


function load_tt_thur(){

var class_code = localStorage.getItem("class_code");
var disp_class_code = class_code.split('%');
$('#Class_Name').text(disp_class_code[0]);
$('#day_name').text("THURSDAY");

	var MP1 = localStorage.getItem("THP1");
	$('#MP1').text(MP1);
	var M1 = localStorage.getItem("TH1");
	$('#M1').text(M1);
	var RM1 = localStorage.getItem("RTH1");
	$('#RM1').text(RM1);

	var MP2 = localStorage.getItem("THP2");
	$('#MP2').text(MP2);
	var M2 = localStorage.getItem("TH2");
	$('#M2').text(M2);
	var RM2 = localStorage.getItem("RTH2");
	$('#RM2').text(RM2);

	var MP3 = localStorage.getItem("THP3");
	$('#MP3').text(MP3);
	var M3 = localStorage.getItem("TH3");
	$('#M3').text(M3);
	var RM3 = localStorage.getItem("RTH3");
	$('#RM3').text(RM3);

	var MP4 = localStorage.getItem("THP4");
	$('#MP4').text(MP4);
	var M4 = localStorage.getItem("TH4");
	$('#M4').text(M4);
	var RM4 = localStorage.getItem("RTH4");
	$('#RM4').text(RM4);

	var MP5 = localStorage.getItem("THP5");
	$('#MP5').text(MP5);
	var M5 = localStorage.getItem("TH5");
	$('#M5').text(M5);
	var RM5 = localStorage.getItem("RTH5");
	$('#RM5').text(RM5);

	var MP6 = localStorage.getItem("THP6");
	$('#MP6').text(MP6);
	var M6 = localStorage.getItem("TH6");
	$('#M6').text(M6);
	var RM6 = localStorage.getItem("RTH6");
	$('#RM6').text(RM6);

	var MP7 = localStorage.getItem("THP7");
	$('#MP7').text(MP7);
	var M7 = localStorage.getItem("TH7");
	$('#M7').text(M7);
	var RM7 = localStorage.getItem("RTH7");
	$('#RM7').text(RM7);

	var MP8 = localStorage.getItem("THP8");
	$('#MP8').text(MP8);
	var M8 = localStorage.getItem("TH8");
	$('#M8').text(M8);
	var RM8 = localStorage.getItem("RTH8");
	$('#RM8').text(RM8);

	var MP9 = localStorage.getItem("THP9");
	$('#MP9').text(MP9);
	var M9 = localStorage.getItem("TH9");
	$('#M9').text(M9);
	var RM9 = localStorage.getItem("RTH9");
	$('#RM9').text(RM9);

	var MP10 = localStorage.getItem("THP10");
	$('#MP10').text(MP10);
	var M10 = localStorage.getItem("TH10");
	$('#M10').text(M10);
	var RM10 = localStorage.getItem("RTH10");
	$('#RM10').text(RM10);

	var MP11 = localStorage.getItem("THP11");
	$('#MP11').text(MP11);
	var M11 = localStorage.getItem("TH11");
	$('#M11').text(M11);
	var RM11 = localStorage.getItem("RTH11");
	$('#RM11').text(RM11);

	var MP12 = localStorage.getItem("THP12");
	$('#MP12').text(MP12);
	var M12 = localStorage.getItem("TH12");
	$('#M12').text(M12);
	var RM12 = localStorage.getItem("RTH12");
	$('#RM12').text(RM12);

}


function load_tt_fri(){

var class_code = localStorage.getItem("class_code");
var disp_class_code = class_code.split('%');
$('#Class_Name').text(disp_class_code[0]);
$('#day_name').text("FRIDAY");

	var MP1 = localStorage.getItem("FP1");
	$('#MP1').text(MP1);
	var M1 = localStorage.getItem("F1");
	$('#M1').text(M1);
	var RM1 = localStorage.getItem("RF1");
	$('#RM1').text(RM1);

	var MP2 = localStorage.getItem("FP2");
	$('#MP2').text(MP2);
	var M2 = localStorage.getItem("F2");
	$('#M2').text(M2);
	var RM2 = localStorage.getItem("RF2");
	$('#RM2').text(RM2);

	var MP3 = localStorage.getItem("FP3");
	$('#MP3').text(MP3);
	var M3 = localStorage.getItem("F3");
	$('#M3').text(M3);
	var RM3 = localStorage.getItem("RF3");
	$('#RM3').text(RM3);

	var MP4 = localStorage.getItem("FP4");
	$('#MP4').text(MP4);
	var M4 = localStorage.getItem("F4");
	$('#M4').text(M4);
	var RM4 = localStorage.getItem("RF4");
	$('#RM4').text(RM4);

	var MP5 = localStorage.getItem("FP5");
	$('#MP5').text(MP5);
	var M5 = localStorage.getItem("F5");
	$('#M5').text(M5);
	var RM5 = localStorage.getItem("RF5");
	$('#RM5').text(RM5);

	var MP6 = localStorage.getItem("FP6");
	$('#MP6').text(MP6);
	var M6 = localStorage.getItem("F6");
	$('#M6').text(M6);
	var RM6 = localStorage.getItem("RF6");
	$('#RM6').text(RM6);

	var MP7 = localStorage.getItem("FP7");
	$('#MP7').text(MP7);
	var M7 = localStorage.getItem("F7");
	$('#M7').text(M7);
	var RM7 = localStorage.getItem("RF7");
	$('#RM7').text(RM7);

	var MP8 = localStorage.getItem("FP8");
	$('#MP8').text(MP8);
	var M8 = localStorage.getItem("F8");
	$('#M8').text(M8);
	var RM8 = localStorage.getItem("RF8");
	$('#RM8').text(RM8);

	var MP9 = localStorage.getItem("FP9");
	$('#MP9').text(MP9);
	var M9 = localStorage.getItem("F9");
	$('#M9').text(M9);
	var RM9 = localStorage.getItem("RF9");
	$('#RM9').text(RM9);

	var MP10 = localStorage.getItem("FP10");
	$('#MP10').text(MP10);
	var M10 = localStorage.getItem("F10");
	$('#M10').text(M10);
	var RM10 = localStorage.getItem("RF10");
	$('#RM10').text(RM10);

	var MP11 = localStorage.getItem("FP11");
	$('#MP11').text(MP11);
	var M11 = localStorage.getItem("F11");
	$('#M11').text(M11);
	var RM11 = localStorage.getItem("RF11");
	$('#RM11').text(RM11);

	var MP12 = localStorage.getItem("FP12");
	$('#MP12').text(MP12);
	var M12 = localStorage.getItem("F12");
	$('#M12').text(M12);
	var RM12 = localStorage.getItem("RF12");
	$('#RM12').text(RM12);

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
