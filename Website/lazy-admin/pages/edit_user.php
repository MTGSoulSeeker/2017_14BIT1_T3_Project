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
$id=$_GET['cid'];
$str2="select * from user where id='$id'";
$resul2 = mysqli_query($conn,$str2);
$dt=mysqli_fetch_assoc($resul2);

$sql = "select * from admin where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
include '../includes/navbar.php';

if (isset($_POST["btn_submit"]))
{
      $names = addslashes( $_POST['names'] );
      $email = addslashes( $_POST['email'] );
      $telephone= addslashes( $_POST['telephone'] );
      $birthday = addslashes( $_POST['birthday'] );
      $address = addslashes( $_POST['address'] );
      $avatar= $_FILES["file"]["name"];
       // Tiến hành tạo tài khoản
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
									 $path = "../../Template-03/img/avatar/";
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
			else
			{
					 echo "<script type='text/javascript'>alert('Please choose file')</script>";
			}

			if($_FILES['file']['name'] != NULL)
			{
				$str= "update user set name = '$names',email = '$email',telephone = '$telephone',birthday = '$birthday',address ='$address',avatar = '$avatar' where id = '$id' limit 1";
			}
			else {
				$str= "update user set name = '$names',email = '$email',telephone = '$telephone',birthday = '$birthday',address ='$address' where id = '$id' limit 1";
			}
       // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
       mysqli_query($conn,$str);
       if ($str){
         print "<div class='noti'>User $names has changed. <a href='listuser.php'>Press here to go back.</a></div>";
         exit();
       }
       else{
         print "<div class='noti'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
         exit();
       }
}
?>
  <div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User: <?php echo "$dt[name]";?></h1>
    </div>
    <div class="panel-body">
        <div class="row">
          <form role="form" action="edit_user.php?cid=<?php echo "$dt[id]";?>" method="POST"  enctype="multipart/form-data">
            <div class="col-lg-8">
                <div class="form-group">
                  <label>Name</label>
                    <input class="form-control" name="names" type="names" value="<?php echo "$dt[name]";?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                    <input class="form-control"  name="email" type="email" value="<?php echo "$dt[email]";?>">
                </div>
                <div class="form-group">
                  <label>Telehone</label>
                    <input class="form-control"  name="telephone" type="telephone" value="<?php echo "$dt[telephone]";?>">
                </div>
                <div class="form-group">
                  <label>Birthday</label>
                    <input class="form-control"  type="date" name="birthday" value="<?php echo "$dt[birthday]";?>">
                </div>
                <div class="form-group">
                  <label>Address</label>
                    <input class="form-control"  name="address" type="address" value="<?php echo "$dt[address]";?>">
                </div>
            </div>
            <div class="col-lg-4 text-center">
              <label>Avatar</label>
              <div class="form-group">
                <?php echo"<img src='../image/avatar/$dt[avatar]' alt='' class='img-rounded' width='65%'>" ?>
              </div>
              <input style="margin-left:25%;"type="file" name="file" />
              <br>
            </div>
            <input class="btn btn-primary btn-block" name="btn_submit" type="submit" value="Change">
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
