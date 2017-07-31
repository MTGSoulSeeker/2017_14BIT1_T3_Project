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
                        <li>My orders</li>
                    </ul>

                </div>

                <?php
                  include "includes/customer_menu.php";
                ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $id = $_SESSION['Customer_ID'];
                                    $sqli = "select * from bill where id_delivery in (select d.id from delivery_info d where d.id_user = $id)";
                                    $rs = mysqli_query($conn,$sqli);
                                    while ($data = mysqli_fetch_array($rs))
                                    {
                                      echo "<tr>
                                          <th>#$data[id]</th>
                                          <td>$data[bill_date]</td>
                                          <td>$ $data[price]</td>";
                                          if ($data['status'] == 1)
                                          {
                                            echo"<td><span class='label label-info'>Being prepared</span>
                                                </td>";
                                          }
                                          if ($data['status'] == 0)
                                          {
                                            echo"<td><span class='label label-danger'>Cancelled</span>
                                                </td>";
                                          }
                                          if ($data['status'] == 2)
                                          {
                                            echo"<td><span class='label label-success'>Received</span>
                                                </td>";
                                          }
                                      echo"<td><a href='customer-order.php?cid=$data[id]' class='btn btn-danger btn-sm'>View</a>
                                          </td>
                                      </tr>";
                                    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php
    include "includes/footer.php";
?>
