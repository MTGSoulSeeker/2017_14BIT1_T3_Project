<?php
session_start();
ob_start();
$id = $_GET['id'];
if ($id!= "")
{
        if (isset($_SESSION['basket'][$id]))
		{
            $_SESSION['basket'][$id]++;//neu session nay da ton tai thi tang len 1
        }
		else
		{
            $_SESSION['basket'][$id] = 1;
        }
        header("location:basket.php");
}
else
{
       header("location:category.php?page=1");//quay lai trang san pham 
}
?>
