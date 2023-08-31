<!DOCTYPE html>
<html lang="en">
<head>
<title>School Essentials | Client Zone</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link href="../css/error_block.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Molengo_400.font.js"></script>
<script type="text/javascript" src="../js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript">
 function tester(){
	
	var mausername = document.getElementById("login_input_username1").value;
	document.getElementById("login_input_username").value = mausername;
	var mapassword = document.getElementById("login_input_password1").value;
	document.getElementById("login_input_password").value = mapassword;
	
	if(mausername==""){
		alert("Please type username and try again!");
		}else{
			if(mapassword==""){
				alert("Please type password and try again!");
			}else{
				document.getElementById("hela2").click();	
			}
		}
 }
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="../js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("../js/PIE.htc");}</style>
<![endif]-->
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
        <h1><a href="desk.html" id="logo">School Essentials</a></h1>
      </div>
      <div id="slogan"> Client Zone<span></span> </div>
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
            <table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td id="error_block" ><h3>Sign in</h3></td> 
    
    <td class="errors" align="right"><h4>
    <?php

// show negative messages
if ($login->errors) {
    foreach ($login->errors as $error) {
		echo $error;    
    }
}

// show positive messages
if ($login->messages) {
    foreach ($login->messages as $message) {
        echo $message;
    }
}

?>    

    </h4></td>
  </tr>
</table>

 <form id="newsletter" action="clientzone.php" method="post">
                  <div class="wrapper">
                    <div class="pad_top2">
                       <label for="login_input_username">Username</label>
                    </div>

                    <div class="bg">
                     <input id="login_input_username1" type="text" name="user_name">
                    </div>
                    
                </div>
                  <div class="wrapper">
                    <div class="pad_top2">
                       <label for="login_input_password">Password</label>
                    </div>

                    <div class="bg">
                     <input id="login_input_password1" type="password" name="user_password" autocomplete="off">
                    </div>
                    
                </div>
                   <a href="#" name="login" type="submit" class="button" onClick="tester()"><span><span><strong>Log in</strong></span></span></a>
              </form>
   </div>
         </div>
      </div>
    </section>
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

<!-- login form box -->
<form method="post" action="ga.php" name="loginform">
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
    <input id="hela2" type="submit"  name="login" value="" />
</form>


</body>
</html>         

<!-- this is the Simple sexy PHP Login Script. You can find it on http://www.php-login.net ! It's free and open source. -->