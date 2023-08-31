<?php
include '../config/table32.php';
   $to = "clientcare@schoolessentials.co.za";

   $name = $_GET['name'];
   $subject = $_GET['subject'];
   $message = $_GET['msg'];
   $message1 = $_GET['msg1'];
   $header = $_GET['email'];
   $status = "New";
   $Log_date=date('Y-m-d');
 
  //mail($to,$subject,$message,$header);
 
$db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

   $qry = $db->prepare(
    'INSERT INTO maemails (name, subject, message, header, status, log_date) VALUES (?, ?, ?, ?, ?, ?)');
$qry->execute(array($name, $subject, $message1, $header, $status, $Log_date));

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>School Essentials | Thanking you</title>
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
      <div id="slogan"> Thank You<span></span> </div>
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
    <td id="error_block" ><h3>You query has been send successfully...</h3></td> 
    
    <td class="errors" align="right"><h4>

    </h4></td>
  </tr>
</table>
 <form id="newsletter" action="clientzone.php" method="post">
                  <div class="wrapper">
                    <div class="pad_top2">
                       <label for="login_input_username">We will be in touch with you shortly...</label>
                    </div>

                     
                </div>
                    <a href="desk.html" name="Home" type="submit" class="button"><span><span><strong>Home</strong></span></span></a>
              </form>
   </div>
   
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
</body>
</html>         
