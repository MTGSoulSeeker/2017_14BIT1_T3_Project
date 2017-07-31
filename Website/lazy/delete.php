<?php
session_start();
ob_start();
if (isset($_GET['id'])) {
    unset($_SESSION['basket'][$_GET['id']]);
    header("location: basket.php");
}
?>
