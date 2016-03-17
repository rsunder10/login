<?php 
session_start();
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";
	include "php/islogin.php";
	if(isset($_SESSION['error']))
	{	function act(){
		echo '<div class="jumbotron text-center"><h3><small>UserName Exists Try DIfferent USerName And Use Check Availability Option Next Time</small></h3></div>'	;
		unset($_SESSION['error']);
	}
	}

	if(isset($_POST['user'])&& isset($_POST['pass']))
	{
		$u=$_POST['user'];
		$p=$_POST['pass'];
		@$c=$_POST['check'];
		if(!empty($u)&&!empty($p))
		{
			if(checkLogin($u,$p)){
				header("Location:success.php");	
			}
			else
			{
				header("Location:failed.php");
			}
		}
	}
	if(isset($_POST['username'])&&isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])&&isset($_POST['pass1'])&&isset($_POST['pass2'])&&isset($_POST['gender'])&&isset($_POST['contact'])&&isset($_POST['city'])&&isset($_POST['state'])&&isset($_POST['check'])){
		
		$username=test_input($_POST['username']);
		$first=test_input($_POST['first']);
		$last=test_input($_POST['last']);
		$email=test_input($_POST['email']);
		$pass1=test_input($_POST['pass1']);
		$pass2=test_input($_POST['pass2']);
		$gender=test_input($_POST['gender']);
		$contact=test_input($_POST['contact']);
		$city=test_input($_POST['city']);
		$state=test_input($_POST['state']);
		$check=test_input($_POST['check']);
		if(!empty($username)&& !empty($first)&&!empty($last)&&!empty($email)&&!empty($pass1)&&!empty($pass2)&&!empty($gender)&&!empty($contact)&&!empty($city)&&!empty($state))
		{
			if($pass1==$pass2)
			{
					$query1=sprintf("select user_id from user where username = '%s';",$username);
					if($result1=mysql_query($query1))
					{
						
							if(mysql_num_rows($result1))
							{
								header('location:index.php',true);
								$_SESSION['error']='UserName Exists';
							}
							else{
								$pass2=md5($pass2);
								$code=generate_code();
									$query2=sprintf("INSERT INTO `login`.`user` (`user_id`, `username`, `first`, `last`, `email`, `password`, `gender`, `contact`, `city`, `state`, `actcode`, `activated`) VALUES ('', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '0');",$username,$first,$last,$email,$pass2,$gender,$contact,$city,$state,$code);
									if($result2=mysql_query($query2))	
									{
										
									ActivationEmail($username, $password,$usename,$email,$code);									
										header('location:activationmessage.php',true);
										
									}
								
							}
							
					}
				
				
			}
			else
			{	
				$error="Enter the Matching Password";
				die($error);
			}
			
		}
	}

?> 
<!doctype HTML>
<html>
	<head>
    	<title>Login by Sunder</title>
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/srm.css" />
        <link rel="stylesheet" href="css/intlTelInput.css">
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">    
    </head>
    <body>
     <nav class="navbar navbar-default" role="navigation">
  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="default.php">Login System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right padd">
            <form class="form-inline" role="form" method="post">
  <div class="form-group">
      <input type="text" class="form-control" id="user" placeholder="username" name="user">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
</form>
          </ul>
		  </div>
    </nav>
    <div class="container-fluid">
    <?php if(isset($_SESSION['error'])){ act();}?>
    <div class="row">
    	<div class="col-sm-12">
     <div class="text-center" > <h1><small class="open">Create your Account Just By Simple Registeration</small> </h1> </div>
        </div>
    
    </div>
       <br>
        <br>
        <br>
    <div class="row">
		<div class="col-sm-5">
        <form role="form" class="contain" method="post" id="form">
    <label for="exampleInputEmail1">Name</label>
	<div class="form-group">
    <div class="row">
   <div class="col-sm-6" id="f1"> <input type="text" class="form-control" id="first" placeholder="First" name="first"></div>
    <div class="col-sm-6" id="f11"><input type="text" class="form-control" id="last" placeholder="Last" name="last"></div>
   </div>
   </div>
   <div id="1" style="color:red;"></div>
   <div class="form-group" data-toggle="popover" data-trigger="focus" title="Enter Valid Username" data-content="You Can Use Letter Number Period" id="f2">
   <label>Choose Your Username</label>
   <input type="text" class="form-control" id="username" name="username">
   <input type="button" class="btn-default" value="check Availability" id="check_username_availability">
   <div id="username_availability_result" ></div>
   </div>
   <div  id="2" style="color:red;"></div>
   <div class="form-group" data-toggle="popover" data-trigger="focus" title="Enter Valid Email ID" data-content="Use Valid Email Address As Your Activation Code Will Be Sent There" id="f3">
   	<label>Enter Your Email Address</label>
    <input type="email" class="form-control" id="email" name="email">
   </div>
   <div  id="3" style="color:red;"></div>
   <div class="form-group"  data-toggle="popover" data-trigger="focus" title="Enter Valid Password" data-content="Use at least 8 characters. Don’t use a password from another site, or something too obvious like your pet’s name" id="f4">
   <label>Create A Password</label>
   <input type="password" class="form-control" id="password" min="8" name="pass1">
   </div>
   <div id="3" style="color:red;"></div>
   <div class="form-group">
   <label>Confirm Your Password</label>
   <input type="password" class="form-control" id="password2" min="8" name="pass2">
   </div>
   <div id="4" style="color:red;"></div>
   <div class="form-group" id="f5">
   	<label>Gender</label>
    <select class="form-control" id="gender" name="gender">
    	<option id="del" value="a">I Am</option>
    	<option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
    </select>
   </div>
   <div id="5" style="color:red;"></div>
   <div class="form-group" data-toggle="popover" data-trigger="focus" title="Enter Valid Contact Number" data-content="It Help Us Make Your Account Secure By Sending You Messages" id="f6">
   		<label>Contact Number</label>
        <input type="text" class="form-control" id="mobile-number" name="contact">
        </div>
        <div  id="6" style="color:red;"></div>
      <div class="form-group" data-toggle="popover" data-trigger="focus" title="Enter City" data-content="Enter The Place Where Your Live" id="f7">
   	<label>City</label>
    <input type="text" class="form-control" id="city" name="city">
   </div>
   <div id="7" style="color:red;"></div>
      <div class="form-group"  data-toggle="popover" data-trigger="focus" title="Enter State" data-content="Enter The State Where Your Live" id="f8">
   	<label>State</label>
    <input type="text" class="form-control" id="state" name="state">
   </div>
   <div  id="8" style="color:red;"></div>
   <div class="form-group">
   <label class="form-inline">
   	<input type="checkbox" value="Agree" class="form-control" id="check" name="check"> I Agree to <a>Terms</a>And <a>Conditions</a>
   </label>
 
   </div>
   <div  id="9" style="color:red;"></div>
   <div class="row">
   <div class="col-sm-8"></div>
   <div class="col-sm-2">
   <div class="form-group">
   		<input type="submit" class="btn btn-primary" value="Submit" id="submit">
   </div>
   </div>
   </div>
   </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
<blockquote>
     <h1 class="text-info">Features:</h1>
    <ul>
    <li>Registration</li>
    <li>Lost password</li>
    <li>Various checks on passwords and usernames</li>
    <li>Passwords are stored in a database with a md5 encryption</li>
	</ul>
<h1 class="text-info">Requirements:</h1>
<ul>
    <li>Mysql database</li>
    <li>a php & mysql enabled host</li>
    <li>php mail() enabled host</li>
    <li>ftp access to your website</li>
</ul>
           </blockquote>
        </div>
     </div>
  
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/prog.js"></script>
     <script src="js/des.js"></script>
	 <script src="js/intlTelInput.min.js"></script>
     <script src="js/submit.js"></script>
     <script>
  $("#mobile-number").intlTelInput();
</script>
<script>
var avail;
    $(document).ready(function() {  
       
            var checking_html = 'Checking...';  
       
            $('#check_username_availability').click(function(){  
		
                
                if($('#username').val().length <1){  
                   
                    $('#username_availability_result').html('Enter The Username First');
					$('#username_availability_result').addClass('text-danger').removeClass('text-success');  
					
                }else{  
                   
                    $('#username_availability_result').html(checking_html);  
                    check_availability();  
                }  
            });  
      
      });  
      
    
    function check_availability(){  
         
            var username = $('#username').val();  
      
            
            $.ajax({
				url:'check_username.php',data:'name='+username,success: function(data){  
                    
                    if(data == 1){  
                     
                        $('#username_availability_result').html(username + ' is Available');
						$('#username_availability_result').addClass('text-success').removeClass('text-danger');  
					
                    }else{  
                         
                        $('#username_availability_result').html(username + ' is not Available');
						 $('#username_availability_result').addClass('text-danger').removeClass('text-success');
						
                    }   
			}

            });  
      
    }
	</script>  
     </body>
</html>