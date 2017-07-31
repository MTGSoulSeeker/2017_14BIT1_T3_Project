<?php
	include "../connection.php";
	$moviescode=$_POST['moviescode'];
	$str="select * from movies where name='$moviescode'";
	$rs=mysqli_query($conn,$str);
	echo "Select Date: ";
	echo "<select>";
	while($row=mysqli_fetch_array($rs))
	{
    echo "<option value ='".$row['id']."'>".$row['name']."</option>";
	}
	echo "</option>";
?>
