<?php
$host="localhost";
$user="root";
$password="";
$database ="testdb";
mysql_connect($host,$user,$password,$database);

$query="SELECT * FROM `test`";
$result=mysql_query($query);

//$num=mysql_numrows($query);

//echo $num;

$query = "INSERT INTO `test`(`number`, `name`, `phone`, `email`) VALUES (77,'jj','99','ppp')";
mysql_query($query);
?>