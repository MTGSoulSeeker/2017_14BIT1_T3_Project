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
<?php
			if(isset($_POST['btn_delete']))
			{
				$id = $data['id'];
				$str= "delete from admin where id ='$id'";
        // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
        mysqli_query($conn,$str);
			}
?>
  <div id="page-wrapper">
<!-- /.col-lg-4 -->
    <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-primary profile">
              <?php
                echo"<div class='panel-heading'>
                    User Profile
                </div>
                <div class='panel-body'>
                    <p>$data[username]
                    <br>$data[name]
                    <br>$data[telephone]
                    <br>$data[birthday]
                    <br>$data[email]
										<br>$data[id]
                    </p>
                </div>";
            ?>
          </div>
          <div class="col-lg-12 text-center">
            <a href="editmovie.php" class="btn btn-primary btn-lg">Edit</a>
						<input class="btn btn-lg btn-primary" name="btn_delete" type="submit" value="Delete">
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
