<?php
  include "includes/header.inc";
  include "includes/navbar.inc";
?>
<!-- end header -->
<h1 class="logo">Now Showing</h1>
<div id="portfolio">
  <ul id="filterable">
    <li class="first">
      <h5>Sort by:</h5>
    </li>
    <li class="current"><a class="all" href="#all">All</a></li>
    <li><a class="action" href="#action">Action</a></li>
    <li><a class="horror" href="#horror">Horror</a></li>
    <li><a class="adventure" href="#adventure">Aventure</a></li>
    <li><a class="comedy" href="#comedy">Comedy</a></li>
  </ul>
  <!--END filtering-nav-->
  <div class="portfolio-container" id="columns">
    <ul>
      <?php
      $sql = "select * from movies";
      $result = mysqli_query($conn,$sql);
      global $temp0;global $temp1;global $temp2;global $temp3;
      while ($data = mysqli_fetch_array($result))
      {
      if(strpos($data['category'],'Action')!==false){$temp0='action';}else{$temp0='';}
      if(strpos($data['category'],'Horror')!==false){$temp1='horror';}else {$temp1='';}
      if(strpos($data['category'],'Adventure')!==false){$temp2='adventure';}else {$temp2='';}
      if(strpos($data['category'],'Comedy')!==false){$temp3='comedy';}else {$temp3='';}
      echo"<li class='one-third $temp0 $temp1 $temp2 $temp3'>
          <p>
          <a title='' href='movie-detail.php?cid=$data[id]' data-rel='prettyPhoto'>
          <img src='img/movie/$data[image]' alt='' width='300' height='450' class='portfolio-img pretty-box'>
          </a> </p>
          <h4><a href='#'>";
      echo substr("$data[name]",0,20)."...";
      echo "</a></h4><p>";
      echo substr("$data[detail]",0,80)."...";
      echo "</p></li>";
      }
      ?>
    </ul>
  </div>
  <!--END portfolio-wrap-->
  <div style="clear:both"></div>
</div>
<!-- close container -->
<?php
  include "includes/footer.inc";
?>
