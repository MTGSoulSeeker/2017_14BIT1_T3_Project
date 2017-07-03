<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h4>Members</h4>
                <ul>
                    <li><a href="#">Phạm Huỳnh Trí Minh - Project Manager</a>
                    </li>
                    <li><a href="#">Nguyễn Bình Minh - Database Designer</a>
                    </li>
                    <li><a href="#">Trần Nguyễn Bảo Lâm - Quality Assurance</a>
                    </li>
                    <li><a href="#">Nguyễn Anh Quân - Developer</a>
                    </li>
                    <li><a href="#">Trần Ngọc Phú - Designer</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-3 -->

          <!-- /.col-md-3 -->

            <div class="col-md-4 col-sm-6">
                <h4>Headquarter Building</h4>
                <p><strong>University of Science</strong>
                    <br>11th floor Building I
                    <br>225 Nguyen Van Cu St.
                    <br>District 5
                    <br>Ho Chi Minh city
                    <br>
                    <strong>Vietnam</strong>
                </p>

                <a href="contact.php">Go to contact page</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-4 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">Please subcribe Us to get the lastest news.</p>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

  <button class="btn btn-danger" type="button">Subscribe!</button>

</span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr>

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2017 Store T3 - What makes a man!</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">CS203 - Project Management</a>
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap-hover-dropdown.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/front.js"></script>



<script>
      function initMap() {
        var uluru = {lat: 10.762709, lng: 106.681849};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4eA669064nn-aLk776P9rnPywoJ6G4a0&callback=initMap"  type="text/javascript"></script>

</body>

</php>
