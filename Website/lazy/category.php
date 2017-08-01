<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
<?php
  $page = $_GET["page"];
  $start = 6 * ($page - 1);
  $rows = 6;
?>
    <div id="all">
        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Men</li>
                    </ul>
                </div>

                <?php include "includes/left_menu.php"; ?>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Man</h1>
                        <p>In our department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong><?php echo $start+1; ?></strong> of <strong><?php echo $start+$rows; ?></strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-danger">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">
<?php
        $sqli = "select * from product order by id desc LIMIT $start, $rows";
        $rs = mysqli_query($conn,$sqli);
        while ($data = mysqli_fetch_array($rs))
        {
          $sqli2 = "select * from product_img where product_id=$data[id] LIMIT $start, $rows";
          $rs2 = mysqli_query($conn,$sqli2);
          $data2 = mysqli_fetch_array($rs2);
          echo"<div class='col-md-4 col-sm-6'>
              <div class='product'>
                  <div class='flip-container'>
                      <div class='flipper'>
                          <div class='front'>
                              <a href='detail.php?cid=$data[id]'>
                                  <img src='../../lazy-admin/image/product/$data2[img]' alt='' class='img-responsive'>
                              </a>
                          </div>
                          <div class='back'>
                              <a href='detail.php?cid=$data[id]'>
                                  <img src='../../lazy-admin/image/product/$data2[img]' alt='' class='img-responsive'>
                              </a>
                          </div>
                      </div>
                  </div>
                  <a href='detail.php?cid=$data[id]' class='invisible'>
                      <img src='img/product1.jpg' alt='' class='img-responsive'>
                  </a>
                  <div class='text'>
                      <h3><a href='detail.php'>$data[name]</a></h3>";
                      if($data['sale']==1)
                      {
                        $result=$data['price']*(1-$data['sale_percent']);
                        echo"<p class='price'><del>$$data[price]</del> $$result</p>";
                      }
                      else {
                        echo"<p class='price'>$$data[price]</p>";
                      }
                  echo"<p class='buttons'>
                          <a href='detail.php?cid=$data[id]' class='btn btn-default'>View detail</a>
                          <a href='add_basket.php?id=$data[id]' class='btn btn-danger'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                      </p>
                  </div>
                  <!-- /.text -->";
          if ($data['status']==1)
          {
          echo"  <div class='ribbon sale'>
                      <div class='theribbon'>SALE</div>
                      <div class='ribbon-background'></div>
                  </div>
                  <!-- /.ribbon -->";
          }
          if ($data['status']==2)
          {
          echo"  <div class='ribbon new'>
              <div class='theribbon'>NEW</div>
              <div class='ribbon-background'></div>
          </div>
          <!-- /.ribbon -->";
          }
          if ($data['status']==3)
          {
          echo"  <div class='ribbon gift'>
              <div class='theribbon'>GIFT</div>
              <div class='ribbon-background'></div>
          </div>
          <!-- /.ribbon -->";
          }
          echo"    </div>
              <!-- /.product -->
          </div>";
        }
 ?>




                </div>
                <!-- /.col-md-9 -->
                <div class="pages">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <?php
                          $sqli3 = "select count(id) as total from product";
                          $rs3 = mysqli_query($conn,$sqli3);
                          $data3 = mysqli_fetch_assoc($rs3);
                          $count = 1;
                          $temp = ($data3['total'] / 6) + 1;
                          while ($count <= $temp)
                          {
                            if ($count == $page)
                            {
                              echo "<li class='active'>
                                      <a href='category.php?page=$count'>$count</a>
                                    </li>";
                            }
                            else {
                              echo "<li>
                                      <a href='category.php?page=$count'>$count</a>
                                    </li>";
                            }
                            $count++;
                          }
                        ?>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php
    include "includes/footer.php";
?>
