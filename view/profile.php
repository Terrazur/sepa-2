<?php
	$title = 'Account Detail';
	include 'database.php';
	
	$query = "SELECT * FROM users where fullname = '".$_SESSION['user']."' ";
	$profile = $connect->query($query);
	foreach ($profile as $value) {
		$queryOrd = "SELECT * FROM orders where user_id = '".$value['id']."' ";
		$orders = $connect->query($queryOrd);
	}
	$connect = null;

	include 'layouts/master.php';
?>

<?php function nav(){ include 'layouts/navbar/redirectNav.php'; } ?>

<?php function css(){ ?>
	<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
<?php } ?>

<?php function content(){ ?>
	<br>
	<br><br>	
	<div class="container wrap">
		<div class="row">
			<div class="col-md-6">
				<div class="container-subt">
					<div class="row box">
						<div class="col-12 text-center">
							<h2>Your Profile, <?php echo $_SESSION['user'] ?></h2>
							<br>
						</div>
						<div class="row">
							<div class="col-4"></div>
							<div class="col-4 text-center">
								<a class="btn btn-confirm" href="edit">Edit Account</a>
							</div>
							<div class="col-4"></div>
						</div>
						<hr>
						<div class="col-12">
							<br>
							<?php foreach ($GLOBALS['profile'] as $key => $value) { ?>
								<div class="container">
									<div class="form-group">
										<label class="form-label">Your Name</label>
										<input class="form-input" type="" name="" value="<?php echo $value['fullName']; ?>" readonly>
									</div>
									<br>
									<div class="form-group">
										<label class="form-label">Your Email</label>
										<input class="form-input" type="" name="" value="<?php echo $value['email']; ?>" readonly>
									</div>
									<br>
									<div class="form-group">
										<label class="form-label">Your Address</label>
										<input class="form-input" type="" name="" value="<?php echo $value['addr']; ?>" readonly>
									</div>
								</div>
								<br>
								<hr>
								<br>
								<div class="container">
									<div class="text-center">
											<br>
										<?php if ($value['email_confirm'] == 'DENY'): ?>
											You Havent Verify Your Account Yet <br>
											<a href="mailConf">Click Here To Verify Now!</a>
											<?php else: ?>
												Your email Has Been Verified! You Can Now Buy From Our Store
										<?php endif ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container-subt">
					<div class="row box">
						<div class="container">
							<?php 
								if (isset($_SESSION['cart'])) {
							?>
							<div class="col-12 text-center">
								<h2>Your Cart</h2>
								<hr>
							</div>
							<div class="row text-center">
								<div class="col-4">Shoes Name</div>
								<div class="col-4">Quatity</div>
								<div class="col-4">Total</div>
							</div>
							<?php
									$final = 0;
									foreach ($_SESSION['cart'] as $key=>$value) {
										$prc = $_SESSION['cart'][$key][3];
										$qty = $_SESSION['cart'][$key][4];
										$total[$key] = $qty*$prc;
										$final += $total[$key];
							?>
								<br>
								<div class="row">
									<div class="col-4"><?php echo $_SESSION['cart'][$key][2]; ?></div>
									<div class="col-4"><?php echo $_SESSION['cart'][$key][4]; ?></div>
									<div class="col-4">Rp. <span class="total" id="total<?php echo $key ?>"><?php echo $total[$key]; ?></span></div>
								</div>
							<?php } ?>
									<hr>
									<div class="row">
										<div class="col-8">Total</div>
										<div class="col-4"><?php echo $final; ?></div>
									</div>
									<div class="row">
										<div class="col-4"></div>
										<div class="col-4 text-center">
											<a class="btn btn-approve" href="cart">Go To Cart</a>
										</div>
										<div class="col-4"></div>
									</div>
							<?php } else{ ?>
								<div class="row text-center"><h2>Your Cart Is Currently Empty</h2></div>
							<?php } ?>
						</div>
					</div>
					<br>
					<div class="row box text-center">
						<div class="col-12">
							<h2>Your Past Buy</h2>
							<hr>
						</div>
						<div class="col-12 ">
							<div class="container">
								<div class="row">
									<div class="col-4">Item's Name</div>
									<div class="col-4">Item's @ Price</div>
									<div class="col-4">Quantity Bought</div>
								</div>
								<?php foreach ($GLOBALS['orders'] as $key => $order) { ?>
									<div class="row">
										<div class="col-4">
											<?php echo $order['product_name']; ?>
										</div>
										<div class="col-4">Rp. <span class="price" id="price<?php echo $key; ?>"><?php echo $order['product_price']; ?></span></div>
										<div class="col-4"><?php echo $order['qty']; ?></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php function footer(){ include 'layouts/footer.php'; } ?>	