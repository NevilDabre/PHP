<?php
session_start();

session_destroy();

echo "You've have been logout!<BR><a href='userlogin.php'> Login </a>";

?>