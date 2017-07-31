<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username']))
{
	 header('Location:login.php');
}
include '../includes/header.php';
require_once("connection.php");
$username = $_SESSION['username'];
$id=$_GET['cid'];
$status=$_GET['status'];
include '../includes/navbar.php';
        $str= "update bill set status = '$status' where id ='$id' limit 1";
        mysqli_query($conn,$str);
        if ($str){
          echo
          print "<div class='noti'> Change status Successfully. <a href='list_bill.php'>Press here to go back.</a></div>";
          exit();
        }
        else{
          print "<div class='noti'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
          exit();
        }
?>
<?php include '../includes/footer.php';?>
