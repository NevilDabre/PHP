<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
$nameerr = $emailerr = $gendererr = $commenterr = $websiteerr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if(empty($_POST["name")
	{
		nameerr="Enter Name";
	}
	else
	{
	$name = test_input($POST["name"]);
		if(!preg_match("/^[a-zA-Z]*$/",$name))
		{
			$nameerr = "Only Letters";
		}
	}
	
	if(empty($_POST["email"])
	{
		emailerr="Enter Email";
	}
	else
	{
	$email = test_input($POST["email"]);
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
					$emailerr = "Enter Proper Email";
			}
	
	}
	
	if(empty($_POST["website"])
	{
		websiteerr = "Website address required";
	}
	else
	{	
	$website = test_input($POST["website"]);
		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
		{
			$websiteerr = "Invalid URL";
		}
	
	}
	if(empty($_POST["comment"])
	{
		$commenterr="Comments Required";
	}
	else
	{
	$comment = test_input($POST["comment"]);
	}
	if(empty($_POST["gender"])
	{
		gendererr = "Select a gender";
	}
	else
	{
	$gender = test_input($POST["gender"]);
	}
	
	}
	
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
?>

<h2> PHP Form Validation Example </h2>
<form method="post" action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name" value="<?php echo $name;?>"> <?php echo $nameerr; ?>
<br><br>
Email: <input type="text" name="email" value="<?php echo $email;?>"><?php echo $emailerr;?>
<br><br>
Website: <input type="text" name="website" value="<?php echo $website?>"><?php echo $websiteerr; ?>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40" value=<?php echo $comment;?>"></textarea>
<?php echo $commenterr; ?>
<br><br>
Gender:
<input type="radio" name="gender" value="female" value="<?php if(isset($gender) && $gender=="female") echo "checked";?>">Female
<input type="radio" name="gender" value="male" value="<?php if(isset($gender) && $gender=="male") echo "checked";?>">Male
<?php echo $gendererr;?>
<br>
<input type="submit" name="submit" value="submit">
</form>

<?php
echo "<h2> Your Input</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $Gender;
?>
</body>
</html>