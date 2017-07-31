<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Ladies</a>
                        </li>
                        <li><a href="#">Tops</a>
                        </li>
                        <li>White Blouse Armani</li>
                    </ul>

                </div>

<?php include "includes/left_menu.php"; ?>
<?php
      $id = $_GET['cid'];
      $sqli = "select * from product where id=$id";
      $sqli2 = "select * from product_img where product_id=$id";
      $rs = mysqli_query($conn,$sqli);
      $rs2 = mysqli_query($conn,$sqli2);
      $data = mysqli_fetch_array($rs);
      $data2 = mysqli_fetch_array($rs2);
      echo"         <div class='col-md-9'>
                    <div class='row' id='productMain'>
                        <div class='col-sm-6'>
                            <div id='mainImage'>
                                <img src='../../lazy-admin/image/product/$data2[img]' alt='' class='img-responsive'>
                            </div>
                            <div class='ribbon sale'>
                                <div class='theribbon'>SALE</div>
                                <div class='ribbon-background'></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class='ribbon new'>
                                <div class='theribbon'>NEW</div>
                                <div class='ribbon-background'></div>
                            </div>
                            <!-- /.ribbon -->";
?>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $data['name']; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price"><?php
                                if($data['sale']==1)
                                {
                                  $result=$data['price']*(1-$data['sale_percent']);
                                  echo"<del>$$data[price]</del> -> $$result";
                                }
                                else {
                                  echo"$$data[price]";
                                } ?></p>

                                <p class="text-center buttons">
                                    <a href="basket.php" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="basket.php" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                      <?php
                                      while ($data2 = mysqli_fetch_array($rs2))
                                      {
                                        echo "<div class='col-xs-4'>
                                            <a href='../../lazy-admin/image/product/$data2[img]' class='thumb' >
                                            <img src='../../lazy-admin/image/product/$data2[img]' alt='' class='img-responsive'>
                                            </a>
                                            </div>";
                                      }?>
                            </div>
                        </div>

                    </div>

<?php
      echo"              <div class='box' id='details'>
                         <p>

                            <h4>Product details</h4>
                            <p>$data[detail]</p>
                            <h4>Material & care</h4>
                            <p>$data[detail]</p>
                            <h4>Size & Fit</h4>
                            <p>$data[detail]</p>";
 ?>
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                        <?php $sqli3 = "select * from product order by RAND() limit 3";
                        $rs3 = mysqli_query($conn,$sqli3);
                        while ($data3 = mysqli_fetch_array($rs3))
                        {
                          $sqli4 = "select * from product_img where product_id= $data3[id]";
                          $rs4 = mysqli_query($conn,$sqli4);
                          $data4 = mysqli_fetch_array($rs4);
                          echo "<div class='col-md-3 col-sm-6'>
                                  <div class='product same-height'>
                                      <div class='flip-container'>
                                          <div class='flipper'>
                                              <div class='front'>
                                                  <a href='detail.php?cid=$data3[id]'>
                                                      <img src='../../lazy-admin/image/product/$data4[img]' alt='' class='img-responsive'>
                                                  </a>
                                              </div>
                                              <div class='back'>
                                                  <a href='detail.php?cid=$data3[id]'>
                                                      <img src='../../lazy-admin/image/product/$data4[img]' alt='' class='img-responsive'>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                      <a href='detail.php?cid=$data3[id]' class='invisible'>
                                          <img href='detail.php?cid=$data3[id]' src='../../lazy-admin/image/product/$data4[img]' alt='' class='img-responsive'>
                                      </a>
                                      <div class='text'>
                                          <h3>$data3[name]</h3>
                                          <p class='price'>$$data3[price]</p>
                                      </div>
                                  </div>
                                  <!-- /.product -->
                              </div>";
                        }
                        ?>


                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

<?php
    include "includes/footer.php";
?>
