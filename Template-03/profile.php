<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<!-- end header -->
<h1 class="logo">Profile</h1>
<div id="container">
  <div class="content">
    <?php
    $username = $_SESSION['username'];
    $sql = "select * from user where username = '$username'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
    echo"<div class='one-half'>
            <h1>Information</h1>
            <p style='font-size:28px;'>
            <Name: $data[name]
            <br>Email: $data[email]
            <br>Telephone: $data[telephone]
            <br>Birthday: $data[birthday]
            <br>Address: $data[address]
            </p>
        </div>
        <div class='one-half last text-center'>
                <h2>Avatar</h2>
                <p>
                  <img src='img/avatar/$data[avatar]' alt='' class='img-rounded' width='55%'>
                </p>
        </div>";
    ?>
  </div>
</div>
<div id="container" class="text-center">
  <a href="profile-edit.php" class="btn btn-warning btn-lg">Edit</a>
  <a href="#" class="btn btn-warning btn-lg">Print</a>
  <a href="profile-order.php" class="btn btn-warning btn-lg">My Orders</a>
</div>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
