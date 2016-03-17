<?php
	session_start();
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";
	
	if(isset($_SESSION['loginid']))
	{
		$id=$_SESSION['loginid'];
		$query=sprintf("select * from user where user_id=%d;",mysql_real_escape_string($id));
		if($run=mysql_query($query))
		{
			if(mysql_num_rows($run)==1)
			{
					$row=mysql_fetch_array($run);
					$username=$row['username'];
					$password=$row['password'];
					$email=$row['email'];
					$first=$row['first'];
					$last=$row['last'];
					$gender=$row['gender'];
					$contact=$row['contact'];
					$city=$row['city'];
					$state=$row['state'];
			}
		}
	
		
	}
	else{
		header('Location:failed.php');	
	}
?>
<!doctype HTML>
<html>
	<head>
    	<title>Login by Sunder</title>
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/srm.css" />
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    
    </head>
    <body>
    <div class="container">
    <div class="alert-danger"><h1 align="center">User Data</h1></div>
    <table class=" table table-bordered table-hover">
        <tr>
        	<th>UserName</th>
            <td class="text-capitalize"><?php echo $username?></td>
        </tr>
        <tr>
        	<th>First Name</th>
            <td class="text-capitalize"><?php echo $first?></td>
        </tr>   
        <tr>
        	<th>Last Name</th>
            <td class="text-capitalize"><?php echo $last?></td>
        </tr>                   
        <tr>
        <th>Gender</th>
            <td class="text-capitalize"><?php echo $gender?></td>
        </tr>
        	<th>Email ID</th>
            <td class="text-capitalize"><?php echo $email?></td>
        </tr>
        <tr>
        	<th>Contact</th>
            <td class="text-capitalize"><?php echo $contact?></td>
        </tr>
        <tr>
        	<th>City</th>
            <td class="text-capitalize"><?php echo $city?></td>
        </tr>
                <tr>
        	<th>State</th>
            <td class="text-capitalize"><?php echo $state?></td>
        </tr>                     
    
    </table> 
    </div>
    <div class="container">
    	<div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"><a href="logout.php"><h4><strong>Log Out</strong></h4><a></div>
        </div>
    </div>
    
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/prog.js"></script>
     </body>
</html>