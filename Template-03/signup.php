<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<?php
//Kiem tra email co hop le hay ko
if (isset($_POST["btn_submit"]))
{
    $username = addslashes( $_POST['username'] );
    $password = md5(addslashes( $_POST['password'] ));
    $verify_password = md5(addslashes( $_POST['verify_password'] ));
    $name = addslashes( $_POST['name'] );
    $email = addslashes( $_POST['email'] );
    $telephone= addslashes( $_POST['telephone'] );
    $birthday = addslashes( $_POST['birthday'] );
    $address = addslashes( $_POST['address'] );
    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $name || ! $email || ! $telephone || ! $birthday || ! $address)
    {
        echo "<div class='logo'>Please fill full form. <a href='javascript:history.go(-1)' style='text-align:center;'>Press here to getback.</a></div>";
        exit;
    }
    // Kiểm tra username nay co nguoi dung chua
    if ( mysqli_num_rows(mysqli_query($conn,"SELECT username FROM user WHERE username='$username'"))>0)
    {
        print "<div class='logo'>Username is not avalable. Please type the other username. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        print "<div class='logo'>Password is not match. Please type again. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    //Check Email
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        print "<div class='logo'>This Email is invalid. <a href='javascript:history.go(-1)'>Press here to getback.</a>";
        exit;
    }
    if ( mysqli_num_rows(mysqli_query($conn,"SELECT email FROM user WHERE email='$email'"))>0)
    {
        print "<div class='logo'>This Email is not avalable. Please type the other email. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }
    // Tiến hành tạo tài khoản
    $str= "insert into user(username,password,name,email,telephone,birthday,address) values
		('$username','$password','$name','$email','$telephone','$birthday','$address')";
    // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
    mysqli_query($conn,$str);
    if ($str)
    {
                print "<div class='logo'>Account $username is created.</div>";
                exit();
    }
    else
    {
      print "<div class='logo'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
      exit();
    }
}
?>
<!-- end header -->
<h1 class="logo">Register</h1>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Fill In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="signup.php" method="POST">
                            <fieldset>
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
                                <input class="form-control" placeholder="Name" name="name" type="name" value="">
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
                                <!-- Change this to a button or input when using this as a form-->
                                <input class="btn btn-lg btn-warning btn-block" name="btn_submit" type="submit" value="Sign Up">
                                <p class="text--center"><br>Already a member? <a href="login.php">Sign in now</a></p>
                            </fieldset>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
