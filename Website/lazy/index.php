<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                      <?php $sqli3 = "select * from product order by RAND() limit 8";
                      $rs3 = mysqli_query($conn,$sqli3);
                      while ($data3 = mysqli_fetch_array($rs3))
                      {
                        $sqli4 = "select * from product_img where product_id= $data3[id]";
                        $rs4 = mysqli_query($conn,$sqli4);
                        $data4 = mysqli_fetch_array($rs4);
                        echo "<div class='item'>
                                <div class='product'>
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
                                        <img src='../../lazy-admin/image/product/$data4[img]' alt='' class='img-responsive'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='detail.php?cid=$data3[id]'>$data3[name]</a></h3>
                                        <p class='price'>$$data3[price]</p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>";
                      }
                      ?>

                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
           <div class="box text-center" data-animate="fadeInUp">
               <div class="container">
                   <div class="col-md-12">
                       <h3 class="text-uppercase">From our blog</h3>

                       <p class="lead">What's new in the world of fashion? <a href="blog.php">Check our blog!</a>
                       </p>
                   </div>
               </div>
           </div>

            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired2.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired3.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.php">Fashion now</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.php" class="btn btn-danger">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.php">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.php" class="btn btn-danger">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->


<?php
  include "includes/footer.php";
 ?>
