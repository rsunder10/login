<?php
session_start();
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";
	include "php/islogin.php";
	
		if(isset($_POST['user'])&& isset($_POST['pass']))
	{
		$u=$_POST['user'];
		$p=$_POST['pass'];
		if(!empty($u)&&!empty($p))
		{
			if(checkLogin($u,$p)){
				header("Location:success.php");	
			}
			else
			{
				header("Location:failed.php");
				$_SESSION['err']="Error Found";
			}
		}
	}
	
	?>
<!doctype HTML>
<html>
	<head>
    	<title>Failed Login By Sunder</title>
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/srm.css" />
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    
    </head>
    <body class="back">
 
            <div align="center">
     <div class="center contain" align="left">
     
     <form role="form" method="post">
     	<div class="form-group">
        	<label>Username:</label>
            <input type="text" class="form-control" name="user">
        </div>
     	<div class="form-group">
        	<label>Password:</label>
            <input type="password" class="form-control" name="pass">
        </div>        
        <div class="form-group" align="center">
        	<input type="submit" class="btn btn-info" name="submit" value="submit" >
        </div>
     </form>
     <br>
     	<?php
			if(isset($_SESSION['err']))
			{	
				echo '<div class="text-danger">Username Or Password Not Matched</div>';
			
			}
		
		?>
     
     <br>
     <div class="container">
     	<div class="row">
        <div class="col-sm-3">
        	<a href="forget.php">Forget Password</a>
        </div>
        <div class="col-sm-6"><a href="index.php">Register</a></div>       
        </div>
     </div>
        </div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>