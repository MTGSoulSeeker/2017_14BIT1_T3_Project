<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<!-- end header -->
<?php
$username = $_SESSION['username'];
$sql = "select avatar from user where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
if (isset($_POST["btn_submit"]))
{
        $names = addslashes( $_POST['names'] );
        $email = addslashes( $_POST['email'] );
        $telephone= addslashes( $_POST['telephone'] );
        $birthday = addslashes( $_POST['birthday'] );
        $address = addslashes( $_POST['address'] );
        $avatar= $_FILES["file"]["name"];

        //CHeck file
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
       else
       {
            echo "<script type='text/javascript'>alert('Please choose file')</script>";
       }
       // Tiến hành tạo tài khoản
       $str= "update user set name = '$names',email = '$email',telephone = '$telephone',birthday = '$birthday',address ='$address',avatar = '$avatar' where username = '$username' limit 1";
       // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
       mysqli_query($conn,$str);
       if ($str)
          print "<div class='logo'>Account {$username} has changed. <a href='profile.php'>Press here to go back.</a>";
       else
          print "<div class='logo'>Error, please contact to the admin.</a>";
}
?>
<h1 class="logo">Edit Profile</h1>
<div id="container">
  <div class="content">
    <div class="panel-body">
        <div class="row">
          <form role="form" action="profile-edit.php" method="POST" enctype="multipart/form-data">
            <div class="col-lg-8">
                <div class="form-group">
                  <label>Name</label>
                    <input class="form-control" name="names" type="names" value="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                    <input class="form-control"  name="email" type="email" value="">
                </div>
                <div class="form-group">
                  <label>Telehone</label>
                    <input class="form-control"  name="telephone" type="telephone" value="">
                </div>
                <div class="form-group">
                  <label>Birthday</label>
                    <input class="form-control"  type="date" name="birthday" value="">
                </div>
                <div class="form-group">
                  <label>Address</label>
                    <input class="form-control"  name="address" type="address" value="">
                </div>
            </div>
            <div class="col-lg-4 text-center">
              <label>Avatar</label>
              <div class="form-group">
                <?php echo"<img src='img/avatar/$data[avatar]' alt='' class='img-rounded' width='75%'>" ?>
              </div>
              <input style="margin-left:18%;"type="file" name="file" />
            </div>
            <input class="btn btn-primary btn-block" name="btn_submit" type="submit" value="Change">
          </form>
        </div>
    </div>
  </div>
</div>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
