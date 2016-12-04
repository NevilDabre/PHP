<?php
$username = "";
$password ="";
$server="localhost";
$dbpass="";
$dbuser="root";
$dbname="shoppingCart";

$conn = new mysqli($server,$dbuser,$dbpass,$dbname);

if($conn->connect_error)
{
    echo "database not connected<br>";

}

?>