var day_no;
var school_code = localStorage.getItem("school_code");

$('#edu_tt').live('pageshow', function(event) {
	
	load_edu_periods();
	load_edu_tt();
	
			$('#mon').on("tap click", function() {

			load_edu_tt_mon();
          
            });

			
			$('#tue').on("tap click", function() {

			load_edu_tt_tue();
		          
            });

			$('#wed').on("tap click", function() {

			load_edu_tt_wed();
		          
            });

			$('#thur').on("tap click", function() {

			load_edu_tt_thur();
		          
            });

			$('#fri').on("tap click", function() {

			load_edu_tt_fri();
		          
            });

});

function load_edu_periods(){
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
		$('#first_lunch').text(P2E+" - "+P3S+"  Break");
	}
	if(IfTwo1==3){
		$('#first_lunch').text(P3E+" - "+P4S+"  Break");
	}
	if(IfTwo1==4){
		$('#first_lunch').text(P4E+" - "+P5S+"  Break");
	}
	if(IfTwo1==5){
		$('#first_lunch').text(P5E+" - "+P6S+"  Break");
	}
	if(IfTwo1==6){
		$('#first_lunch').text(P6E+" - "+P7S+"  Break");
	}
	if(IfTwo1==7){
		$('#first_lunch').text(P7E+" - "+P8S+"  Break");
	}
	if(IfTwo1==8){
		$('#first_lunch').text(P8E+" - "+P9S+"  Break");
	}
	if(IfTwo1==9){
		$('#first_lunch').text(P9E+" - "+P10S+"  Break");
	}

	
	var IfTwo2 = localStorage.getItem("IfTwo2");
	if(IfTwo2==3){
		$('#second_lunch').text(P3E+" - "+P4S+"  Lunch");
	}
	if(IfTwo2==4){
		$('#second_lunch').text(P4E+" - "+P5S+"  Lunch");
	}
	if(IfTwo2==5){
		$('#second_lunch').text(P5E+" - "+P6S+"  Lunch");
	}
	if(IfTwo2==6){
		$('#second_lunch').text(P6E+" - "+P7S+"  Lunch");
	}
	if(IfTwo2==7){
		$('#second_lunch').text(P7E+" - "+P8S+"  Lunch");
	}
	if(IfTwo2==8){
		$('#second_lunch').text(P8E+" - "+P9S+"  Lunch");
	}
	if(IfTwo2==9){
		$('#second_lunch').text(P9E+" - "+P10S+"  Lunch");
	}

var educ_name = localStorage.getItem("educ_name");


$('#educ_no').text(educ_name);

}


function load_edu_tt(){

day_no = new Date().getDay();

if(day_no==1){
	load_edu_tt_mon();
}
if(day_no==2){
	load_edu_tt_tue();
}
if(day_no==3){
	load_edu_tt_wed();
}
if(day_no==4){
	load_edu_tt_thur();
}
if(day_no==5){
	load_edu_tt_fri();
}

}

function load_edu_tt_mon(){
$('#day_name').text("MONDAY");

	var MC1 = localStorage.getItem("MC1");
	$('#MP1').text(MC1);
	var M1 = localStorage.getItem("M1");
	$('#M1').text(M1);

	var MC2 = localStorage.getItem("MC2");
	$('#MP2').text(MC2);
	var M2 = localStorage.getItem("M2");
	$('#M2').text(M2);

	var MC3 = localStorage.getItem("MC3");
	$('#MP3').text(MC3);
	var M3 = localStorage.getItem("M3");
	$('#M3').text(M3);

	var MC4 = localStorage.getItem("MC4");
	$('#MP4').text(MC4);
	var M4 = localStorage.getItem("M4");
	$('#M4').text(M4);

	var MC5 = localStorage.getItem("MC5");
	$('#MP5').text(MC5);
	var M5 = localStorage.getItem("M5");
	$('#M5').text(M5);

	var MC6 = localStorage.getItem("MC6");
	$('#MP6').text(MC6);
	var M6 = localStorage.getItem("M6");
	$('#M6').text(M6);

	var MC7 = localStorage.getItem("MC7");
	$('#MP7').text(MC7);
	var M7 = localStorage.getItem("M7");
	$('#M7').text(M7);

	var MC8 = localStorage.getItem("MC8");
	$('#MP8').text(MC8);
	var M8 = localStorage.getItem("M8");
	$('#M8').text(M8);

	var MC9 = localStorage.getItem("MC9");
	$('#MP9').text(MC9);
	var M9 = localStorage.getItem("M9");
	$('#M9').text(M9);

	var MC10 = localStorage.getItem("MC10");
	$('#MP10').text(MC10);
	var M10 = localStorage.getItem("M10");
	$('#M10').text(M10);

	var MC11 = localStorage.getItem("MC11");
	$('#MP11').text(MC11);
	var M11 = localStorage.getItem("M11");
	$('#M11').text(M11);

	var MC12 = localStorage.getItem("MC12");
	$('#MP12').text(MC12);
	var M12 = localStorage.getItem("M12");
	$('#M12').text(M12);

}

function load_edu_tt_tue(){
$('#day_name').text("TUESDAY");

	var MC1 = localStorage.getItem("TC1");
	$('#MP1').text(MC1);
	var M1 = localStorage.getItem("T1");
	$('#M1').text(M1);

	var MC2 = localStorage.getItem("TC2");
	$('#MP2').text(MC2);
	var M2 = localStorage.getItem("T2");
	$('#M2').text(M2);

	var MC3 = localStorage.getItem("TC3");
	$('#MP3').text(MC3);
	var M3 = localStorage.getItem("T3");
	$('#M3').text(M3);

	var MC4 = localStorage.getItem("TC4");
	$('#MP4').text(MC4);
	var M4 = localStorage.getItem("T4");
	$('#M4').text(M4);

	var MC5 = localStorage.getItem("TC5");
	$('#MP5').text(MC5);
	var M5 = localStorage.getItem("T5");
	$('#M5').text(M5);

	var MC6 = localStorage.getItem("TC6");
	$('#MP6').text(MC6);
	var M6 = localStorage.getItem("T6");
	$('#M6').text(M6);

	var MC7 = localStorage.getItem("TC7");
	$('#MP7').text(MC7);
	var M7 = localStorage.getItem("T7");
	$('#M7').text(M7);

	var MC8 = localStorage.getItem("TC8");
	$('#MP8').text(MC8);
	var M8 = localStorage.getItem("T8");
	$('#M8').text(M8);

	var MC9 = localStorage.getItem("TC9");
	$('#MP9').text(MC9);
	var M9 = localStorage.getItem("T9");
	$('#M9').text(M9);

	var MC10 = localStorage.getItem("TC10");
	$('#MP10').text(MC10);
	var M10 = localStorage.getItem("T10");
	$('#M10').text(M10);

	var MC11 = localStorage.getItem("TC11");
	$('#MP11').text(MC11);
	var M11 = localStorage.getItem("T11");
	$('#M11').text(M11);

	var MC12 = localStorage.getItem("TC12");
	$('#MP12').text(MC12);
	var M12 = localStorage.getItem("T12");
	$('#M12').text(M12);

}

function load_edu_tt_wed(){
$('#day_name').text("WEDNESDAY");

	var MC1 = localStorage.getItem("WC1");
	$('#MP1').text(MC1);
	var M1 = localStorage.getItem("W1");
	$('#M1').text(M1);

	var MC2 = localStorage.getItem("WC2");
	$('#MP2').text(MC2);
	var M2 = localStorage.getItem("W2");
	$('#M2').text(M2);

	var MC3 = localStorage.getItem("WC3");
	$('#MP3').text(MC3);
	var M3 = localStorage.getItem("W3");
	$('#M3').text(M3);

	var MC4 = localStorage.getItem("WC4");
	$('#MP4').text(MC4);
	var M4 = localStorage.getItem("W4");
	$('#M4').text(M4);

	var MC5 = localStorage.getItem("WC5");
	$('#MP5').text(MC5);
	var M5 = localStorage.getItem("W5");
	$('#M5').text(M5);

	var MC6 = localStorage.getItem("WC6");
	$('#MP6').text(MC6);
	var M6 = localStorage.getItem("W6");
	$('#M6').text(M6);

	var MC7 = localStorage.getItem("WC7");
	$('#MP7').text(MC7);
	var M7 = localStorage.getItem("W7");
	$('#M7').text(M7);

	var MC8 = localStorage.getItem("WC8");
	$('#MP8').text(MC8);
	var M8 = localStorage.getItem("W8");
	$('#M8').text(M8);

	var MC9 = localStorage.getItem("WC9");
	$('#MP9').text(MC9);
	var M9 = localStorage.getItem("W9");
	$('#M9').text(M9);

	var MC10 = localStorage.getItem("WC10");
	$('#MP10').text(MC10);
	var M10 = localStorage.getItem("W10");
	$('#M10').text(M10);

	var MC11 = localStorage.getItem("WC11");
	$('#MP11').text(MC11);
	var M11 = localStorage.getItem("W11");
	$('#M11').text(M11);

	var MC12 = localStorage.getItem("WC12");
	$('#MP12').text(MC12);
	var M12 = localStorage.getItem("W12");
	$('#M12').text(M12);

}

function load_edu_tt_thur(){
$('#day_name').text("THURSDAY");

	var MC1 = localStorage.getItem("THC1");
	$('#MP1').text(MC1);
	var M1 = localStorage.getItem("TH1");
	$('#M1').text(M1);

	var MC2 = localStorage.getItem("THC2");
	$('#MP2').text(MC2);
	var M2 = localStorage.getItem("TH2");
	$('#M2').text(M2);

	var MC3 = localStorage.getItem("THC3");
	$('#MP3').text(MC3);
	var M3 = localStorage.getItem("TH3");
	$('#M3').text(M3);

	var MC4 = localStorage.getItem("THC4");
	$('#MP4').text(MC4);
	var M4 = localStorage.getItem("TH4");
	$('#M4').text(M4);

	var MC5 = localStorage.getItem("THC5");
	$('#MP5').text(MC5);
	var M5 = localStorage.getItem("TH5");
	$('#M5').text(M5);

	var MC6 = localStorage.getItem("THC6");
	$('#MP6').text(MC6);
	var M6 = localStorage.getItem("TH6");
	$('#M6').text(M6);

	var MC7 = localStorage.getItem("THC7");
	$('#MP7').text(MC7);
	var M7 = localStorage.getItem("TH7");
	$('#M7').text(M7);

	var MC8 = localStorage.getItem("THC8");
	$('#MP8').text(MC8);
	var M8 = localStorage.getItem("TH8");
	$('#M8').text(M8);

	var MC9 = localStorage.getItem("THC9");
	$('#MP9').text(MC9);
	var M9 = localStorage.getItem("TH9");
	$('#M9').text(M9);

	var MC10 = localStorage.getItem("THC10");
	$('#MP10').text(MC10);
	var M10 = localStorage.getItem("TH10");
	$('#M10').text(M10);

	var MC11 = localStorage.getItem("THC11");
	$('#MP11').text(MC11);
	var M11 = localStorage.getItem("TH11");
	$('#M11').text(M11);

	var MC12 = localStorage.getItem("THC12");
	$('#MP12').text(MC12);
	var M12 = localStorage.getItem("TH12");
	$('#M12').text(M12);

}

function load_edu_tt_fri(){
$('#day_name').text("FRIDAY");

	var MC1 = localStorage.getItem("FC1");
	$('#MP1').text(MC1);
	var M1 = localStorage.getItem("F1");
	$('#M1').text(M1);

	var MC2 = localStorage.getItem("FC2");
	$('#MP2').text(MC2);
	var M2 = localStorage.getItem("F2");
	$('#M2').text(M2);

	var MC3 = localStorage.getItem("FC3");
	$('#MP3').text(MC3);
	var M3 = localStorage.getItem("F3");
	$('#M3').text(M3);

	var MC4 = localStorage.getItem("FC4");
	$('#MP4').text(MC4);
	var M4 = localStorage.getItem("F4");
	$('#M4').text(M4);

	var MC5 = localStorage.getItem("FC5");
	$('#MP5').text(MC5);
	var M5 = localStorage.getItem("F5");
	$('#M5').text(M5);

	var MC6 = localStorage.getItem("FC6");
	$('#MP6').text(MC6);
	var M6 = localStorage.getItem("F6");
	$('#M6').text(M6);

	var MC7 = localStorage.getItem("FC7");
	$('#MP7').text(MC7);
	var M7 = localStorage.getItem("F7");
	$('#M7').text(M7);

	var MC8 = localStorage.getItem("FC8");
	$('#MP8').text(MC8);
	var M8 = localStorage.getItem("F8");
	$('#M8').text(M8);

	var MC9 = localStorage.getItem("FC9");
	$('#MP9').text(MC9);
	var M9 = localStorage.getItem("F9");
	$('#M9').text(M9);

	var MC10 = localStorage.getItem("FC10");
	$('#MP10').text(MC10);
	var M10 = localStorage.getItem("F10");
	$('#M10').text(M10);

	var MC11 = localStorage.getItem("FC11");
	$('#MP11').text(MC11);
	var M11 = localStorage.getItem("F11");
	$('#M11').text(M11);

	var MC12 = localStorage.getItem("FC12");
	$('#MP12').text(MC12);
	var M12 = localStorage.getItem("F12");
	$('#M12').text(M12);

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
