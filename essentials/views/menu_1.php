<?php
	session_start();
	include("../config/table32.php");
	include("functions.php");

	
?>

<html>
	<head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>SCHOOLESSENTIALS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="file:///C|/wamp/www/favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/style4.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
<body>

        <div class="container">
        <br/>
        <header>
        <h1>CLIENT <span>zone</span></h1>
        </header>
 		<section>
                <div id="container_buttons">
	<table border="0" cellpadding="2px" width="600px">
       
     
         <tr>
           <td>
                   <p>
                        <a href="timetables.php" target="content" class="a_demo_four">Timetables</a>
                     </p>
       
			</td>
		</tr>
		
         <tr>
           <td>
                   <p>
                        <a href="registers.php" target="content" class="a_demo_four">Registers</a>
                     </p>
       
			</td>
		</tr>
 
         <tr>
           <td>
                   <p>
                        <a href="logout_ask.php" target="content" class="a_demo_four">Log out</a>
                     </p>
       
			</td>
		</tr>

    </table>
    </div>
			</section>

</body>
</html>