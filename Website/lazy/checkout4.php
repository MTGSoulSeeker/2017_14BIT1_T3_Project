<?php
  include "includes/header.php";
  include "includes/navbar.php";
  $_SESSION['payment'] = $_POST['payment'];
?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                      <?php
                      	if(!isset($_SESSION['basket']))
                      		header("location:category.php");
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
                        <form method="post" action="create_bill.php">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.php"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.php"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                              <div class="box text-center">
                                  <div class="content">
                                      <h3 class="text-uppercase">Order Information</h3>
                                      <p class="lead">Please check again before Proceed</p>
                                      <p style="font-size:20px" class="col-md-offset-4 text-left">
                                        <?php
                                        echo "First name:".$_SESSION['fname']."<br>
                                              Lastname:".$_SESSION['lname']."<br>
                                              Ward:".$_SESSION['ward']."<br>
                                              Street:".$_SESSION['street']."<br>
                                              City:".$_SESSION['city']."<br>
                                              ZIP:".$_SESSION['zip']."<br>
                                              Country:".$_SESSION['country']."<br>
                                              Company:".$_SESSION['company']."<br>
                                              Telephone:".$_SESSION['phone']."<br>
                                              Email:".$_SESSION['coemail']."<br>
                                              Delivery:".$_SESSION['delivery']."<br>
                                              Payment:".$_SESSION['payment']."<br>
                                              ";
                                        ?>
                                      </p>
                                  </div>
                              </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
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
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-danger">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


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

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php
  include "includes/footer.php";
?>
