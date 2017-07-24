<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'lazy';

$conn = mysqli_connect($host, $user, $password, $database) or die("Connection Successful".mysqli_connect_error());;

mysqli_select_db($conn,$database);
?>
