<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                <img src="img/logo.png" alt="T3 logo" class="hidden-xs">
                <img src="img/logo_small.png" alt="T3 logo" class="visible-xs"><span class="sr-only">T3 Store - Homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.php">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
              <li class="dropdown yamm-fw">
                  <a href="index.php" data-hover="dropdown" data-delay="200">Home</a>
              </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5>Clothing</h5>
                                        <ul>
                                            <li><a href="category.php">T-shirts</a>
                                            </li>
                                            <li><a href="category.php">Shirts</a>
                                            </li>
                                            <li><a href="category.php">Pants</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Shoes</h5>
                                        <ul>
                                            <li><a href="category.php">Trainers</a>
                                            </li>
                                            <li><a href="category.php">Sandals</a>
                                            </li>
                                            <li><a href="category.php">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.php">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5>Accessories</h5>
                                        <ul>
                                            <li><a href="category.php">Trainers</a>
                                            </li>
                                            <li><a href="category.php">Sandals</a>
                                            </li>
                                            <li><a href="category.php">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.php">Casual</a>
                                            </li>
                                            <li><a href="category.php">Hiking shoes</a>
                                            </li>
                                            <li><a href="category.php">Casual</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="blog.php" data-hover="dropdown" data-delay="200">Blog</a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="contact.php" data-hover="dropdown" data-delay="200">STORE LOCATION</a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="faq.php" data-hover="dropdown" data-delay="200">FAQ</a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="contact.php" data-hover="dropdown" data-delay="200">CONTACT</a>
                </li>

                <li><a href="#" data-hover="dropdown" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="Login">Customer login</h4>
                            </div>
                            <div class="modal-body">
                                <form action="customer-orders.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email-modal" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password-modal" placeholder="password">
                                    </div>

                                    <p class="text-center">
                                        <button class="btn btn-danger"><i class="fa fa-sign-in"></i> Log in</button>
                                    </p>

                                </form>

                                <p class="text-center text-muted">Not registered yet?</p>
                                <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                            </div>
                        </div>
                    </div>
                </div>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="basket.php" class="btn btn-danger navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-danger" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

  <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>

    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
