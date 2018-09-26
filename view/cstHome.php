<?php 
	if (isset($_SESSION['user'])) {
		$title = "Welcome ".$_SESSION['user'];
	}
	else{
		$title = "Welcome To Sepa2";
	}
	$master = "Test";
	// shoes
		include 'database.php';
		$query = "SELECT * FROM products ORDER BY id DESC";
		$products = $connect->query($query);
		$connect=null;

	include 'layouts/master.php';
?>

<?php function css(){ ?>
	<link rel="stylesheet" type="text/css" href="assets/css/styleHome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/carousell.css">
	<style type="text/css">
		body{
			height: 100vh;
		}
	</style>
<?php } ?>

<?php function nav() { include('layouts/navbar/mainNavbar.php'); } ?>

<?php function content() { ?>
	<div id="home">
		<div class="mainParallax">
			<img class="logo-home" src="assets/img/logo/logo-reverse.png">
		</div>
	</div>

	<div id="promo" class="container-subt">
		<div class="row break">
			<div class="col-md-6">
				<h2>Promo</h2>
				<div class="slideshow-container">
					<div class="mySlides fade">
						<img src="assets/img/promo/banner_1.jpg" class="slider-item">
					</div>

					<div class="mySlides fade">
						<img src="assets/img/promo/banner_2.jpg"  class="slider-item">
					</div>

					<div class="mySlides fade">
						<img src="assets/img/promo/banner_3.png" class="slider-item">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h2 class="text-center">Our Latest Shoes</h2>
				<div class="container-subt">
					<div class="row text-center">
						<i onclick="previous()" class="up"></i>
					</div>
					<?php $i=0; foreach ($GLOBALS['products'] as $key => $product) { 
						if ($i<5) {
							if ($key == 0) {
								echo "<div class='row prd-bst prd-active' id='".$key."'>";
							}
							else {echo "<div class='row prd-bst' id='".$key."'>";}
					?>
							<div class="col-6">
								<img style="width: 100%;" src="assets/img/products/<?php echo $product['product_img']; ?>">
							</div>
							<div class="col-6" style="margin-top: auto;">
								<div class="container-subt">
									<div class="row">
										<div class="col-12">
											<h3>
												<?php echo $product['product_name']; ?>
											</h3>
											<h4>Rp. <span class="price" id="price<?php echo $key; ?>"><?php echo $product['product_price']; ?></span> </h4>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<form action="product" method="POST">
												<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
												<input class="btn btn-confirm" type="submit" name="view" value="View Product" style="margin: 0;">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$i++;}
						else{break;}
						} 
					?>
					<div class="row text-center">
						<i onclick="next()" class="down"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="categories" class="text-center">
		<div class="row break">
			<div class="col-12">
				<h2>Caregories We Offer</h2>
			</div>
		</div>
		<div class="container-subt">
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="col-10"><h2>Genders</h2></div>
					</div>
					<div class="row">
						<div class="col-5"><h3>Male</h3></div>
						<div class="col-5"><h3>Female</h3></div>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-10"><h2>Shoes Type</h2></div>
					</div>
					<div class="row">
						<div class="col-3"><h3>Casual</h3></div>
						<div class="col-3"><h3>Sport</h3></div>
						<div class="col-3"><h3>Formal</h3></div>
						<div class="col-3"><h3>Flip Flops</h3></div>
						
					</div>
					<div class="row">
						<div class="col-md-3 col-sd-6"><h3>Wedges</h3></div>
						<div class="col-md-3 col-sd-6"><h3>Highheels</h3></div>
						<div class="col-md-3 col-sd-6"><h3>FlatShoes</h3></div>
						<div class="col-md-3 col-sd-6"><h3>Slip-On</h3></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="about">
		<div class="row break">
			<div class="col-12">
				<h2>Who Are We?</h2>
				<img class="logo-about" src="assets/img/logo/logo.png">
				<p class="text-center">
					Sepa2 is a shoes e-store that focusing on quality shoes,fast respond, low prices and accurate shipment.Sepa2 provide wide range of budget shoes to enchance your daily style, we provide both branded shoes and local shoes. In here you can find daily promotion and seasonal discount.
				</p>
			</div>
		</div>
	</div>
<?php } ?>

<?php function footer(){ include 'layouts/footer.php'; } ?>

<?php function js(){ ?>
		<script type="text/javascript" src="assets/js/carousell.js"></script>
		<script type="text/javascript" src="assets/js/home.js"></script>
<?php } ?>