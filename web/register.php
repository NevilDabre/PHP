<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta http-equiv="content-stype-type" content="text/css" >
<title>Diamond Fashion Store</title>
</head>
<link rel="stylesheet" type="text/css" href="./css/common_menu.css">
<link rel="stylesheet" type="text/css" href="./css/main.css" title="main" />
<script type="text/javascript" src="./js/script.js"></script>
<?php

session_start();

if( isset($_SESSION['user_id'])){
	header("Location: /");
}


require 'database.php';
$message = '';

if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']))
{

    $sql = "INSERT INTO userdata (firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':firstname',$_POST['firstname']);
    $stmt->bindParam(':lastname',$_POST['lastname']);
    $stmt->bindParam(':email',$_POST['email']);
    $stmt->bindParam(':password',$_POST['password']);

	console.log($stmt);

	if( $stmt->execute()):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating';
	endif;
}
?>

<body>
<header class="wrapper">
    <div id="logo">
        <p><img src="./img/logo.jpg" alt="company logo" width="30" height="30"/></p>
    </div>
    <div id="intro">
        <p>Welcome to Diamond Fashion Store</p>
    </div>
</header>
<nav>
    <ui>
    	<li><a href="index.html">Home</a></li>
    	<li><a href="shoppinglist.php">Shopping List</a></li>
        <li><a href="contactus.html">Contact US</a></li>
        <li><a href="login.php">Register/Login</a></li>
	</ui>
</nav>

<article>
<br><br>
<div>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
</div>

	<form method="post" id="RegisterForm" name="RegisterForm" action="register.php" onSubmit="return ValidateFormRegister()">

			<label for="Firstname">First Name</label><br>
			<input id="firstname" name="firstname" type="text" placeholder="Enter your First Name" >
			<br><br>
			<label for="Lastname">Last Name</label><br>
			<input id="lastname" name="lastname" type="text" placeholder="Enter your Last Name" >
			<br><br>
			<label for="email">Email</label><br>
			<input id="email" name="email" type="text" placeholder="yourmail@domain.com" ><br><br>
			<label for="password">Password</label><br>
            <input id="password" name="Password" type="password" placeholder="Type Password"  ><br><br>
			<label for="repassword">Confirm Password</label><br>
			<input id="repassword" name="repassword" type="password" placeholder="Re-Type Password"><br><br>
		</div>
		<br>
<br>

    <button type="submit" >Register</button>
		<button type="reset" onClick="">Reset</button>
    
</form>
</article>
<footer>
			<p>Website By Neville &copy;</p>
			<p>Tel. 519-577-0354</p>
			<p>E-mail. neville.dabre@gmail.com</p>
</footer>
</body>


</html>
