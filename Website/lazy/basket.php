
<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">
                      <?php
                      	if(!isset($_SESSION['basket']))
                      		header("location:category.php?page=1");
                      	else
                      	{
                      		$basket = $_SESSION['basket'];
                      		if (isset($_POST['update']) && count($basket) != "")
                      		{
                      			$quantity_cn = $_POST['quantity'];
                      			foreach ($quantity_cn as $id => $sl)
                      			{
                      				if ($sl == 0)
                      				{
                      					unset($_SESSION['basket'][$id]);
                      				}
                      				else
                      					if ($sl > 0 && is_numeric($sl))
                      					{
                      						$_SESSION['basket'][$id] = $sl;
                      					}
                      				header("location: " . $_SERVER['REQUEST_URI'] . "");
                      			}
                      		}
                      		if (count($basket)) {
                      		?>
                        <form method="POST">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                            				$sum = 0;
                            				foreach ($basket as $id => $sl) {
                            					$sqli = "select * from product where id = $id";
                                      $sqli2 = "select * from product_img where product_id = $id";
                                      $rs = mysqli_query($conn,$sqli);
                                      $rs2 = mysqli_query($conn,$sqli2);
                            					$data = mysqli_fetch_assoc($rs);
                                      $data2 = mysqli_fetch_assoc($rs2);
                            					?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                  <?php echo "<img src='../../lazy-admin/image/product/$data2[img]' >"; ?>
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $data['name'];?></a>
                                            </td>
                                            <td>
                                                <input name="quantity[<?php echo $id; ?>]" type="text" value="<?php echo $sl; ?>">
                                            </td>
                                            <td><?php echo $data['price']; ?></td>
                                            <td>$<?php
                                              if($data['sale']==1)
                                              {
                                                $rs=$data['price']*$data['sale_percent'];
                                                echo $rs;
                                              }
                                              else {
                                                echo"0.00";
                                              }?></td>
                                            <td>$<?php echo $rs=$sl * ($data['price']*(1-$data['sale_percent'])); ?></td>
                                            <td><a href="delete.php?id=<?php echo $data['id'];  ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                              					     $sum += $rs;}
                                         ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">$<?php echo $sum; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                            <?php
                            		}
                            }

                            ?>
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button name="update" type="submit" class="btn btn-default" value=""><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="submit" class="btn btn-danger" formaction="checkout1.php" >Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$456.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-danger" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php
      include "includes/footer.php";
?>
