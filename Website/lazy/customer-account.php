<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
<?php
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['email']))
{
	 header('Location:index.php');
}
$email = $_SESSION['email'];
$id=$_SESSION['Customer_ID'];
$str="select * from user where id='$id'";
$result = mysqli_query($conn,$str);
$dt=mysqli_fetch_assoc($result);
//ci = change information
if (isset($_POST["btn_submit_ci"]))
{
        $names = addslashes( $_POST['names'] );
        $birthday = addslashes( $_POST['birthday'] );
        $address = addslashes( $_POST['address'] );
        $zip = addslashes( $_POST['zip'] );
        $country = addslashes( $_POST['country'] );
        $telephone = addslashes( $_POST['telephone'] );

				$image= $_FILES["file"]["name"];
			 if($_FILES['file']['name'] != NULL)
			 { // Đã chọn file
					 // Tiến hành code upload file
					 if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/gif")
					 {
					 // là file ảnh
					 // Tiến hành code upload
							 if($_FILES['file']['size'] > 5242880)
							 {
									 echo "Maximum 5mb";
							 }
							 else
							 {
									 // file hợp lệ, tiến hành upload
									 $path = "img/avatar/";
										// file sẽ lưu vào thư mục data
									 $tmp_name = $_FILES['file']['tmp_name'];
									 $name = $_FILES['file']['name'];
									 $type = $_FILES['file']['type'];
									 $size = $_FILES['file']['size'];
									 // Upload file
									 move_uploaded_file($tmp_name,$path.$name);
									 echo "<script type='text/javascript'>alert('File uploaded!')</script>";
							}
					 }
					 else
					 {
							// không phải file ảnh
							echo "<script type='text/javascript'>alert('ERROR')</script>";
					 }
			}
			if($_FILES['file']['name'] != NULL)
			{
        $str= "update user set name = '$names', birthday = '$birthday', address = '$address', zip = '$zip', country = '$country', telephone = '$telephone', avatar = '$image' where email = '$email' limit 1";
		  }
			else {
        $str= "update user set name = '$names', birthday = '$birthday', address = '$address', zip = '$zip', country = '$country', telephone = '$telephone' where email = '$email' limit 1";

			}
       // thực thi câu $sql với biến conn lấy từ file connection.php
       mysqli_query($conn,$str);
       if ($str){
         print "<div class='text-center'>User $dt[email] has changed. <a href='customer-account.php'>Press here to go back.</a></div>";
         exit();
       }
       else{
         print "<div class='text-center'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
         exit();
       }
}
//np = new password
if (isset($_POST["btn_submit_np"]))
{
        $old_password = md5(addslashes( $_POST['password_old'] ));
        $password_1 = md5(addslashes( $_POST['password_1'] ));
        $password_2 = md5(addslashes( $_POST['password_2'] ));

        $str= "update user set password = '$password_2' where email = '$email' limit 1";
        if ( $old_password != $dt['password'] )
        {
            print "<div class='text-center'>Old Password is not match. Please type again. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
            exit;
        }
        if ( $password_1 != $password_2 )
        {
            print "<div class='text-center'>New Password is not match. Please type again. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
            exit;
        }
       // thực thi câu $sql với biến conn lấy từ file connection.php
       mysqli_query($conn,$str);
       if ($str){
         print "<div class='text-center'>User $dt[email] has changed his/her password. <a href='customer-account.php'>Press here to go back.</a></div>";
         exit();
       }
       else{
         print "<div class='text-center'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
         exit();
       }
}
?>
<div id="all">

  <div id="content">
    <div class="container">

      <div class="col-md-12">

        <ul class="breadcrumb">
          <li><a href="#">Home</a>
          </li>
          <li>My account</li>
        </ul>

      </div>

      <?php
                  include "includes/customer_menu.php";
                ?>

        <div class="col-md-9">
          <div class="box">
            <h1>My account</h1>
            <p class="lead">Change your personal details or your password here.</p>
            <p class="text-muted">Please, be careful. It's maybe can unchange. </p>

            <h3>Change password</h3>
            <form action="customer-account.php" method="POST">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_old">Old password</label>
                    <input type="password" class="form-control" id="password_old" name="password_old">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_1">New password</label>
                    <input type="password" class="form-control" id="password_1" name="password_1">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password_2">Retype new password</label>
                    <input type="password" class="form-control" id="password_2" name="password_2">
                  </div>
                </div>
              </div>
              <!-- /.row -->
              <div class="col-sm-12 text-center">
                <input name="btn_submit_np" class="btn btn-danger" value="Save new password" type="submit">
              </div>
            </form>

            <hr>

            <h3>Personal details</h3>
            <div class="row">
            <form role="form" action="customer-account.php" method="POST" enctype="multipart/form-data">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="names">Name</label>
                    <input type="text" class="form-control" id="names" name="names" value="<?php echo "$dt[name]";?>">
                  </div>
                  <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo "$dt[birthday]";?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Adress</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo "$dt[address]";?>">
                  </div>
                  <div class="form-group">
                    <label for="zipy">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="<?php echo "$dt[zip]";?>">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo "$dt[country]";?>">
                  </div>
                  <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo "$dt[telephone]";?>">
                  </div>
                </div>
                <div class="col-sm-6 text-center">
                  <label>Avatar</label>
                  <div class="form-group">
                    <img <?php echo "src='img/avatar/$dt[avatar]'" ?> alt="" class="img-rounded" width="60%">
                  </div>
                  <input style="margin-left:20%;" type="file" name="file" />
                </div> <!-- /.row -->
                <div class="col-sm-12 text-center">
                  <input name="btn_submit_ci" class="btn btn-danger" value="Save changes" type="submit">
                </div>
              </div>
          </form>
          </div>
        </div>

    </div>
    <!-- /.container -->
  </div>
  <!-- /#content -->

<?php
      include "includes/footer.php";
?>
