<?php

$username = "";
$password ="";
$server="localhost";
$dbpass="";
$dbuser="root";
$dbname="testdb";

$conn = new mysqli($server,$dbuser,$dbpass,$dbname);

if($conn->connect_error)
{
    echo "database not connected<br>";

}
else
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["email"])){

                echo "enter your user name<br>";
            }
            else
            {
                $username=testdata($_POST["email"]);
                if(!filter_var($username,FILTER_VALIDATE_EMAIL))
                {
                    echo "enter valid user name.<br>";
                }
            }

        if (empty($_POST["password"]))
        {
         echo ("enter password.<br>");
        }
        else
            {
               $password = testdata($_POST["password"]);
            }
    }

    $sql = "select * from test WHERE email='".$username."' and name ='".$password."'";
    echo $sql;
    $row = $conn->query($sql);
    if($row->num_rows>0)
    {
        if($row["email"]==$username && $row["name"]==$password)
        {
            echo "Welcome".$username."<br>";
        }
        else
        {
            echo "wrong credentials<br>";
        }
    }
    else
    {
        echo "user not exist<br>";
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