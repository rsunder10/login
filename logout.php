<?php 
	include "php/dbconnect.php";
	include "php/config.php";

session_start();

   unset($_SESSION['loginid']);
   unset($_SESSION['username']);
   session_destroy();
   header('Location: index.php');

?>
		