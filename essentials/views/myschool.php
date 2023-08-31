<?php require_once('config/config.php'); ?>
<?php
$user_name = "Mbali";

$result = mysql_query("SELECT * FROM clients WHERE user_name='$user_name'");
$norows = (mysql_num_rows($result));

    if ($norows == 1) {
		$maheader="133";
			while ($row = mysql_fetch_assoc($result)) {
								$Contact = $row["Contact"];
								$Designation = $row["Designation"];
								$hearaboutus = $row["hearaboutus"];
								$IM = $row["IM"];
								$KnownAs = $row["KnownAs"];
								$Other = $row["Other"];
								$type = $row["type"];
								$rresult = mysql_query("SELECT * FROM fs WHERE IM='$IM'" );
									while ($row = mysql_fetch_assoc($rresult)) {
										$School = $row["Name"];	
									}
								}
    }
    else {
        $maheader="136";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>School Essentials | My School</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}</style>
<![endif]-->
<script>
function sendinfo(){
	alert("heree");

}

function allright(){
 name = document.getElementById("name").value;
 email = document.getElementById("email").value;
 subject = document.getElementById("maSubject").value;
 msg1 = document.getElementById("matext").value;
 msg = msg1 + " :" + name;
 
	var url = 'emailsent.php?name='
	+ name
	+ '&email='
	+ email
	+ '&subject='
	+ subject
	+ '&msg='
	+ msg
	+ '&msg1='
	+ msg1

	window.open(url, '_self');
}
</script>
</head>
<body id="page5">
<div class="body1">
  <div class="main">
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
    <td><h2>school info</h2></td><td id="errors"></td>
  </tr>
</table>

              
              <form id="ContactForm" action="#">
                <div>
                  <div  class="wrapper"> <strong>User name:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="user_name" value="<?php echo $user_name; ?>">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Known as:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="KnownAs" value="<?php echo $KnownAs; ?>">
                    </div>
                  </div>
				<div  class="wrapper"> <strong>Designation:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="Designation" value="<?php echo $Designation; ?>">
                    </div>
                  </div>
				<div  class="wrapper"> <strong>Other:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="Other" value="<?php echo $Other; ?>">
                    </div>
                  </div>
				<div  class="wrapper"> <strong>Type:</strong>
                    <div class="bg">
                      <label for="Type"></label>
                      <select name="Type" id="Type">
                        <option value="Ordinary School">Ordinary School</option>
                        <option value="Early Childhood Development">Early Childhood Development</option>
                        <option value="Special Needs">Special Needs</option>
                        <option value="Boarding School">Boarding School</option>
                        </select>
                   </div>
                  </div>
				<div  class="wrapper"> <strong>Province:</strong>
                    <div class="bg">
                       <label for="Province"></label>
                      <select name="Province" id="Province">
                        <option value="GP">GP</option>
                        <option value="Internet">Internet</option>
                        <option value="News Paper">News Paper</option>
                        <option value="SMS">SMS</option>
                        <option value="Internet">Internet</option>
                        <option value="News Paper">News Paper</option>
                        <option value="SMS">SMS</option>
                        <option value="Internet">Internet</option>
                        <option value="News Paper">News Paper</option>
                       </select>
                    </div>
                  </div>
				<div  class="wrapper"> <strong>School:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="School" value="<?php echo $School; ?>">
                    </div>
                  </div>
			<div  class="wrapper"> <strong>EMIS:</strong>
                    <div class="bg">
                      <input type="text" class="input" id="IM" value="<?php echo $IM; ?>">
                    </div>
                  </div>

                  <div  class="wrapper"> <strong>How did you hear about us?:</strong>
                    <div class="bg">
                      <label for="hearaboutus"></label>
                      <select name="hearaboutus" id="hearaboutus">
                        <option value="SMS">SMS</option>
                        <option value="Internet">Internet</option>
                        <option value="News Paper">News Paper</option>
                       </select>
                    </div>
                  </div>
                    <a href="#" class="button" onClick="sendinfo()"><span><span>Continue</span></span></a> <a href="clientzone.php?logout" target="_parent" class="button"><span><span>Log out</span></span></a> </div>
              </form>
            </div>
            </article>
         </div>
      </div>
    </section>
    <!-- content -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>