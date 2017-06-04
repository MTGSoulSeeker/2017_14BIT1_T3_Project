<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<h1 class="logo">Schedule</h1>
<div id="container">
  <div class="content text-center">
<?php
	if (isset($_GET['cid']))
	{
		$sql = "select * from movie_running where moviesid=".$_GET['cid'];
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("The query failed".mysqli_error($conn));
		}
		//Form
		echo "<form action='choose_seat.php' method='post'>";
		while ($row = mysqli_fetch_array($result))
		{
			$Running_Movie_ID = $row['id'];
			$Movie_ID         = $_GET['cid'];
			$Room_ID          = $row['roomid'];
			$Showtime 		  = $row['showtime'];
			$Price    		  = $row['price'];
      $_SESSION['Room_ID'] = $Room_ID;
      $str="select * from room where id='$Room_ID'";
      $result2 = mysqli_query($conn,$str);
      $data2=mysqli_fetch_assoc($result2);
      $str3="select * from movies where id='$Movie_ID'";
      $result3 = mysqli_query($conn,$str3);
      $data3=mysqli_fetch_assoc($result3);
			echo "<input type='radio' name='Running_Movie_ID' value='$Running_Movie_ID'>";
      echo "Movies: $data3[name]&nbsp&nbsp&nbsp&nbsp";
			echo "Room: $data2[name]&nbsp&nbsp&nbsp&nbsp";
			echo "Time: $Showtime&nbsp&nbsp&nbsp&nbsp";
			echo "Price: $Price&nbsp&nbsp";
			echo "<br />";
		}
		echo "<br />";
		echo "<input class='btn btn-warning'type='submit' value='Online seat selection'>";
		echo "</form>";
	}
?>
</div>
</div>
<?php
  include "includes/footer.inc";
?>
