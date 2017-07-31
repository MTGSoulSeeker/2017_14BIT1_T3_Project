<?php
if(isset($_POST['ok_upload']))
{
	$num=$_GET['file'];
  $id=$_GET['cid'];
  require_once("connection.php");
	for($i=0; $i< $num; $i++)
	{
		move_uploaded_file($_FILES['img']['tmp_name'][$i],"../image/product/".$_FILES['img']['name'][$i]);
		$url="../image/product/".$_FILES['img']['name'][$i];
		$name=$_FILES['img']['name'][$i];
		echo "Upload Thanh cong file <b>$name</b><br />";
		echo "<img src='$url' width='120' /><br />";
    $str= "insert into product_img(product_id,img) values ('$id','$name')";
    mysqli_query($conn,$str);
	}
	header('Location: list_product.php');
}
?>
