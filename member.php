<?php
session_start();

if($_SESSION['username'])
{
echo "Welcome, ".$_SESSION['username']."!<br> <a href='logout.php'> Logout </a>";
}
else
{
		die("You must login! <a href='userlogin.php'> Login </a>");
}

?>