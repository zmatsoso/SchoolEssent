<?php
session_start();
?>

<!-- this is the Simple sexy PHP Login Script. You can find it on http://www.php-login.net ! It's free and open source. -->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr">
<head>
<title>School Essentials</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en" />
<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style4.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<style type="text/css">
/* --------
  The CSS rules offered here are just an example, you may use them as a base. 
 --------- */
* {margin:0; padding:0}
/* --- Page Structure  --- */
html {height:100%}
body {
  min-width:800px;
  width:100%;
  height:101%;
  background:#fff;
  color:#333;
  font:76%/1.6 verdana,geneva,lucida,'lucida grande',arial,helvetica,sans-serif;
  text-align:center
}
#wrapper{
  margin:0 auto;
  padding:4px 4% 4em;
  text-align:left
}
#content {
  max-width:70em;
  width:100%;
  margin:0 auto;
  padding-bottom:20px;
  overflow:hidden
}
.demo {
  margin:1.5em 0;
  padding:1.5em 1.5em 0.75em;
  border:1px solid #ccc;
  position:relative;
  overflow:hidden
}
.collapse p {padding:0 10px 1em}

.switch {position:absolute; top:1.5em; right: 1.5em; padding:3px}

.post .switch {position:static; text-align:right}

.post .main{margin-bottom:.3em; padding-bottom:0}

.other ul, .summary {margin-bottom:.3em; padding:1em; border:1px solid #e8e7e8; background-color:#f8f7f8}

.other ul {margin-bottom:1em; list-style-type:none; text-align:center}


/* --- Headings  --- */
h1 {
  margin-bottom:1em; 
  font-family:Verdana, Arial, Helvetica, sans-serif; 
  font-size:2.5em; 
  font-weight:normal; 
  color:#c30
}
h2 {margin-bottom:1em; padding:3px; background-color:#eee}
h2, h3{font-size:1em}

.expand{padding-bottom:.75em}

/* --- Links  --- */
a:link, a:visited {
  border:1px dotted #ccc;
  border-width:0;
  text-decoration:none;
  color:blue
}
a:hover, a:active, a:focus {
  border-style:solid;
  background-color:#f0f0f0;
  text-decoration:underline;
  outline:0 none
}
a:active, a:focus {
  color:red;
}
.expand a {
  display:block;
  padding:3px 10px
}
.expand a:link, .expand a:visited {
  border-width:1px;
  background-image:url(../images/arrow-down.gif);
  background-repeat:no-repeat;
  background-position:98% 50%;
}
.expand a:hover, .expand a:active, .expand a:focus {
}
.expand a.open:link, .expand a.open:visited {
  border-style:solid;
  background:#eee url(../images/arrow-up.gif) no-repeat 98% 50%

}
table td, table td * {
    vertical-align: top;
}
</style>
<!--[if lte IE 7]>
<style type="text/css">
h3 a, .demo {position:relative; height:1%}
</style>
<![endif]-->

<!--[if lte IE 6]>
<script type="text/javascript">
   try { document.execCommand( "BackgroundImageCache", false, true); } catch(e) {};
</script>
<![endif]-->
<!--[if !lt IE 6]><!-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/expand.js"></script>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
$(function() {
    $("#demo1 h3.expand").toggler();
    $("#demo2 h3.expand").toggler({initShow: "div.collapse:eq(0)"});
    
    $("#demo1").expandAll({
      trigger: "h3.expand", 
      ref: "h3.expand", 
      showMethod: "slideDown", 
      hideMethod: "slideUp"
    });
    $("#demo2").expandAll({
      trigger: "h3.expand", 
      ref: "h3.expand", 
      showMethod: "slideDown", 
      hideMethod: "slideUp", 
      oneSwitch : false
    });
});
//--><!]]>
</script>
<!--<![endif]-->
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	


	function selectclass() {
		var justsend ="111";
			
		var strURL="getclasses.php?role="+justsend;
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('select_class').innerHTML=req.responseText;	
						document.getElementById('select_class1').innerHTML=req.responseText;					
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}
	

	function get_subject() {
	var tryzmaatown = document.getElementById("select_class");
	var searcher = tryzmaatown.options[tryzmaatown.selectedIndex].innerHTML;

	var ma_class = searcher;	
	var strURL="get_subjects.php?ma_class="+ma_class;
	
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('select_subject').innerHTML=req.responseText;	
									
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}

	function get_learners_complete() {
	var tryzmaatown = document.getElementById("select_class1");
	var searcher = tryzmaatown.options[tryzmaatown.selectedIndex].innerHTML;

	var ma_class = searcher;	
	var strURL="get_learners_complete.php?ma_class="+ma_class;
	
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('select_learner1').innerHTML=req.responseText;	
									
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}


	function get_learn_class() {
	var tryzmaatown = document.getElementById("select_class");
	var searcher = tryzmaatown.options[tryzmaatown.selectedIndex].innerHTML;

	var tryzmaatown1 = document.getElementById("select_subject");
	var searcher1 = tryzmaatown1.options[tryzmaatown1.selectedIndex].innerHTML;

	var tryzmaatown2 = document.getElementById("select_type");
	var searcher2 = tryzmaatown2.options[tryzmaatown2.selectedIndex].innerHTML;

	var ma_class = searcher;	
	var ma_subject = searcher1;
	
	if(searcher2=="Attendance"){
		var strURL="get_class_subj_attend.php?ma_class="+ma_class+"&ma_subject="+ma_subject;
	}
	if(searcher2=="Homework"){
		var strURL="get_class_subj_hw.php?ma_class="+ma_class+"&ma_subject="+ma_subject;
	}
	
	
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('holdData').innerHTML=req.responseText;	
						document.getElementById('mabody').innerHTML=req.responseText;				
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}
	


	function get_learner() {
	var tryzmaatown = document.getElementById("select_class1");
	var searcher = tryzmaatown.options[tryzmaatown.selectedIndex].innerHTML;

	var tryzmaatown1 = document.getElementById("select_learner1");
	var searcher1 = tryzmaatown1.options[tryzmaatown1.selectedIndex].innerHTML;
	var zP1E = (searcher1).split(',');
	var _name =  zP1E[1];
	var _surname = zP1E[0];

	var ma_class = searcher;	
	
	var strURL="get_learner.php?ma_class="+ma_class+"&ma_name="+_name+"&ma_surname="+_surname;
	
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('holdData1').innerHTML=req.responseText;	
						document.getElementById('mabody1').innerHTML=req.responseText;				
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}


	function clear_div() {
		
		var Id =document.getElementById("holdId").value;
			
		var strURL="clear_div.php?Id="+Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('mabody').innerHTML=req.responseText;	
											
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}

	function send_subject() {
		var Id =document.getElementById("mabody").innerHTML;
			
		var strURL="ga.php?Id="+Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('mabody').innerHTML=req.responseText;	
											
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("POST", strURL, true);
			req.send(null);
		}
			
	}

</script>

</head>

<body onload="selectclass();">
<!-- this is the Simple sexy PHP Login Script. You can find it on http://www.php-login.net ! It's free and open source. -->

<div>
<!-- if you need user information, just put them into the $_SESSION variable and output them here -->ATTENDANCE / HOMEWORK REGISTERS</div>

        <div class="container">
<div id="wrapper">
  <div id="content">  
          <div id="demo2" class="demo">
            <h2><strong><?php echo $_SESSION['school_name']; ?></strong></h2>
            
 <h3 class="expand">Class  Register</h3>
            <div class="collapse">
            
            <form action="../examples/Attend1.php" method="POST" target="_blank">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">Report type
      <label for="select_action"></label></td>
    <td align="left">&nbsp;</td>
    <td><label for="select_category"></label>
      Class
<label for="search_box"></label></td>
    <td>&nbsp;</td>
    <td align="left">Subject</td>
    <td width="14%" align="right" class="_save_btn"> </td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="25%" align="left"><select name="select_type" id="select_type" onchange="get_subject()">
      <option value="Attendance" selected="selected">Attendance</option>
      <option value="Homework">Homework</option>
    </select></td>
    <td width="2%">&nbsp;</td>
    <td width="23%"><select name="select_class" id="select_class" onchange="get_subject()">
      <option value=""></option>
    </select></td>
    <td width="5%">&nbsp;</td>
    <td><select name="select_subject" id="select_subject" onchange="get_learn_class()">
      <option value="Telephone">Select Subject</option>
    </select></td>
    <td align="right"><textarea name="holdData" cols="1" rows="1" id="holdData"></textarea></td>
    <td align="right"><input type="submit" name="button2" id="button2" value="PDF" /></td>
  </tr>
  <tr>
    <td width="25%" align="left">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td><label for="holdData"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

<div name="mabody" id="mabody"></div>
</form>
</div>
            
<h3 class="expand">Learner Register</h3>
            <div class="collapse">
            
            <form action="../examples/Attend2.php" method="POST" target="_blank">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">Class
      <label for="select_action"></label></td>
    <td align="left">&nbsp;</td>
    <td>Learner</td>
    <td>&nbsp;</td>
    <td width="26%" align="left"><label for="select_category2"></label>
      <label for="search_box2"></label></td>
    <td width="18%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="23%" align="left"><div><select name="select_class1" id="select_class1" onchange="get_learners_complete()">
      <option value=""></option>
    </select></div></td>
    <td width="2%">&nbsp;</td>
    <td width="22%"><select name="select_learner1" id="select_learner1" onchange="get_learner()">
      <option value="Telephone">Select Learner</option>
    </select></td>
    <td width="5%">&nbsp;</td>
    <td><div></div></td>
    <td align="right"><textarea name="holdData1" cols="1" rows="1" id="holdData1"></textarea></td>
    <td align="right"><input type="submit" name="button" id="button" value="PDF" /></td>
  </tr>
  <tr>
    <td width="23%" align="right">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td><label for="holdData1"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

<div name="mabody1" id="mabody1"></div>
</form>
</div>
            
           
            
          </div>
        </div>
    </div>
</body>
</html>