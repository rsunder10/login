<?php
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";

$uid = htmlentities(strip_tags($_GET['uid']));
$actcode = htmlentities(strip_tags($_GET['actcode']));
 
if (activateUser($uid, $actcode) == true)
{
    $result= "Thank you for activating your account, You can now login.
		<a href='index.php'>Click here to login.</a>";
} else
{
    $result= "Activation failed! Please try again.If problem presists please contact the webmaster.";
}
 
?>
<!doctype HTML>
<html>
	<head>
    	<title>Activation By Sunder</title>
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/srm.css" />
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    
    </head>
    <body class="back">
    <div class="container">
    	<div class="jumbotron">
        	<h1>Activation Result</h1>
            <p>
            	<?php echo $result ?>
            </p>
            <p align="right">Message By Admin Sunder.</p>
        </div>
    
    </div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
    </body>