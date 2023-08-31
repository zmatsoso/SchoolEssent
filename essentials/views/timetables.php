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
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}
	

		function selecteducator() {
		var justsend ="111";
			
		var strURL="geteducator.php?role="+justsend;
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('select_educator').innerHTML=req.responseText;	
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
			
	}
	


</script>

<script>
function send_class(){
	var ma_class = document.getElementById("select_class").value;
	
	if(ma_class=="Select Class"){
		
	alert("Please select class and try again!");	
	}else{
	var nu_class = ma_class+".pdf";

		var url = 'download.php?filename='
		
		+ nu_class
		
		window.open(url, '_self');
	}
}

function send_relief(){
	var ma_relief = document.getElementById("select_relief").value;

		var url = 'download.php?filename='
		
		+ ma_relief 
		
		window.open(url, '_self');
	
}


function send_educator(){
		var tryzmaatown = document.getElementById('select_educator');
	ma_educator = tryzmaatown.options[tryzmaatown.selectedIndex].innerHTML;
	
	zama = ma_educator.replace(/^\s+|\s+$/g,'')
		if(ma_educator=="Select Educator"){
		
	alert("Please select educator and try again!");	
	}else{
	var nu_educator = zama+".pdf";
		var url = 'download.php?filename='
		
		+ nu_educator
		
		window.open(url, '_self');
	}

}
</script>

</head>

<body onload="selectclass(); selecteducator();">
<!-- this is the Simple sexy PHP Login Script. You can find it on http://www.php-login.net ! It's free and open source. -->

<div>
<!-- if you need user information, just put them into the $_SESSION variable and output them here -->SCHOOL TIMETABLES</div>

        <div class="container">
<div id="wrapper">
  <div id="content">  
          <div id="demo2" class="demo">
            <h2><strong><?php echo $_SESSION['school_name']; ?></strong></h2>
  

<h3 class="expand">EDUCATOR WORKLOAD</h3>
            <div class="collapse">
            
            <form action="../examples/Attend2.php" method="POST" target="_blank">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="26%" align="left"><label for="select_category2"></label>
      <label for="search_box2"></label></td>
    <td width="18%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="left"><div></div></td>
    <td colspan="5">
    
    
    
    <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Download Educator WORKLOAD.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">  <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle"><a href="download.php?filename=EDUCATOR_WORKLOAD.pdf" class="links">Download Now</td>  </tr> 
    
    
    
    
    
    
    
      </table></td>        <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>
  
    
    
    
    
    
    
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="right">&nbsp;</td>
    <td width="23%">&nbsp;</td>
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

  
 <h3 class="expand">COMPOSITE - SCHOOL</h3>
            <div class="collapse">
            
            <form action="../examples/Attend1.php" method="POST" target="_blank">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="27%" align="left">&nbsp;</td>
    <td width="14%" align="right" class="_save_btn"> </td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="left">&nbsp;</td>
    <td colspan="5">
    
    
  <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Please select timetable you wish to download.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">  <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle"><a href="download.php?filename=COMPOSITE.pdf" class="links">Complete Composite</a></td>  </tr>  <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=COMPOSITE_EDUCATOR.pdf" class="links">Composite by Educators</a></td>  
    </tr> 
    
    
    
     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=COMPOSITE_SUBJECT.pdf" class="links">Composite by Learning Areas</a></td>  
    </tr> 
    
    
      </table></td>        <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>
    
    
    
    
    
    
    
    
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="left">&nbsp;</td>
    <td width="25%">&nbsp;</td>
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
   


   
<h3 class="expand">COMPOSITE - GRADE</h3>
            <div class="collapse">
            
            <form action="../examples/Attend2.php" method="POST" target="_blank">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left"><label for="select_action"></label></td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="26%" align="left"><label for="select_category2"></label>
      <label for="search_box2"></label></td>
    <td width="18%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="left"><div></div></td>
    <td colspan="5">
    
    
    <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Please select Grade timetable you wish to download.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">
    
    
 <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle"><a href="download.php?filename=GRADE04.pdf" class="links">Grade 4</a></td>  </tr> 
    
    
     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE05.pdf" class="links">Grade 5</a></td>  
    </tr> 
    
    
    
     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE06.pdf" class="links">Grade 6</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE07.pdf" class="links">Grade 7</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE08.pdf" class="links">Grade 8</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE09.pdf" class="links">Grade 9</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE10.pdf" class="links">Grade 10</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE11.pdf" class="links">Grade 11</a></td>  
    </tr> 

     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=GRADE12.pdf" class="links">Grade 12</a></td>  
    </tr> 
    
    
      </table></td>        <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>


  
    
    
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="2%" align="right">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td><label for="holdData1"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>


</form>
</div>
            
   

<h3 class="expand">CLASS TIMETABLES</h3>
            <div class="collapse">
            
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="27%" align="left"><label for="select_category2"></label>      <label for="select_action2"></label></td>
    <td width="8%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="left"><div></div></td>
    <td colspan="5">
    
    
    
    
      <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Please select class timetable you wish to download.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">  <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle">
      <select name="select_class" id="select_class">
        <option value=""></option>
      </select><a href=# onclick="send_class()" class="links">Download now</a>
   </td>  
    </tr>  <tr>    <td align="left" valign="middle">&nbsp;</td>    
    <td align="left" valign="middle"></td>  
    </tr> 
    
    
    
     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=ALL_CLASSES.pdf" class="links">Download all classes</a></td>  
    </tr> 
    
    
      </table></td>        
    <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td><label for="holdData1"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>

</div>


<h3 class="expand">EDUCATOR TIMETABLES</h3>
            <div class="collapse">
            
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="27%" align="left"><label for="select_category2"></label>      <label for="select_action2"></label></td>
    <td width="8%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="left"><div></div></td>
    <td colspan="5">
    
    
    
    
      <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Please select educator timetable you wish to download.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">  <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle">
      <select name="select_educator" id="select_educator">
        <option value=""></option>
      </select><a href=# onclick="send_educator();" class="links">Download now</a>
   </td>  
    </tr>  <tr>    <td align="left" valign="middle">&nbsp;</td>    
    <td align="left" valign="middle"></td>  
    </tr> 
    
    
    
     <tr>    <td align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td align="left" valign="middle"><a href="download.php?filename=ALL_EDUCATORS.pdf" class="links">Download all educators</a></td>  
    </tr> 
    
    
      </table></td>        
    <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td><label for="holdData1"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>



</div>


<h3 class="expand">RELIEF TIMETABLES</h3>
            <div class="collapse">
            
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="27%" align="left"><label for="select_category2"></label>      <label for="select_action2"></label></td>
    <td width="8%" align="right" class="_save_btn"><label for="z7"></label></td>
    <td width="4%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="left"><div></div></td>
    <td colspan="5">
    
    
    
    
      <div style="width:730px; margin:0 auto;">  </div><div class="maindiv"><div class="innerbg"><table width="100%" border="0" cellpadding="2" cellspacing="2">  <tr>
    <td align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">Please select relief timetable you wish to download.</div></td></tr>  <tr>    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">      <tr>        <td width="60%" align="left" valign="middle"><div style="margin:0 auto; padding:8px 4px; text-align:center; width:328px;"><table width="100%" border="0" cellspacing="4" cellpadding="4">  <tr>    <td width="9%" align="left" valign="middle"><img src="../files/tick.jpg" width="16" height="16" /></td>    
    <td width="91%" align="left" valign="middle">
      <select name="select_relief" id="select_relief">
        <option value="RELIEF_MONDAY.pdf">Monday</option>
        <option value="RELIEF_TUESDAY.pdf">Tuesday</option>
        <option value="RELIEF_WEDNESDAY.pdf">Wednesday</option>
        <option value="RELIEF_THURSDAY.pdf">Thursday</option>
        <option value="RELIEF_FRIDAY.pdf">Friday</option>
      </select><a href=# onclick="send_relief();" class="links">Download now</a>
   </td>  
    </tr>  <tr>    <td align="left" valign="middle">&nbsp;</td>    
    <td align="left" valign="middle"></td>  
    </tr> 
    
    
    
     
    
    
      </table></td>        
    <td width="40%" align="left" valign="middle"><img src="../images/logo.png" width="273" height="84" /></td>      
    </tr>    </table></td>    </tr></table></div></div><div style="width:730px; margin:0 auto; padding:8px 0px;">
    
 </div>

    
    
    
    
     
    
    
    </td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td><label for="holdData1"></label>
      <div></div></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>



</div>




  
            
          </div>
        </div>
    </div>
</body>
</html>