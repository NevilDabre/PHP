<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<?php
$servername="localhost";
$user="root";
$pass="";
$db="testdb";
$userID =0;
$userName = "";
$userIDerr ="";
$userNameerr="";

$conn = new mysqli($servername,$user,$pass,$db);

$sql = "create table userdata(
id int not null,
name VARCHAR(50)
)";

if($conn->connect_error)
{
    echo "Connection failed<br>";
}
echo "connection successful<br>";

/*
if($conn->query($sql)===true)
{
    echo "table created successfully<br>";
}
*/

if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (empty($_POST["id"])) {
        $userIDerr = "Enter your userID";
    } else {
        $userID = testuser($_POST["id"]);
        if (!preg_match("^[0-9]*$^", $userID)) {
            $userIDerr = "Enter only number";
        }
    }

    if (empty($_POST["name"])) {
        $userNameerr = "Enter User name";
    } else {
        $userName = testuser($_POST["name"]);
        //echo $userName;
        if (!preg_match("/^[a-zA-Z]+$/",$userName)) {
            $userNameerr = "Enter only String";
        }
    }

    $sqlInsert = "Insert into userdata VALUES (".$userID.",'".$userName."')";
    echo $sqlInsert;
        if ($conn->query($sqlInsert) == true) {
            echo "data inserted";
        }
        else
        {
            echo "Data insert Errror";
        }
    //echo "Data Insert Error";
        $conn->close();


}
function testuser($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}
?>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<H3>Enter Your Data.</H3>
ID : <input type="text" name="id" id="id" /> <span class="error">* <?php echo $userIDerr ?></span>
<br><br>
Name : <input type="text" name="name"  id="name" /> <span class="error">* <?php echo $userNameerr ?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>