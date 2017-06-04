<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<?php
	//According to the POST to the Running_Movie_ID query seat information
	if (isset($_POST['Running_Movie_ID']))
	{
		//print_r($_POST);
		$Running_Movie_ID = $_POST['Running_Movie_ID'];
		$_SESSION['Running_Movie_ID'] = $_POST['Running_Movie_ID'];
		$sql = "select * from seat_on_sale where movie_running_id="
					.$Running_Movie_ID." order by row_num asc, col_num asc;";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("Seating failed: ".mysqli_error($conn));
		}
    echo "<h1 class='logo'>Please select your seat </h1>
      <div id='container' class='text-center'>";
		echo "<table cellspacing='8'style='margin-left:17%;'>";
		$count = 0; //Calculates the number of inputs td in a row
		while ($row = mysqli_fetch_array($result))
		{
			//New line
			if ($count == 0)
			{
				echo "<tr>";
				echo "<td>Row ".$row['row_num']."</td>";
			}
			//echo "Row_Num: ".$row['Row_Num']."&nbsp&nbsp";
			//echo "Collumn_Num: ".$row['Column_Num']."&nbsp&nbsp";
			if ($row['status'])
			{
				echo "<td width='20' bgcolor='red'>1";
			}
			else
			{
				echo "<td width='20' bgcolor='#1ec5e5'>0";
			}
			echo "</td>";
			$count++;
			//A line of output is completed
			if ($count == 12)
			{
				echo "</tr>";
				$count = 0;
			}
		}
		echo "</table>";
    echo "</div>";
		//Get your fare based on Running_Movie_ID
		$sql = "select Price from movie_running where moviesid=".$Running_Movie_ID;
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("Failed to query ticket information： ".mysqli_error($conn));
		}
		$row = mysqli_fetch_array($result);
		$_SESSION['Price'] = $row['Price'];
	}
	//According to the line number and column number of the GET, the reservation status of the seat is modified and the order is generated
	if (isset($_GET['row_num']) && isset($_GET['col_num']))
	{
		//First determine whether the user is logged on
		if (!isset($_SESSION['username']))
		{
			echo "<h3>You are not logged in, please go first<a href='login.php'>log in</a></h3>";
			exit();
		}

		//It is determined whether or not the action has been scheduled
		$sql = "select * from seat_on_sale where movie_running_id= '".$_SESSION['Running_Movie_ID']
					."' and row_num='".$_GET['row_num']."' and col_num='".$_GET['col_num']."'";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("Failed to modify seat reservation status: ".mysqli_error($conn));
		}
		if ($row = mysqli_fetch_array($result))
		{
			if ($row['status'] == 1)
			{
				echo "<h3>Ticket failed: The location has been booked</h3>";
				exit();
			}
			else
			{
				$_SESSION['Seat_ID'] = $row['id'];
			}
		}
		//Modify the predetermined state of the location
		$sql = "update seat_on_sale set status=1 where movie_running_id=".$_SESSION['Running_Movie_ID']
					." and row_num=".$_GET['row_num']." and col_num=".$_GET['col_num'];
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("Failed to modify seat reservation status: ".mysqli_error($conn));
		}
		echo "<h3>Scheduled success</h3>";
		//Generate order information
		$Customer_ID = $_SESSION['Customer_ID'];
		$Seat_ID     = $_SESSION['Seat_ID'];
		$Order_Date  = date("Y-m-d");
		echo "<h1>$Order_Date";
		$Price       = $_SESSION['Price'];
		$sql = "insert into user_order(userid,moviesid,roomid,seatid,date,total) values
					('$Customer_ID','$_SESSION[Running_Movie_ID]','$_SESSION[Room_ID]','$Seat_ID','$Order_Date','$Price')";
		$result = mysqli_query($conn,$sql);
		if (!$result)
		{
			die("Failed to generate order information: ".mysqli_error($conn));
		}
		echo "<h3>The order information was generated successfully</h3>";

		exit();
	}

?>
<div id="container" >
		<form action="" method="get" style="margin-left:30%;">
			Row number:
			<select name="row_num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			Column number:
			<select name="col_num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			&nbsp&nbsp
			<input type="submit" value="determine">
		</form>
  </div>
    <?php
      include "includes/footer.inc";
    ?>
