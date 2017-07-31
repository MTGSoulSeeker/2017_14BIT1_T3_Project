<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if (session_destroy())
{
   header('Location:index.php');
}
else
{
  echo"<div class='logo'>Logout unsuccessful, please contact to the admin.</div>";
}
?>
