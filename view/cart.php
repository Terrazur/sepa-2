<?php
	$title = "Your Cart";
	include 'layouts/master.php';
	
?>

<?php function nav(){ include 'layouts/navbar/redirectNav.php'; ; } ?>

<?php function css(){ ?>
	<style type="text/css">
		.footer{
			position: absolute;
			bottom: 0;
		}
	</style>
<?php } ?>

<?php function content(){ ?>
	<br>
	<br>
	<br>
	<div class="container text-center">
		<div class="row">
			<div class="col-10"></div>
			<div class="col-2">
				<form action="product" method="POST">
					<input class="btn btn-danger" type="submit" name="clearAll" value="Clear Cart">
				</form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-2">Image</div>
			<div class="col-2">Product Name</div>
			<div class="col-1">Quantity</div>
			<div class="col-1">Size</div>
			<div class="col-2">Price</div>
			<div class="col-2">Total Price</div>
			<div class="col-2">Action</div>
		</div>
		<hr>
		<?php 
			if (isset($_SESSION['cart'])) { 
				foreach ($_SESSION['cart'] as $key=>$value) {
					$prc = $_SESSION['cart'][$key][3];
					$qty = $_SESSION['cart'][$key][4];
					$total = $qty*$prc;
		?>
					<div class="row">
						<div class="col-2">
							<img src="assets/img/products/<?php echo $_SESSION['cart'][$key][1] ?>" style="width: 100%;">
						</div>
						<div class="col-2"><?php echo $_SESSION['cart'][$key][2]; ?></div>
						<div class="col-1"><?php echo $_SESSION['cart'][$key][4]; ?></div>
						<div class="col-1"><?php echo $_SESSION['cart'][$key][5]; ?></div>
						<div class="col-2">Rp. <span class="price" id="price<?php echo $key ?>"><?php echo $_SESSION['cart'][$key][3]; ?></span></div>
						<div class="col-2">Rp. <span class="total" id="total<?php echo $key ?>"><?php echo $total; ?></span></div>
						<div class="col-2">
							<form action="product" method="POST">
								<input class="btn btn-danger-2" type="submit" name="clear" value="Remove From Cart">
							</form>
						</div>
					</div>
					<hr>
		<?php 
				}
			} 
		?>
		<div class="row text-center">
			<h2>We Will Sent Your Shoes To Your Address Directly</h2>
			<br>
			<h2>Please Transfer The Set Amount To Account Number 412******* With Remaks of Your Email, and Your Item then Send it to Us! We Will Confirm Of Your Transfer in 24 hours</h2>
		</div>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-4">
				<div class="container-subt">
					<a class="btn btn-approve" href="store">Return Store</a>
				</div>
			</div>
			<div class="col-4">
				<div class="container-subt">
					<form action="product"  method="POST">
						<input class="btn btn-danger" type="submit" name="checkout" id="checkout" value="Check Out Now" style="width: 100%;">
					</form>
				</div>
			</div>
			<div class="col-2"></div>
		</div>

	</div>
<?php } ?>

<?php function footer(){ include 'layouts/footer.php'; } ?>