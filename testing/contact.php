<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
	<!-- Contact -->
	<div class="w3aitscontactagile">
		<h1>CONTACT</h1>

		<div class="contact-info">
			<div class="container">
				<div class="contact-info-grids">
					<div class="col-md-6 col-sm-6 contact-info-grid contact-info-grid-1">
						<img src="images/store.jpg" alt="Groovy Apparel">
					</div>
					<div class="col-md-6 col-sm-6 contact-info-grid contact-info-grid-2">
						<h2>Where We Are</h2>
						<p>Come visit one of our two locations at ITEC or AUT in New Zealand. Explore our collection of world-changing products, like clothes made in Italy and France, plus collections from brands we partner with. Every purchase makes a difference! You can even see your impact in action and preview with our virtual reality goggles.
.</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>



	<!-- Map -->
		<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCGZMmeVScqZ0OLw3GxedBDchhgmaWxfTo
    &q=University+of+Science,+Downtown+Campus" allowfullscreen>
</iframe>
	<!-- //Map -->



	<div class="wthreeaddressaits">
		<div class="container">
			<div class="col-md-4 wthreeaddressaits-grid wthreeaddressaits-grid1">
				<div class="aitsaddressw3l">
					<h4>Address</h4>
					<address>
						<ul>
							<li>Studio 40019</li>
							<li>Parma Via Modena</li>
							<li>Sant'Agata Bolognese</li>
							<li>BO, Italy</li>
						</ul>
					</address>
				</div>
				<div class="aitsphonew3l">
					<h4>Phone</h4>
					<ul>
						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +1 (734) 123-4567</li>
						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +1 (739) 648-7114</li>
					</ul>
				</div>
				<div class="aitsemailw3l">
					<h4>Email</h4>
					<ul>
						<li><a href="mailto:mail@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> info1@example.com</a></li>
						<li><a href="mailto:mail@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> info2@example.com</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="col-md-8 wthreeaddressaits-grid wthreeaddressaits-grid2">
				<form action="#" method="post">
					<input type="text" class="text" name="Name" placeholder="Name" required="">
					<input type="text" class="text" name="Email" placeholder="Email" required="">
					<input type="text" class="text" name="Phone" placeholder="Phone" required="">
					<input type="text" class="text" name="City" placeholder="City" required="">
					<textarea name="Message" class="text" placeholder="Message" required=""></textarea>
					<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //Contact -->


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


					<!-- Map-JavaScript -->

<?php
	include "includes/footer.php";
 ?>
