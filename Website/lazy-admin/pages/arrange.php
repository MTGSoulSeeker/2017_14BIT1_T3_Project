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

<?php
	if (isset($_POST['movie']))
	{
		//According to the information submitted by admin row		print_r($_POST);
		$movie  = $_POST['movie'];
		$room   = $_POST['room'];
		$day		= $_POST['day'];
		$hour   = $_POST['hour'];
		$minute = $_POST['minute'];
		$price  = $_POST['price'];

		$sql = "insert into movie_running(moviesid,roomid,showtime,price) value(".$movie.",".$room.",'$day ".$hour.":".$minute.":00',".$price.");";
			echo "<br />".$sql;
			$result = mysqli_query($conn,$sql);
			if (!$result)
			{
				die("<H2> Failed </ h2>".mysqli_error($conn));
			}
			else
			{
				echo "<h2> Success </ h2>";
			}

			//Seats for this show
			$Running_Movie_ID = mysqli_insert_id($conn);
			for ($i = 1; $i <= 12; $i++)
			{
				for ($j = 1; $j <= 12; $j++)
				{
					$sql = "insert into seat_on_sale(movie_running_id, row_num, col_num) "
								."value(".$Running_Movie_ID.",".$i.",".$j.");";
					print "<div class='noti'>Successful</div>";
					$result = mysqli_query($conn,$sql);
					if (!$result)
					{
						die("Arrange Seat Failed".mysqli_error($conn));
					}
				}
			}
			exit();
		}
?>

<div id="page-wrapper">
<!-- /.col-lg-4 -->
<br>
  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary profile">
          <div class="panel-heading text-center" style="font-size:25px;">
              Create Schedule
          </div>
					<form action="" method="post">
          <div class="panel-body">
            <div class="row">
            <div class="col-lg-3">
              Select Movie:
              <select class="btn btn-primary btn-block" name="movie">
                <?php
                    $sql0 = "select id,name from movies;";
            				$result0 = mysqli_query($conn,$sql0);
            				if (!$result0)
            				{
            					echo "The query failed";
            				}
            				while ($row0 = mysqli_fetch_array($result0))
            				{
            					echo "<option value ='".$row0['id']."'>".$row0['name']."</option>";
            				}
                ?>
              </select>
            </div>
            <div class="col-lg-3">
                Select Room:
                <select class="btn btn-primary btn-block" name="room">
                  <?php
                      $sql1 = "select id,name from room;";
              				$result1 = mysqli_query($conn,$sql1);
              				if (!$result1)
              				{
              					echo "The query failed";
              				}
              				while ($row1 = mysqli_fetch_array($result1))
              				{
              					echo "<option value ='".$row1['id']."'>".$row1['name']."</option>";
              				}
                  ?>
                </select>
              </div>
              <div class="col-lg-3">
                Select Date:
								<div class="form-group">
										<input class="form-control" type="date" name="day" value="">
								</div>
                </div>
                <div class="col-lg-3">
                  <br>
                		<select name="hour" class="btn btn-primary btn-sm" >
                			<option value ="9">9</option>
                			<option value ="10">10</option>
                			<option value ="11">11</option>
                			<option value ="12">12</option>
                			<option value ="13">13</option>
                			<option value ="14">14</option>
                			<option value ="15">15</option>
                			<option value ="16">16</option>
                			<option value ="17">17</option>
                			<option value ="18">18</option>
                			<option value ="19">19</option>
                			<option value ="20">20</option>
                			<option value ="21">21</option>
                			<option value ="22">22</option>
                			<option value ="23">23</option>
                		</select>H
                		<select name="minute" class="btn btn-primary" >
                			<option value ="0">00</option>
                			<option value ="20">20</option>
                			<option value ="40">40</option>
                		</select>M
                		&nbsp&nbspPrice
                		<input type="text" name="price" style="width:50px" class="btn btn-primary" >
                </div>
            </div>
          </div>
					<div class="col-lg-12 text-center">
						<input class="btn btn-primary btn-lg" type="submit" value="Create">
	        </div>
					</form>
        </div>


  </div>
</div>
  <script>
  $(function(){
      var ulHeight = $('#page-wrapper').outerHeight();
      $('.profile').css("height",ulHeight);
  });
  </script>
	<?php include '../includes/footer.php';
	 ?>
