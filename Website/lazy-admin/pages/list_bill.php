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

  <div id="page-wrapper">
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">List Of Bill</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  DataTables Advanced Tables
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                          <tr>
															<th>Order</th>
                              <th>Date</th>
                              <th>Total</th>
															<th>Status</th>
															<th>Action</th>
                          </tr>
                      </thead>
                      <?php
                      $sqli = "select * from bill";
                      $rs = mysqli_query($conn,$sqli);
                      while ($dt = mysqli_fetch_array($rs)) {
                        echo"<tbody>
                          <tr class='gradeU'>
															<td>#$dt[id]</td>
                              <td>$dt[bill_date]</td>
                              <td>$dt[price]</td>";
															if ($dt['status'] == 1)
                              {
                                    echo"<td><span class='label label-info'>Being prepared</span></td>";
                              }
                              if ($dt['status'] == 0)
                              {
                                    echo"<td><span class='label label-danger'>Cancelled</span></td>";
                              }
                              if ($dt['status'] == 2)
                              {
                                    echo"<td><span class='label label-success'>Received</span></td>";
                              }
												echo" <td class='text-center'>
																<a class='btn btn-success' href='change_status.php?cid=$dt[id]&status=2' onclick='return edconfirm();'>Received</a>
																<a class='btn btn-danger' href='change_status.php?cid=$dt[id]&status=0' onclick='return edconfirm();'>Cancel</a>
																<a class='btn btn-info' href='bill_detail.php?cid=$dt[id]' onclick='return edconfirm();'>Detail</a>
															</td>
                          </tr>
                          </tbody>";
                     }
                    ?>

                  <!-- /.table-responsive -->
                </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
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
