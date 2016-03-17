<?php
$domain='localhost.com';
function generate_code($length=10)

{
	if($length<=0)
	{
			return false;
		
	}
	$code ="";
	$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	srand((double)microtime() *1000000);
	for($i=0;$i<$length; $i++)
	{
	$code=$code.substr($chars,rand() % strlen($chars),1);	
	}
	
	return $code;
}


function sendLostPasswordEmail($username, $email, $newpassword)
{
 
    global $domain;
    $message = "
You have requested a new password on http://www.$domain/,
 
Your new password information:
 
username:  $username
password:  $newpassword
 
 
Regards
$domain Administration
";
 
    if (sendMail($email, "Your password has been reset.", $message, "no-reply@$domain"))
    {
        return true;
    } else
    {
        return false;
    }
 
 
}


function sendMail($to, $subject, $message, $from)
{
 
 
    $from_header = "From: $from";
 
    if (mail($to, $subject, $message, $from_header))
    {
        return true;
    } else
    {
        return false;
    }
    return false;
}

function activateUser($uid, $actcode)
{
 
    $query = sprintf("select activated from user where username = '%s' and actcode = '%s' and activated = 0  limit 1",
        mysql_real_escape_string($uid), mysql_real_escape_string($actcode));
 
    $result = mysql_query($query);
 
    if (mysql_num_rows($result) == 1)
    {
 
        $sql = sprintf("update user set activated = '1'  where username = '%s' and actcode = '%s'",
            mysql_real_escape_string($uid), mysql_real_escape_string($actcode));
 
        if (mysql_query($sql))
        {
            return true;
        } else
        {
            return false;
        }
 
    } else
    {
 
        return false;
 
    }
 
}

function ActivationEmail($username, $password, $uid, $email, $actcode)
{
    global $domain;
    $link = "http://www.$domain/activate.php?uid=$uid&actcode=$actcode";
    $message = "
Thank you for registering on http://www.$domain/,
 
Your account information:
 
username:  $username
password:  $password
 
Please click the link below to activate your account.
 
$link
 
Regards
From Sunder
";
 
    if (sendMail($email, "Please activate your account.", $message, "no-reply@$domain"))
    {
        return true;
    } else
    {
        return false;
    }
}

function checkLogin($u, $p)
{
    $query = sprintf("
		SELECT user_id 
		FROM user 
		WHERE 
		username = '%s' AND password = '%s' 
		AND activated = 1 
		LIMIT 1;", mysql_real_escape_string($u), mysql_real_escape_string(md5($p)));
    $result = mysql_query($query);
    if (mysql_num_rows($result) != 1)
    {
        return false;
    } else
    {
      
        $row = mysql_fetch_array($result);
        $_SESSION['loginid'] = $row['user_id'];
        $_SESSION['username'] = $u;
        return true;
		
    }
    return false;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function lostPassword($username, $email)
{
 
    $query = sprintf("select user_id from user where username = '%s' and email = '%s' limit 1",
        $username, $email);
 
    $result = mysql_query($query);
 
    if (mysql_num_rows($result) != 1)
    {
 
        return false;
    }
 
 
    $newpass = generate_code(8);
 
    $query = sprintf("update user set password = '%s' where username = '%s'",
        mysql_real_escape_string(md5($newpass)), mysql_real_escape_string($username));
 
    if (mysql_query($query))
    {
 
            if (sendLostPasswordEmail($username, $email, $newpass))
        {
            return true;
        } else
        {
            return false;
        }      
 
    } else
    {
        return false;
    }
 
    return false;
 
}


?>