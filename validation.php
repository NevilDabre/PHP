<?php

$username = "";
$password ="";
$server="localhost";
$dbpass="";
$dbuser="root";
$dbname="testdb";
$userflag=$passflag=0;

$conn = new mysqli($server,$dbuser,$dbpass,$dbname);

if($conn->connect_error)
{
    echo "database not connected<br>";

}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {

            echo "enter your user name<br>";
        } else {
            $username = testdata($_POST["email"]);
            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                echo "enter valid user name.<br>";
            } else {
                $userflag = 1;
            }
        }

        if (empty($_POST["password"])) {
            echo("enter password.<br>");
        } else {
            $password = testdata($_POST["password"]);
            $passflag = 1;
        }

        if ($passflag == 1 && $userflag == 1) {
            $sql = "select * from test WHERE email='" . $username . "' and name ='" . $password . "'";
            //echo $sql;
            $row = $conn->query($sql);
            if ($row->num_rows > 0) {
                while($result = $row->fetch_assoc()) {
                if ($result["email"] == $username && $result["name"] == $password) {
                    echo "Welcome " . $username . "<br>";
                }
                else {
                    echo "wrong user credentials";
                }
            }} else {
                echo "user not exist<br>";
            }
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