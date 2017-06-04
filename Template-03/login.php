<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<?php
if (isset($_POST["btn_submit"]))
  {
  // lấy thông tin người dùng
  $username = addslashes( $_POST['username'] );
  $password = md5(addslashes( $_POST['password'] ));
    if ($username == "" || $password =="") {
      echo "<script type='text/javascript'>alert('Do not leave Username or Password blank!')</script>";
    }else
    {
      $sql = "select * from user where username = '$username' and password = '$password'";
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
        $_SESSION['Customer_ID'] = $data['id'];
        header('Location: index.php');
      }
    }
  }
  ?>
  <!-- end header -->
  <h1 class="logo">Login</h1>
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
                              <input class="btn btn-lg btn-warning btn-block" name="btn_submit" type="submit" value="Sign In">
                              <p class="text--center"><br>Not a member? <a href="signup.php">Sign up now</a></p>
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
