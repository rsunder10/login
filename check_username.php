<?php	
session_start();
	include "php/dbconnect.php";
	include "php/config.php";
	include "php/validation.php";
	include "php/islogin.php";
if(isset($_GET['name'])){

		$username=test_input($_GET['name']);
		if(!empty($username))
		{
			
					$query1=sprintf("select username from user where username='%s';",$username);
					$result1=mysql_query($query1);
					
						
							if(mysql_num_rows($result1)>0)
							{
								echo 0;
							}
							else
							{
								echo 1;	
								
							}
				
				
				
			
			
		}
	}
?>