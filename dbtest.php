<!DOCTYPE html>
<html>
<head>
<?php
$servername="localhost";
$user="root";
$pass="";
$db="testdb";
$userID = $userName = "";
$userIDerr = $userNameerr="";

$conn = new mysqli($servername,$user,$pass,$db);

$sql = "create table userdata(
id int not null,
name VARCHAR(50)
)";

if($conn->connect_error)
{
    echo "Connection failed<br>";
}
echo "connection successful";

if($conn->query($sql)===true)
{
    echo "table created successfully<br>";
}

if($SERVER('REQUEST_METHOD')=="POST") {
    if (empty($_POST['id'])) {
        $userIDerr = "Enter your userID";
    } else {
        $userID = testuser($_POST['id']);
        if (!preg_match('^[0-9]*$', $userID)) {
            $userIDerr = "Enter only number";
        }
    }

    if (empty($_POST['name'])) {
        $userNameerr = "Enter User name";

    } else {
        $userName = $_POST['name'];
        if (!preg_match("/^[a-zA-Z]/$", $userName)) {
            $userNameerr = testuser("Enter only String");
        }
    }
//$sqlInsert = "Insert into userdata VALUES (1,'Neville')";

    if ($conn->query($sqlInsert) == true) {
        echo "data inserted";
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
<form method="post" action="<?php echo htmlspecialchars($SERVER["PHP_SELF"]); ?>"
<H3>Enter Your Data.</H3>
ID : <input type="text" name="id" id="id" value=""/>
<br><br>
Name : <input type="text" name="name" value="" />
<br><br>
<input type="submit" name="submit" value="Submit">

</body>
</html>
