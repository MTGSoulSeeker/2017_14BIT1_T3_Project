<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<!-- end header -->
<?php
function get_Movie_Name_By_Seat_ID($Seat_ID)
{
  global $conn;
  $sql2 = "select movies.name from movies, movie_running, seat_on_sale
					where seat_on_sale.id=".$Seat_ID
						." and movie_running.id=seat_on_sale.movie_running_id"
						." and movies.id=movie_running.moviesid";
  $result2 = mysqli_query($conn,$sql2);
  if (!$result2)
  {
    die("Failed to query the movie name".mysqli_error($conn));
  }
  if ($row2 = mysqli_fetch_array($result2))
  {
    return $row2['name'];
  }

}

function get_Movie_ID_By_Seat_ID($Seat_ID)
{
  global $conn;
  $sql3 = "select movies.id, movie_running.id from movies, movie_running, seat_on_sale
        where seat_on_sale.id=".$Seat_ID
        ." and movie_running.id=seat_on_sale.movie_running_id"
        ." and movies.id=movie_running.moviesid";
  $result3 = mysqli_query($conn,$sql3);
  if (!$result3)
  {
    die("Query Movie_ID failed".mysqli_error($conn));
  }
  if ($row3 = mysqli_fetch_array($result3))
  {
    return $row3['id'];
  }

}
?>

    <h2 class="logo">My Order</h2>
      <div id="container" >
    <?php
      $sql = "select * from user_order where userid=".$_SESSION['Customer_ID'];
      $result = mysqli_query($conn,$sql);
      if (!$result)
      {
        die("Failed to query order information: ".mysqli_error($conn));
      }
      echo "<table border='1' style='margin-left:17%;'>";
      echo "<tr>";
      echo "<th>Order Number</th>";
      echo "<th>Movie</th>";
      echo "<th>Date</th>";
      echo "<th>Price</th>";
      echo "</tr>";
      while ($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".get_Movie_Name_By_Seat_ID($row['seatid'])."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['total']."</td>";
        echo "</tr>";
      }

      echo "</table>";
    ?>
  </div>
<script type="text/javascript">
function comment(Order_ID, Movie_ID)
{
  var content = prompt("How about this movie, talk about chanting","");
  location.href = "insert_comment.php?Order_ID=" + Order_ID + "&Movie_ID=" + Movie_ID + "&content=" + content;
}
</script>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
