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

if (isset($_POST["btn_submit"]))
{
				$names = addslashes( $_POST['names'] );
				$category = addslashes( $_POST['category'] );
				$detail = addslashes( $_POST['detail'] );
				$price = addslashes( $_POST['price'] );
				$sale = addslashes( $_POST['price'] );
				$sale_percent = addslashes( $_POST['sale_percent'] );
				$status = addslashes( $_POST['status'] );

				$str= "update product set name = '$names',category = '$category',detail = '$detail',price = '$price',sale = '$sale',sale_percent = '$sale_percent',status = '$status'
				where id ='$id' limit 1";
       // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
       mysqli_query($conn,$str);
       if ($str){
         print "<div class='noti'>Product $dt[name] has changed. <a href='list_product.php'>Press here to go back.</a></div>";
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
        <h1 class="page-header">Edit Product: <?php echo "$dt[name]";?></h1>
    </div>
    <div class="panel-body">
        <div class="row">
          <form role="form" action="edit_product.php?cid=<?php echo "$dt[id]";?>" method="POST">
            <div class="col-lg-8">
                <div class="form-group">
                  <label>Name</label>
                    <input class="form-control" name="names" type="names" value="<?php echo "$dt[name]";?>">
                </div>
                <div class="form-group">
                  <label>Category</label>
                    <input class="form-control"  name="category" type="category" value="<?php echo "$dt[category]";?>">
                </div>
								<div class="form-group">
                  <label>Detail</label>
                    <input class="form-control"  name="detail" type="detail" value="<?php echo "$dt[detail]";?>">
                </div>
								<div class="form-group">
                  <label>Price</label>
                    <input class="form-control"  name="price" type="price" value="<?php echo "$dt[price]";?>">
                </div>
								<div class="form-group">
                  <label>Sale <i>(1 = Yes, 0 = No)</i></label>
                    <input class="form-control"  type="sale" name="sale" value="<?php echo "$dt[sale]";?>">
                </div>
								<div class="form-group">
                  <label>Sale Percent<i>(If Sale is Yes, Fill In [EX:0,2 = 20%]. Else, leave blank.)</i></label>
                    <input class="form-control"  type="sale_percent" name="sale_percent" value="<?php echo "$dt[sale_percent]";?>">
                </div>
								<div class="form-group">
                  <label>Status <i>(1 = Sale, 2 = New, 3 = Gift. Else, leave blank.)</i></label>
                    <input class="form-control"  type="status" name="status" value="<?php echo "$dt[status]";?>">
                </div>
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
