<?php
$uname = "localhost";
$username = "root";
$password = "";
$db_name = "db_conn";
$conn = mysqli_connect($uname, $username, $password, $db_name)or die("Unable to connect");
echo"CONNECT";
?>