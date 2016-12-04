<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta http-equiv="content-stype-type" content="text/css" >
<title>Diamond Fashion Store - Login</title>
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

$userflag =0;
$passflag = 0;
$message='';


   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["email"])) {

            echo "enter your email.<br>";
        } else {
            $username = testdata($_POST["email"]);
            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                echo "Enter valid user name.<br>";
            } else {
                $userflag = 1;
            }
        }

        if (empty($_POST["password"])) {
            echo("Enter password.<br>");
        } else {
            $password = testdata($_POST["password"]);
            $passflag = 1;
        }

        if ($passflag == 1 && $userflag == 1) {
            $sql = "select * from userdata WHERE email='" . $username . "' and password ='" . $password . "'";
            //echo $sql;
            $row = $conn->query($sql);
            if ($row->num_rows > 0) {
                while($result = $row->fetch_assoc()) {
                if ($result["email"] == $username && $result["name"] == $password) {
                    echo "Welcome " . $username . "<br>";
                    $_SESSION['user_id'] = $result['firstname'];
                    header("Location: /");

                }
                else {
                    $message = "wrong user credentials";
                }
            }} else {
                $message = "user not exist<br>";
            }
        }
    }


$conn->close();

function testdata($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
		<p><? = $message ?></p>
	<?php endif; ?>
</div>
	<form method="post" id="loginForm" name="loginForm" action="login.php" onSubmit="return ValidateFormLogin()">
            <p id="errmsg"></p>
			<label for="email">Email</label><br>
			<input id="email" name="email" type="text" placeholder="x@y.z" ><br><br>
			<label for="password">Password</label><br>
            <input id="password" name="Password" type="password" placeholder="Type Password"  ><br><br>
            </div>
		<br>
<br>
<div>
    <label for="notAMember">Not a Member?</label><a href="register.php">Register Here!</a><br>

    </div>

    <button type="submit" >Login</button>
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
