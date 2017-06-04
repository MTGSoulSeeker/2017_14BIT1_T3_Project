<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<?php
  $id=$_GET['cid'];
  $str="select * from movies where id='$id'";
  $result = mysqli_query($conn,$str);
  $data=mysqli_fetch_assoc($result);
?>
<!-- end header -->
<div id="container">
  <div class="content">
    <div id="command"><a class="lightSwitcher" href="#">Lights</a></div>
    <div id="movie">
      <iframe <?php echo "src='$data[trailer]'"; ?> width="960" height="540" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div>
  </div>
  <div style="clear:both"></div>
  <?php
  $date1 = $data['timeschedule'];
  $date1 = strtotime($date1);
  $date1 = strtotime("+14 day", $date1);
  $data1['timeschedule'] = strtotime("+7 day");
  echo "<div class='one-half text-center'>
    <h2>$data[name]</h2>
    <p>Release Date: From $data[timeschedule] to ";
  echo date('Y-m-d', $date1);
  echo"<br>Genres: $data[category]
      <br>Actor: $data[actor]
      <br>Director: $data[director]
      <br>Time: $data[time]</p>
      <a href='movie_running.php?cid=$data[id]' class='btn btn-warning'>Ticket</a>
      <a href='#' class='btn btn-warning'>Comment</a>
  </div>
  <div class='one-half last'>
    <h2>Detail</h2>
    <p>$data[detail]</p>
  </div>";
   ?>
</div>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
