<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username']))
{
	 header('Location:login.php');
}
include '../includes/header.php';
require_once("connection.php");
$username = $_SESSION['username'];
$sql = "select * from admin where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
include '../includes/navbar.php';
?>
<script language="javascript">
function edconfirm(){
	if(!window.confirm('Do you want to continue ?')){
		return false;
	}
}
function dconfirm(){
	if(!window.confirm('Do you want to delete ?')){
		return false;
	}
}
</script>
<?php
 $id = $_GET['cid'];
 $sqli = "select * from bill where id=$id";
 $rs = mysqli_query($conn,$sqli);
 $data = mysqli_fetch_array($rs)
?>
<div id="page-wrapper">

<div id="content">
            <div class="container">

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1><?php echo "Order #$data[id]" ?></h1>

                        <p class="lead"><?php echo "Order #$data[id]" ?> was placed on <strong><?php echo "Order $data[bill_date]" ?></strong> and is currently <strong>
                        <?php if ($data['status'] == 1)
                        {
                          echo"Being prepared";
                        }
                        if ($data['status'] == 0)
                        {
                          echo"Cancelled";
                        }
                        if ($data['status'] == 2)
                        {
                          echo"Received";
                        } ?></strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table" width="100%">
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
                                <tbody>
                                  <?php
                                  $sqli_temp = "select * from bill where id=$id";
                                  $rs_temp = mysqli_query($conn,$sqli_temp);
                                  $data_temp = mysqli_fetch_array($rs_temp);
                                  $sqli2 = "select * from bill_detail where id=$data_temp[id]";
                                  $rs2 = mysqli_query($conn,$sqli2);

                                  $sqli3 = "select * from delivery_info where id=$data_temp[id_delivery]";
                                  $rs3 = mysqli_query($conn,$sqli3);
                                  $data3 = mysqli_fetch_array($rs3);
                                  while ($data2 = mysqli_fetch_array($rs2))
                                 {

                                  $sqli4 = "select * from product where id=$data2[product_id]";
                                  $rs4 = mysqli_query($conn,$sqli4);
                                  $data4 = mysqli_fetch_array($rs4);

                                  $sqli5 = "select * from product_img where product_id=$data4[id]";
                                  $rs5 = mysqli_query($conn,$sqli5);
                                  $data5 = mysqli_fetch_array($rs5);
                                  echo "<tr>
                                          <td>
                                              <a href='#'>
                                                  <img src='../../lazy-admin/image/product/$data5[img]' style='max-height:10%;' alt=''>
                                              </a>
                                          </td>
                                          <td><a href='#'>$data4[name]</a>
                                          </td>
                                          <td>$data2[quantity]</td>
                                          <td>$$data4[price]</td>";
                                          if($data4['sale']==1)
                                          {
                                            $result=$data4['price']*$data4['sale_percent'];
                                            echo"<td>$$result</td>";
                                          }
                                          else {
                                            echo"<td>$0.00</td>";
                                          }
                                  echo  "<td>$$data2[sum]</td>
                                      </tr>";
                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Order subtotal</th>
                                        <th>$<?php echo $data['price']; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Shipping and handling</th>
                                        <th>$00.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Tax</th>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>$<?php echo $data['price']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                                <h2>Invoice address</h2>
                                <?php echo"<p>$data3[fname] $data3[lname]
                                    <br>$data3[street]
                                    <br>$data3[ward]
                                    <br>$data3[zip]
                                    <br>$data3[city]
                                    <br>$data3[country]</p>";
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h2>Shipping address</h2>
                                <?php echo"<p>$data3[fname] $data3[lname]
                                    <br>$data3[company]
                                    <br>$data3[phone]
                                    <br>$data3[coemail]
                                    <br>$data3[delivery]
                                    <br>$data3[payment]</p>";
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      </div>
  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="../vendor/metisMenu/metisMenu.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../dist/js/sb-admin-2.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });
  </script>
</body>
