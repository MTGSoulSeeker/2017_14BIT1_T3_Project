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
				$name = addslashes( $_POST['name'] );
				$category = addslashes( $_POST['category'] );
				$detail = addslashes( $_POST['detail'] );
				$price = addslashes( $_POST['price'] );
				$sale = addslashes( $_POST['price'] );
				$sale_percent = addslashes( $_POST['sale_percent'] );
				$status = addslashes( $_POST['status'] );

				/*$image= $_FILES["file"]["name"];
       // Tiến hành tạo tài khoản
			 //Check file
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
                    $path = "../image/product/";
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
       }*/

       $str= "insert into product(name,category,detail,price,sale,sale_percent,status) values ('$name','$category','$detail','$price','$sale','$sale_percent','$status')";

      // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
       mysqli_query($conn,$str);
}
?>
  <div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Add Product</h1>
    </div>
    <div class="panel-body">
        <div class="row">
          <form role="form" action="new-product.php" method="POST">
            <div class="col-lg-8">
                <div class="form-group">
                  <label>Name</label>
                    <input class="form-control" name="name" type="name" value="">
                </div>
                <div class="form-group">
                  <label>Category</label>
                    <input class="form-control"  name="category" type="category" value="">
                </div>
                <div class="form-group">
                  <label>Detail</label>
                    <input class="form-control"  name="detail" type="detail" value="">
                </div>
                <div class="form-group">
                  <label>Price</label>
                    <input class="form-control"  type="price" name="price" value="">
                </div>
								<div class="form-group">
                  <label>Sale <i>(1 = Yes, 0 = No)</i></label>
                    <input class="form-control"  type="sale" name="sale" value="">
                </div>
								<div class="form-group">
                  <label>Sale Percent<i>(If Sale is Yes, Fill In [EX:0,2 = 20%]. Else, leave blank.)</i></label>
                    <input class="form-control"  type="sale_percent" name="sale_percent" value="">
                </div>
								<div class="form-group">
                  <label>Status <i>(1 = Sale, 2 = New, 3 = Gift. Else, leave blank.)</i></label>
                    <input class="form-control"  type="status" name="status" value="">
                </div>
            </div>
            <!--<div class="col-lg-4 text-center">
              <label>Image</label>
							<div class="form-group">
              </div>
							<input style="margin-left:18%;"type="file" name="file" />
            </div>-->
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
