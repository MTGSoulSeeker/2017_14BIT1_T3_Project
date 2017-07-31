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
$str2="select * from product where id='$id'";
$resul2 = mysqli_query($conn,$str2);
$dt=mysqli_fetch_assoc($resul2);

$sql = "select * from admin where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
include '../includes/navbar.php';
?>
  <div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Product: <?php echo "$dt[name]";?></h1>
    </div>
    <div class="panel-body">
        <div class="row">
          <form role="form" action="add_image.php?cid=<?php echo "$dt[id]";?>" method="POST">
            <div class="col-lg-offset-2 col-lg-6 text-center">
                <div class="form-group">
                  <label>Number of Images</label>
                    <input class="form-control" type="text" name="txtnum" value=""/>
                    <input class="btn btn-primary btn-block" type="submit" name="ok_num" value="Accept" />
                </div>
          </form>
          <?php
          if(isset($_POST['ok_num']))
          {
          	$num=$_POST['txtnum'];
          	echo "<hr/>";
          	echo "Please add $num file(s) to upload<br/>";
          	echo "<form action='upload.php?file=$num&cid=$id' method='post' enctype='multipart/form-data'>";
            echo "<div class='col-lg-offset-2 col-lg-8 text-center'>";
          	for($i=1; $i <= $num; $i++)
          	{
              echo "<div class='form-group'>
                <label>Image #$i</label>
                <input type='file' name='img[]' />
              </div>";
          	}
          	echo "<input type='submit' name='ok_upload' value='Upload' />";
            echo "</div>";
          	echo "</form>";
          }
          ?>
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
