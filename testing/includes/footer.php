
	<!-- Footer -->
	<div class="agileinfofooter">
		<div class="agileinfofooter-grids">

			<div class="col-md-6 agileinfofooter-grid agileinfofooter-grid1 text-center">
				<ul>
					<li><span style="font-size:20px; color: #c41228;">MEMBER</span></li>
					<li>PHẠM HUỲNH TRÍ MINH</li>
					<li>NGUYỄN BÌNH MINH</li>
					<li>NGUYỄN ANH QUÂN</li>
					<li>TRẦN NGỌC PHÚ</li>
					<li>NGUYỄN TRẦN BẢO LÂM</li>
				</ul>
			</div>

			<div class="col-md-6 agileinfofooter-grid agileinfofooter-grid3 text-center">
				<address>
					<ul>
						<li><a href="#"><span style="font-size:20px; color: #c41228;">Headquarter Building</span></a></li>
						<li>Building I, 11th floor</li>
						<li>University of Science</li>
						<li>225 Nguyen Van Cu St., District 5</li>
						<li>Ho Chi Minh city, Vietnam</li>
						<li><a class="mail" href="mailto:1459036@itec.hcmus.edu.vn">Email to Admin</a></li>
					</ul>
				</address>
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
	<!-- //Footer -->



	<!-- Copyright -->
	<div class="w3lscopyrightaits">
		<div class="col-md-8 w3lscopyrightaitsgrid w3lscopyrightaitsgrid1">
			<p>CS301 - Project Manager. All Rights Reserved | Based On <a href="http://w3layouts.com/" target="=_blank"> W3layouts </a></p>
		</div>
		<div class="col-md-4 w3lscopyrightaitsgrid w3lscopyrightaitsgrid2">
			<div class="agilesocialwthree">
				<ul class="social-icons">
					<li><a href="#" class="facebook w3ls" title="Go to Our Facebook Page"><i class="fa w3ls fa-facebook-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="twitter w3l" title="Go to Our Twitter Account"><i class="fa w3l fa-twitter-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="googleplus w3" title="Go to Our Google Plus Account"><i class="fa w3 fa-google-plus-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="instagram wthree" title="Go to Our Instagram Account"><i class="fa wthree fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#" class="youtube w3layouts" title="Go to Our Youtube Channel"><i class="fa w3layouts fa-youtube-square" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //Copyright -->



	<!-- Custom-JavaScript-File-Links -->

<!-- Default-JavaScript -->
<script src="js/jquery-2.2.3.js"></script>
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3l.render();

        w3l.cart.on('w3agile_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        		}
        	}
        });
    </script>
	<!-- //cart-js -->


		<!-- Header-Slider-JavaScript-Files -->
			<script type='text/javascript' src='js/jquery.easing.1.3.js'></script>
			<script type='text/javascript' src='js/fluid_dg.min.js'></script>
			<script>jQuery(document).ready(function(){
					jQuery(function(){
						jQuery('#fluid_dg_wrap_4').fluid_dg({
							height: 'auto',
							loader: 'bar',
							pagination: false,
							thumbnails: true,
							hover: false,
							opacityOnGrid: false,
							imagePath: '',
							time: 4000,
							transPeriod: 2000,
						});
					});
				})
			</script>
		<!-- //Header-Slider-JavaScript-Files -->

		<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');
						}
					);
				});
			</script>
		<!-- //Dropdown-Menu-JavaScript -->

		<!-- Pricing-Popup-Box-JavaScript -->
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
				});
			</script>
		<!-- //Pricing-Popup-Box-JavaScript -->

		<!-- Model-Slider-JavaScript-Files -->
			<script src="js/jquery.film_roll.js"></script>
			<script>
				(function() {
					jQuery(function() {
						this.film_rolls || (this.film_rolls = []);
						this.film_rolls['film_roll_1'] = new FilmRoll({
							container: '#film_roll_1',
							height: 560
						});
						return true;
					});
				}).call(this);
			</script>
		<!-- //Model-Slider-JavaScript-Files -->

	<!-- //Custom-JavaScript-File-Links -->



		<!-- Bootstrap-JavaScript --> <script src="js/bootstrap.js"></script>

		
			<!-- Shopping-Cart-JavaScript -->
				<script type='text/javascript' src="js/jquery.mycart.js"></script>
				<script type="text/javascript">
					$(function () {
						var goToCartIcon = function($addTocartBtn){
							var $cartIcon = $(".my-cart-icon");
							var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
							$addTocartBtn.prepend($image);
							var position = $cartIcon.position();
							$image.animate({
							top: position.top,
							left: position.left
							}, 500 , "linear", function() {
								$image.remove();
							});
						}
						$('.my-cart-btn').myCart({
							classCartIcon: 'my-cart-icon',
							classCartBadge: 'my-cart-badge',
							affixCartIcon: true,
							checkoutCart: function(products) {
								$.each(products, function(){
									console.log(this);
								});
							},
							clickOnAddToCart: function($addTocart){
								goToCartIcon($addTocart);
							},
							getDiscountPrice: function(products) {
								var total = 0;
								$.each(products, function(){
									total += this.quantity * this.price;
								});
								return total * 0.5;
							}
						});
					});
				</script>
			<!-- Shopping-Cart-JavaScript -->

			<!-- Popup-Box-JavaScript -->
				<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
				<script>
					$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
					});
				</script>
			<!-- //Popup-Box-JavaScript -->


</body>
<!-- //Body -->

</html>
