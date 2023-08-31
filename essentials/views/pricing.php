<!DOCTYPE html>
<html lang="en">
<head>
<title>School Essentials | Pricing</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Molengo_400.font.js"></script>
<script type="text/javascript" src="../js/Expletus_Sans_400.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="../js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("../js/PIE.htc");}</style>
<![endif]-->
<script>
function resertform(){
document.getElementById("name").value = "";
document.getElementById("email").value = "";
document.getElementById("maSubject").value = "General Information";
document.getElementById("matext").value = "";
return false;
}

function calculate(){
		var no_educs = document.getElementById("no_educs").value;
		var data_source = document.getElementById("data_source").value;
		var product_type = document.getElementById("product_type").value;
		var tt_price;
		var tt_price2;
		
		if(product_type==0){
				alert("Please select product type and try again!!!");
				}else{
		if(no_educs==""){
		if(product_type==1){
		alert("Please supply number of educators");
		}	if(product_type==2){
		alert("Please supply number of educators");
		}	if(product_type==3){
		alert("Please supply number of learners");
		}	if(product_type==4){
		alert("Please supply number of learners");
		}
		}else{
			if(isNaN(no_educs)){
			if(product_type==1){
			alert("Number of educators must be numeric");
			}
			if(product_type==2){
			alert("Number of educators must be numeric");
			}
			if(product_type==3){
			alert("Number of learners must be numeric");
			}
			if(product_type==4){
			alert("Number of learners must be numeric");
			}
			}else{
				if(data_source==0){
				alert("Please select data source and try again!!!");
				}else{
				if(product_type==1){
					if(no_educs>99){
						
									tt_price = Number(no_educs) * 42;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
					}else{
						if(no_educs>79){
									tt_price = Number(no_educs) * 45;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
						}else{
							if(no_educs>59){
									tt_price = Number(no_educs) * 47;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
							}else{
								if(no_educs>39){
									tt_price = Number(no_educs) * 55;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}else{
									tt_price = Number(no_educs) * 63;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}
							}
						
						}
					}
				}
				if(product_type==2){
					if(no_educs>99){
						
									tt_price = Number(no_educs) * 75;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
					}else{
						if(no_educs>79){
									tt_price = Number(no_educs) * 85;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
						}else{
							if(no_educs>59){
									tt_price = Number(no_educs) * 95;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
							}else{
								if(no_educs>39){
									tt_price = Number(no_educs) * 110;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}else{
									tt_price = Number(no_educs) * 125;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}
							}
						
						}
					}
				}
				if(product_type==3){
						
									tt_price = Number(no_educs) * 15;
									tt_price2 = tt_price * 0.25;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
				}

				if(product_type==4){
						
									tt_price = Number(no_educs) * 19.5;
									tt_price2 = tt_price * 0.25;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
				}
				
				
				
				
				
				
			}
			}
			}
		}
	
}

function sort_name(){
		var product_type = document.getElementById("product_type").value;
	if (product_type==1){
	$('#the_number').text("Educators");	
	}
	if (product_type==2){
	$('#the_number').text("Educators");	
	}
	if (product_type==3){
	$('#the_number').text("Learners");	
	}
	if (product_type==4){
	$('#the_number').text("Learners");
	}
	
}

function sendinfo(){

var request = document.getElementById("request").value;
var ord_school_name = document.getElementById("ord_school_name").value;
var ord_emis =document.getElementById("ord_emis").value;
var ord_requester_name = document.getElementById("ord_requester_name").value;
var ord_requester_no = document.getElementById("ord_requester_no").value;

		var no_educs = document.getElementById("no_educs").value;
		var data_source = document.getElementById("data_source").value;
		var product_type = document.getElementById("product_type").value;

		
if(ord_school_name==""){
alert("Please type school name and try again!");
}else{
if(ord_emis==""){
alert("Please type EMIS no and try again!")
}else{
if(ord_requester_name==""){
alert("Please type your name no and try again!")
}else{
if(ord_requester_no==""){
alert("Please type contact no and try again!")
}else{

//#####################################################################################################

	function sent_order1(){
	
	
	alert("Request submitted successfully!!!");
	window.location.href = 'desk.html';	
			
		}
		
		$.post('log_order.php',{
		
		nu_request: request,	
		nu_ord_school_name: ord_school_name,	
		nu_ord_emis: ord_emis,	
		nu_ord_requester_name: ord_requester_name,	
		nu_ord_requester_no: ord_requester_no,
		nu_no_educs: no_educs,	
		nu_data_source: data_source,	
		nu_product_type: product_type,	

		success: sent_order1,
		});

//#####################################################################################################
}}}}
}

</script>
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
            <li><a href="desk.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="pricing.php">Pricing</a></li>
            <li><a href="clientzone.php">ClientZone</a></li>
            <li class="end"><a href="contacts.html">Contacts</a></li>
         </ul>
        </nav>
        <ul id="icons">
          <li><a href="#"><img src="../images/icons1.jpg" alt=""></a></li>
          <li><a href="#"><img src="../images/icons2.jpg" alt=""></a></li>
        </ul>
      </div>
      <div class="wrapper">
        <h1><a href="desk.html" id="logo">Learn Center</a></h1>
      </div>
      <div id="slogan">Need information about<span>products, features or billing?</span> </div>
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h2>Price Calculator</h2></td><td id="errors"></td>
  </tr>
</table>

              
              <form id="ContactForm" action="#">
                <div>
                  <div  class="wrapper"> <strong>Option:</strong>
                    <div class="bg">
                       <select name="product_type" id="product_type" onchange="sort_name()">
    <option value="0">Select Option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    <option value="4">Option 4</option>
   </select>

                    </div>
                  </div>
                  
                  
                  <div  class="wrapper"> <strong>Source:</strong>
                    <div class="bg">
  <select name="data_source" id="data_source">
    <option value="0">Select Source</option>
    <option value="1">EdusolSAMS</option>
    <option value="2">Allocation/Classification</option>
	<option value="3">Other</option>
    </select>
                    </div>
                  </div>
 
                   <div  class="wrapper"> <strong>Type:</strong>
                    <div class="bg">
  <select name="school_type" id="school_type">
     <option value="1">Ordinary School</option>
    <option value="2">Boarding School</option>
    <option value="3">Early childhood</option>
    <option value="4">Special needs</option>
  </select>
                    </div>
                  </div>
                 
                  
                   <div  class="wrapper"> <strong><div id="the_number">Educators</div></strong>
                    <div class="bg">
       <input type="text" class="input" name="no_educs" id="no_educs" value=""  />
                    </div>
                  </div>
                  
 
 
                  
                   <a href="#" class="button" onClick="calculate()"><span><span>Calculate</span></span></a>  </div>
              </form>
            </div>
            
            </br>
            </br>
            </br>
            </br>
                        <div class="pad_left1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><h2>Order Form</h2></td><td id="errors"></td>
  </tr>
</table>

              
              <form id="ContactForm" action="#">
                <div>
                  <div  class="wrapper"> <strong>Request</strong>
                    <div class="bg">
    <select name="request" id="request" class="select" >
    <option value="0">Order above product</option>
    <option value="1">Need more info</option>
    <option value="2">Come present at school</option>
    </select>
                   </div>
                  </div>
                  
                  
                  <div  class="wrapper"> <strong>School</strong>
                    <div class="bg">
       <input type="text" class="input" name="ord_school_name" id="ord_school_name" value="" placeholder="School Name"/>
                    </div>
                  </div>
                  
                  
                   <div  class="wrapper"> <strong>Emis</strong>
                    <div class="bg">
       <input type="text" class="input" name="ord_emis" id="ord_emis" value="" placeholder="Emis No"/>
                    </div>
                  </div>
 
                   <div  class="wrapper"> <strong>Requester</strong>
                    <div class="bg">
        <input type="text" class="input" name="ord_requester_name" id="ord_requester_name" value="" placeholder="Name and Surname"/>
                   </div>
                  </div>
 
 
                   <div  class="wrapper"> <strong>Contact</strong>
                    <div class="bg">
        <input type="text" class="input" name="ord_requester_no" id="ord_requester_no" value="" placeholder="Contact No"/>
                   </div>
                  </div>
                  
                   <a href="#" class="button" onClick="sendinfo()"><span><span>Submit</span></span></a> <a href="#" class="button" onClick="resertform()"><span><span>Clear</span></span></a> </div>
              </form>
            </div>



                </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
              <h2>Product Options</h2>
              <p><strong>Option 1:</strong> Convert existing TT to mobile</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Educator TT </br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Learner/Class TT</p>

             <p><strong>Option 2:</strong> Request a new TT</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Educator TT </br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Learner/Class TT</p>
 
             <p><strong>Option 3:</strong> Guardian Angel - Silver</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Educator TT </br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Learner/Class TT</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Mark learner attendace register and track homeworks from any smart device </br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Report on attendance/late coming p/learner</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Report on attendance/late coming p/learner p/learning area</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Report on homework attitude p/learner</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Report on homework attitude p/learner p/learning area</p>
              
              <p><strong>Option 4:</strong> Guardian Angel - Gold</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Guardian Angel - Silver</br>
              PLUS:</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />SMS is sent to parent/guardian whenever the learner is marked Absent or Late for school </p>
              
              
            <p><strong>All options come with the following printable TTs:</strong></br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Educator TT </br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Learner/Class TT</br>
             <img src="files/tick.jpg" alt="" width="16" height="16" />Relief timetable</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Composite School timetable</br>
             <img src="files/tick.jpg" alt="" width="16" height="16" />Composite by Educators</br>
              <img src="files/tick.jpg" alt="" width="16" height="16" />Composite by subjects</br>
             <img src="files/tick.jpg" alt="" width="16" height="16" />Composite by grades</p>
               
             
                <br/> <br/> <br/> 
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>
    <!-- content -->
    <!-- footer -->
    <footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
            </div>
            <div class="wrapper">
               <article class="col_4 pad_left2">Copyright &copy; <a href="#">SchoolEssentials.co.za</a> All Rights Reserved<br>
                </article>
             </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<div align=center>This website was Created by <a href="about.html">Zipho Matsoso</a></div></body>
</html>