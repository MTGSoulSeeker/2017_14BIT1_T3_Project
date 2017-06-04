<div class="header">
  <div id="site_title"><a href="index.php"><img src="img/logo-0.png" alt=""></a></div>
  <!-- Dynamic Menu -->
  <ol id="menu" class="simple_menu simple_menu_css horizontal black_menu">

    <li><a href="index.php">Home</a></li>
    <li><a href="movies.php">Movies</a></li>
    <!-- <li><a href="schedule.php">Schedule</a></li>-->
    <li><a href="promote.php">Promote</a></li>
    <li><a href="contact.php">Contact</a></li>
    <?php
      if (isset($_SESSION['username']))
      {
        echo" <li class='last'><a href='#'>".$_SESSION['username']."</a>
                <ol>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a href='logout.php'>Logout</a></li>
                </ol>
              </li>";
      }
      else
      {
        echo" <li class='last'><a href='#'>Account</a>
                <ol>
                  <li><a href='login.php'>Login</a></li>
                  <li><a href='signup.php'>Register</a></li>
                </ol>
              </li>";
      }
      ?><!--
    <li><a href="#">Template</a>
  sub menu
    <ol>
      <li><a href="template-test/gallery.html">Gallery</a></li>
      <li><a href="template-test/fullscreen-gallery.html">Full Screen</a></li>
      <li><a href="template-test/news.html">News</a></li>
      <li><a href="columns.php">Columns</a></li>
      <li><a href="template-test/tabs.html">Tabs</a></li>
      <li class="last"><a href="photogrid.php">Photo Grid</a></li>
    </ol></li>-->
  </ol>
</div>
