<?php include '../includes/header.php'; ?>
<?php
  require_once("connection.php");
  if (isset($_POST["btn_submit"]))
  {
  // lấy thông tin người dùng
  $username = addslashes( $_POST['username'] );
  $password = md5(addslashes( $_POST['password'] ));
    if ($username == "" || $password =="") {
      echo "<script type='text/javascript'>alert('Do not leave Username or Password blank!')</script>";
    }else
    {
      $sql = "select * from admin where username = '$username' and password = '$password'";
      $query = mysqli_query($conn,$sql);
      $num_rows = mysqli_num_rows($query);
      $data = mysqli_fetch_assoc($query);
      if ($num_rows==0)
      {
      ?>
        <script type='text/javascript'>alert("Username or password isn't correct!")</script>
      <?php
    }else{
        echo "<script type='text/javascript'>alert('Success')</script>";
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../index.php');
      }
    }
  }
  ?>

<body>
      <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form-->
                                <input class="btn btn-lg btn-success btn-block" name="btn_submit" type="submit" value="Sign In">
                                <p class="text--center"><br>Not a member? <a href="signup.php">Sign up now</a></p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
