$('#attandance').live('pagecreate', function() {
		  
  			
			$('#select_period').change(function() {

			check_periods();
		
          
            });
			
			
});

function check_periods(){
var check_1;
var check_2;

var day_no = new Date().getDay();
var day_code;
var day_desc;
if(day_no==1){
	day_code="M";
	day_desc=" (MONDAY)";
}
if(day_no==2){
	day_code="T";
	day_desc=" (TUESDAY)";
}
if(day_no==3){
	day_code="W";
	day_desc=" (WEDNESDAY)";
}
if(day_no==4){
	day_code="TH";
	day_desc=" (THURSDAY)";
}
if(day_no==5){
	day_code="F";
	day_desc=" (FRIDAY)";
}

var _period = document.getElementById('select_period').value;
localStorage.setItem("current_period", _period);
var _subject;
var _length;
var M1;
var period_selected;
var target_ga;
//################################################################
var Sub1="";
var cl2="";
var cl3="";
if (_period==1){
	Sub1 = 1;
	cl2 = 2;
	cl3 = 3;
	have_3();
	_have_3();
}
if (_period==2){
	Sub1 = 2;
	cl2 = 3;
	cl3 = 4;
	have_3();
	_have_3();
}
if (_period==3){
	Sub1 = 3;
	cl2 = 4;
	cl3 = 5;
	have_3();
	_have_3();
}
if (_period==4){
	Sub1 = 4;
	cl2 = 5;
	cl3 = 6;
	have_3();
	_have_3();
}
if (_period==5){
	Sub1 = 5;
	cl2 = 6;
	cl3 = 7;
	have_3();
	_have_3();
}
if (_period==6){
	Sub1 = 6;
	cl2 = 7;
	cl3 = 8;
	have_3();
	_have_3();
}

var PeriodsPerDay = localStorage.getItem("PeriodsPerDay");
//############################################################
if(PeriodsPerDay==11){
if (_period==7){
	Sub1 = 7;
	cl2 = 8;
	cl3 = 9;
	have_3();
	_have_3();
}
if (_period==8){
	Sub1 = 8;
	cl2 = 9;
	cl3 = 10;
	have_3();
	_have_3();
}
if (_period==9){
	Sub1 = 9;
	cl2 = 10;
	cl3 = 11;
	have_3();
	_have_3();
}
if (_period==10){
	Sub1 = 10;
	cl2 = 11;
	have_2();
	_have_2();
}
if (_period==11){
	Sub1 = 11;
	have_1();
	_have_1();
}
}
//############################################################
//############################################################
if(PeriodsPerDay==10){
if (_period==7){
	Sub1 = 7;
	cl2 = 8;
	cl3 = 9;
	have_3();
	_have_3();
}
if (_period==8){
	Sub1 = 8;
	cl2 = 9;
	cl3 = 10;
	have_3();
	_have_3();
}
if (_period==9){
	Sub1 = 9;
	cl2 = 10;
	have_2();
	_have_2();
}
if (_period==10){
	Sub1 = 10;
	have_1();
	_have_1();
}
}
//############################################################
//############################################################
if(PeriodsPerDay==9){
if (_period==7){
	Sub1 = 7;
	cl2 = 8;
	cl3 = 9;
	have_3();
	_have_3();
}
if (_period==8){
	Sub1 = 8;
	cl2 = 9;
	have_2();
	_have_2();
}
if (_period==9){
	Sub1 = 9;
	have_1();
	_have_1();
}
}
//############################################################
//############################################################
if(PeriodsPerDay==8){
if (_period==7){
	Sub1 = 7;
	cl2 = 8;
	have_2();
	_have_2();
}

if (_period==8){
	Sub1 = 8;
	have_1();
	_have_1();
}
}
//############################################################


function have_3(){
var MC1 = localStorage.getItem(day_code+"C"+Sub1);
	M1 = localStorage.getItem(day_code+Sub1);
	var M2 = localStorage.getItem(day_code+cl2);
	var M3 = localStorage.getItem(day_code+cl3);
_subject=MC1;

	if(M1==M3){
		if(M1==M2){
			_length=" - Triple Periods";
			target_ga=3;
			check_1=1;
		}
	}else{
	if(M1==M2){
	_length=" - Double Periods";
	target_ga=2;
	check_1=2;
	}else{
	_length=" - Single Period";
	target_ga=1;
	check_1=3;
}}//############################################################
}
function have_2(){
var MC1 = localStorage.getItem(day_code+"C"+Sub1);
	M1 = localStorage.getItem(day_code+Sub1);
	var M2 = localStorage.getItem(day_code+cl2);
_subject=MC1;

	if(M1==M2){
	_length=" - Double Periods";
	target_ga=2;
	check_1=4;
	}else{
	_length=" - Single Period";
	target_ga=1;
	check_1=5;
}}//############################################################

function have_1(){
var MC1 = localStorage.getItem(day_code+"C"+Sub1);
	 M1 = localStorage.getItem(day_code+Sub1);
_subject=MC1;

	_length=" - Single Period";
	target_ga=1;
	check_1=6;
}//############################################################

//############################################################


function _have_3(){
var _MC = localStorage.getItem(day_code+Sub1);
	_M1 = localStorage.getItem(day_code+"C"+Sub1);
	var _M2 = localStorage.getItem(day_code+"C"+cl2);
	var _M3 = localStorage.getItem(day_code+"C"+cl3);
	if(_M1==_M3){
		if(_M1==_M2){
			_length=" - Triple Periods";
			target_ga=3;
			check_2=1;
		}
	}else{
	if(_M1==_M2){
	_length=" - Double Periods";
	target_ga=2;
	check_2=2;
	}else{
	_length=" - Single Period";
	target_ga=1;
	check_2=3;
}}//############################################################
}
function _have_2(){
var _MC1 = localStorage.getItem(day_code+Sub1);
	_M1 = localStorage.getItem(day_code+"C"+Sub1);
	var _M2 = localStorage.getItem(day_code+"C"+cl2);


	if(_M1==_M2){
	_length=" - Double Periods";
	target_ga=2;
	check_2=4;
	}else{
	_length=" - Single Period";
	target_ga=1;
	check_2=5;
}}//############################################################

function _have_1(){
var _MC1 = localStorage.getItem(day_code+Sub1);
	 _M1 = localStorage.getItem(day_code+"C"+Sub1);


	_length=" - Single Period";
	target_ga=1;
	check_2=6;
}//############################################################

if(check_1==check_2){
if(check_1==1){
	_length=" - Triple Periods";
	target_ga=3;
}
if(check_1==2){
	_length=" - Double Periods";
	target_ga=2;
}
if(check_1==3){
	_length=" - Single Period";
	target_ga=1;
}
if(check_1==4){
	_length=" - Double Periods";
	target_ga=2;
}
if(check_1==5){
	_length=" - Single Period";
	target_ga=1;
}
if(check_1==6){
	_length=" - Single Period";
	target_ga=1;
}

}else{
if(check_1==1){
	if(check_2==2){
	_length=" - Double Periods";
	target_ga=2;
	}
	if(check_2==3){
	_length=" - Single Period";
	target_ga=1;
	}
}
if(check_1==2){
	if(check_2==1){
	_length=" - Double Periods";
	target_ga=2;
	}
	if(check_2==3){
	_length=" - Single Period";
	target_ga=1;
	}
}
if(check_1==3){
	if(check_2==1){
	_length=" - Single Period";
	target_ga=1;
	}
	if(check_2==2){
	_length=" - Single Period";
	target_ga=1;
	}
}
if(check_2==1){
	if(check_1==2){
	_length=" - Double Periods";
	target_ga=2;
	}
	if(check_1==3){
	_length=" - Single Period";
	target_ga=1;
	}
}
if(check_2==2){
	if(check_1==1){
	_length=" - Double Periods";
	target_ga=2;
	}
	if(check_1==3){
	_length=" - Single Period";
	target_ga=1;
	}
}
if(check_2==3){
	if(check_1==1){
	_length=" - Single Period";
	target_ga=1;
	}
	if(check_1==2){
	_length=" - Single Period";
	target_ga=1;
	}
}

}
if(M1==""){
$('#first_heading5').text("FREE PERIOD!!!");	
}else{
$('#first_heading5').text(M1+', '+_subject + _length + day_desc);

$('#period_select li').remove();
if(target_ga==1){
localStorage.setItem("ma_class", M1);
localStorage.setItem("ma_subject", _subject);
$('#period_select').append('<li><a href="ga.html?id='+ M1+'&subject='+ _subject +'"><img src="images/Attendance_48.png" width="128" height="128"><h3>Load REGISTER</h3><p>Load attendance register</p></a></li>');

}
if(target_ga==2){
localStorage.setItem("ma_class", M1);
localStorage.setItem("ma_subject", _subject);
$('#period_select').append('<li><a href="ga2.html?id='+ M1+'&subject='+ _subject +'"><img src="images/Attendance_48.png" width="128" height="128"><h3>Load REGISTER</h3><p>Load attendance register</p></a></li>');
}
if(target_ga==3){
localStorage.setItem("ma_class", M1);
localStorage.setItem("ma_subject", _subject);

$('#period_select').append('<li><a href="ga3.html?id='+ M1+'&subject='+ _subject +'"><img src="images/Attendance_48.png" width="128" height="128"><h3>Load REGISTER</h3><p>Load attendance register</p></a></li>');
}
$('#period_select').listview('refresh');	
}

}
