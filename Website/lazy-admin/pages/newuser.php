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
$sql = "select * from admin where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
include '../includes/navbar.php';

if (isset($_POST["btn_submit"]))
{
    $username = addslashes( $_POST['username'] );
    $password = addslashes( $_POST['password'] );
    $verify_password = addslashes( $_POST['verify_password'] );
    $names = addslashes( $_POST['names'] );
    $telephone= addslashes( $_POST['telephone'] );
    $email = addslashes( $_POST['email'] );
    $birthday = addslashes( $_POST['birthday'] );
    $address = addslashes( $_POST['address'] );
    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $names || ! $telephone || ! $email || ! $birthday || ! $address)
    {
        echo "<div class='noti'>Please fill full form. <a href='javascript:history.go(-1)' style='text-align:center;'>Press here to getback.</a></div>";
        exit;
    }
    // Kiểm tra username nay co nguoi dung chua
    if ( mysqli_num_rows(mysqli_query($conn,"SELECT username FROM user WHERE username='$username'"))>0)
    {
        print "<div class='noti'>Username is not avalable. Please type the other username. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        print "<div class='noti'>This Email is invalid. <a href='javascript:history.go(-1)'>Press here to getback.</a>";
        exit;
    }
    if ( mysqli_num_rows(mysqli_query($conn,"SELECT email FROM user WHERE email='$email'"))>0)
    {
        print "<div class='noti'>This Email is not avalable. Please type the other email. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        print "<div class='noti'>Password is not match. Please type again. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    // Tiến hành tạo tài khoản
    $str= "insert into user(username,password,name,email,telephone,birthday,address) values
		('$username','$password','$names','$email','$telephone','$birthday','$address')";
    // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
    mysqli_query($conn,$str);
    if ($str)
    {
								print "<div class='noti'>Account $username is created. <a href='listuser.php'>Press here to go back.</a></div>";
                exit();
    }
    else
    {
      print "<div class='noti'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
      exit();
    }
}
?>
  <div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Add User</h1>
    </div>
    <div class="panel-body">
        <div class="row">
          <form role="form" action="newuser.php" method="POST"  enctype="multipart/form-data">
            <div class="col-lg-8">
							<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="username" autofocus>
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Verify Password" name="verify_password" type="password" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Name" name="names" type="names" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Email" name="email" type="email" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Telephone" name="telephone" type="telephone" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Birthday" type="date" name="birthday" value="">
							</div>
							<div class="form-group">
									<input class="form-control" placeholder="Address" name="address" type="address" value="">
							</div>
            </div>
            <div class="col-lg-4 text-center">
              <label>Avatar</label>
							<div class="form-group">
              </div>
							<input style="margin-left:18%;"type="file" name="file" />
            </div>
            <input class="btn btn-primary btn-block" name="btn_submit" type="submit" value="Add">
          </form>
        </div>
    </div>
  </div>
  <script>
  $(function(){
      var ulHeight = $('#page-wrapper').outerHeight();
      $('.profile').css("height",ulHeight);
  });
  </script>
	<?php include '../includes/footer.php';
	 ?>
