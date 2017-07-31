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
?>

  <div id="page-wrapper">
<!-- /.col-lg-4 -->
    <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-primary profile">
              <?php
                echo"<div class='panel-heading text-center' style='font-size:30px;'>
                    User Profile
                </div>
                <div class='col-lg-6 panel-body text-center' style='font-size:30px;'>
                    <p>Username: $data[username]
                    <br>Name: $data[name]
                    <br>Telephone: $data[telephone]
                    <br>Birthday: $data[birthday]
                    <br>Email: 	$data[email]
                    </p>
                </div>
								<div class='col-lg-6 panel-body text-center'>
                    <p><img src='../image/avatar/$data[avatar]' alt='' class='img-rounded' height=450px width=300px>
                    </p>
                </div>";
            ?>
          </div>
          <div class="col-lg-12 text-center">
            <a href="#" class="btn btn-primary btn-lg">Print</a>
            <a href="changeprofile.php" class="btn btn-primary btn-lg">Change</a>
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
