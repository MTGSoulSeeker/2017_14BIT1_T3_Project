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
          <h1 class="page-header">List Of User</h1>
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
															<th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Telephone</th>
															<th>Birthday</th>
															<th>Address</th>
                              <th></th>
                          </tr>
                      </thead>

                      <?php
                      $sqli = "select * from user";
                      $rs = mysqli_query($conn,$sqli);
                      while ($dt = mysqli_fetch_array($rs)) {
                        echo"<tbody>
                          <tr class='gradeU'>
															<td>$dt[id]</td>
                              <td>$dt[name]</td>
                              <td>$dt[email]</td>
                              <td>$dt[telephone]</td>
															<td>$dt[birthday]</td>
                              <td>";
												echo substr("$dt[address]",0,20)."...";
												echo"</td>
															<td class='text-center'>
																<a class='btn btn-primary' href='edit_user.php?cid=$dt[id]' onclick='return edconfirm();'>Edit</a>
																<a class='btn btn-primary' href='delete_user.php?cid=$dt[id]' onclick='return dconfirm();'>Delete</a>
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
