<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
<?php
//Kiem tra email co hop le hay ko
if (isset($_POST["btn_submit_rg"]))
{
    $name = addslashes( $_POST['name'] );
    $email = addslashes( $_POST['email'] );
    $password = md5(addslashes( $_POST['password'] ));
    $verify_password = md5(addslashes( $_POST['verify_password'] ));
    // Kiểm tra thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $name || ! $email || ! $_POST['password'] || ! $_POST['verify_password'])
    {
        echo "<div class='text-center'>Please fill full form. <a href='javascript:history.go(-1)' style='text-align:center;'><br>Press here to getback.</a></div>";
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
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        print "<div class='logo'>Password is not match. Please type again. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
        exit;
    }

    // Tiến hành tạo tài khoản
    $str= "insert into user(name,email,password) values ('$name','$email','$password')";
    // thực thi câu $sql với biến conn lấy từ file connection.php    // Thông báo hoàn tất việc tạo tài khoản
    mysqli_query($conn,$str);
    if ($str)
    {
                print "<div class='logo'>Account $email is created.</div>";
                header('Location:register.php');
    }
    else
    {
      print "<div class='logo'>Error, please contact to the admin. <a href='javascript:history.go(-1)'>Press here to getback.</a></div>";
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
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form action="register.php" method="post">
                          <fieldset>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password">Verify Password</label>
                                <input type="password" class="form-control" id="password" name="verify_password">
                            </div>
                            <div class="text-center">
                                <input name="btn_submit_rg" class="btn btn-danger" value="Register" type="submit">
                            </div>
                          </fieldset>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>
                        <hr>
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <input name="btn_submit" class="btn btn-danger" value="Log in" type="submit">
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
