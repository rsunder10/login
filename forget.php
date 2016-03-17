<?php
    session_start();
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";
	include "php/islogin.php";
	if(isset($_POST['user'])&& isset($_POST['email']))
	{
		if(!empty($_POST['user']) && !empty($_POST['email']))
		{
			$username=test_input($_POST['user']);
			$email=test_input($_POST['email']);
			if(lostPassword($username,$email))
			{
			
					echo'<div class="container"><div class="jumbotron text-center">
							<h3><small>Email Has been Sent To Your Account.Regarding Your New Password</small></h3>
							<a href="index.php">Go Back </a>
					</div>
					</div>';	
				}
			
			else{
					echo'<div class="container"><div class="jumbotron text-center">
							<h3>Wrong Username Or Email</h3>
					</div></div>';
				}
			}
		}
		
?>
<!doctype HTML>
<html>
	<head>
    	<title>Forget Password By Sunder</title>
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/srm.css" />
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    
    </head>
    <?php
	if(isset( $_SESSION['error2']))
	{
		action();
		unset($_SESSION['error2']);
	}
    ?>
    <body class="back">
            <div align="center">
     <div class="center2 contain" align="left">
     
     <form role="form" method="post">
     <br>
     	<div class="form-group">
        	<label>Username:</label>
            <br>
            <input type="text" class="form-control" name="user">
        </div>  
     	<div class="form-group">
        	<label>Email:</label>
            <br>
            <input type="text" class="form-control" name="email">
        </div>               
        <div class="form-group" align="center">
        	<input type="submit" class="btn btn-info" name="submit" value="submit" >
        </div>
     </form>
     <br><br><br>
     <div class="container">
     	<div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6"><a href="index.php">Register</a></div>       
        </div>
     </div>
        </div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>