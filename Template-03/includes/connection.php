<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cinema';

$conn = mysqli_connect($host, $user, $password, $database) or die("Kết nối không thành công:".mysqli_connect_error());;

mysqli_select_db($conn,$database);
?>
