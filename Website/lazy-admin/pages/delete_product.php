<?php
session_start();
$id=$_GET['cid'];
require("connection.php");
$str= "delete from product where id ='$id'";
// thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
mysqli_query($conn,$str);
header("location:list_product.php");
exit();
?>
