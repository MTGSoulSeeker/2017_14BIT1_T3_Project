<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
<?php
$bill_date=date("Y-m-d");
echo $bill_date;
$str3= "insert into bill (`id`, `id_delivery`, `bill_date`, `price`) VALUES ('2', '123', '$bill_date', '4123')";
mysqli_query($conn,$str3);
?>
<form class="" action="testing" method="post">
  <button type="submit" class="btn btn-danger" formaction="testing.php" >Proceed to checkout <i class="fa fa-chevron-right"></i>
</form>
