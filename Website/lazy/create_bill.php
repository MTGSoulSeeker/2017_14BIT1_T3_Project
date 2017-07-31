<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
<?php
  $temp_str2 = "select id from delivery_info order by id desc limit 1";
  $result2 = mysqli_query($conn,$temp_str2);
  $row2 = mysqli_fetch_row($result2);
  $delivery_id = $row2[0]+1;
  $str2= "insert into delivery_info(id,id_user,fname,lname,company,street,ward,zip,city,country,phone,coemail,delivery,payment)
  values ('$delivery_id','$_SESSION[Customer_ID]','$_SESSION[fname]','$_SESSION[lname]','$_SESSION[company]','$_SESSION[street]','$_SESSION[ward]',
  '$_SESSION[zip]','$_SESSION[city]','$_SESSION[country]','$_SESSION[phone]','$_SESSION[coemail]','$_SESSION[delivery]','$_SESSION[payment]')";
  // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
  mysqli_query($conn,$str2);
?>
<?php
  //Tạo hóa đơn -> lấy id
  $temp_str = "select id from bill order by id desc limit 1";
  $result = mysqli_query($conn,$temp_str);
  $row = mysqli_fetch_row($result);
  $bill_id = $row[0]+1;

  $sum = 0;
  $bill_date=date("Y/m/d");
  if (isset($_SESSION['basket']))
  {
    foreach ($_SESSION['basket'] as $id => $sl)
    {
      $sqli = "select * from product where id = $id";
      $rs = mysqli_query($conn,$sqli);
      $data= mysqli_fetch_array($rs);
      if($data['status']==1)
      {
        $price=$data['price']*(1-$data['sale_percent']);
      }
      else
      {
        $price=$data['price'];
      }
      $temp_sum=$price*$sl;
      $sum+=$price*$sl;
      // Tiến hành tạo tài khoản
      $str= "insert into bill_detail(id,product_id,quantity,sum) values ('$bill_id','$id','$sl','$temp_sum')";
      // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
      mysqli_query($conn,$str);
    }
    $str3= "insert into bill (`id`, `id_delivery`, `bill_date`, `price`) VALUES ('$bill_id','$delivery_id','$bill_date','$sum')";
    mysqli_query($conn,$str3);
    unset($_SESSION['basket']);
  }

  if ($sum>0)
  {
    echo "<div class='col-md-offset-5'> Success <br>";
    echo "<a class='col-md-offset-5' href='index.php'>Back to Homepage</a></div>";
  }
  else
  echo "<div class='col-md-offset-5'> Success</div>";
?>
<?php
    include "includes/footer.php";
?>
