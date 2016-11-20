<?php

	session_start();
	//Get Values from form in login.php
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$dbuser ='root';
	$dbpass = '';
	$db='testdb';
	
	if($username && $password)
	{
	//prevent sql injection
	$username =stripcslashes($username);
	$password =stripcslashes($password);
	
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	
	$query = "Select * from users where username='$username' and password='$password'";
	$queryCount = "Select count(*) from users where username='$username' and password='$password'";
	
	
	$connect = mysql_connect('localhost',$dbuser,$dbpass) 
				or die("Can not connect");
	mysql_select_db($db) or die("database not found");
			
	$count = mysql_query($queryCount);
	$result = mysql_query($query) or die('failed to query db');
	
	
	if($count !=0)
	{
	
	$row = mysql_fetch_array($result);
	
	if($row['username']== $username && $row['password']==$password)
	{
		echo "Login Success!! Welcome ".$row['username'];
		echo " you're in! <a href='member.php'>Click </a> here to enter!";
		$_SESSION['username']=$username;
		
		
	}
	else
	{
		echo "Login Failed";
	}
	}
	else
	{
		die("user not exist");
	}
	
	mysql_close();
	}
	else
	{
		die("Please Enter username and password");
	}
?>
