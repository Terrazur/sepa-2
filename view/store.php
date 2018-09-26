<?php  
	$title = "Store"; 
	require('layouts/master.php');
?>

<?php function css(){ ?>
	<link rel="stylesheet" type="text/css" href="assets/css/styleStore.css">
<?php } ?>

<?php function nav(){require 'layouts/navbar/redirectNav.php';} ?>

<?php function content(){ ?>
	<br><br>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="row">
					<div class="col-11">
						<div class="form-group">
							<label class="form-label">Search By Name:</label>
							<input class="form-input" type="text" id="shoesName">
						</div>
					</div>
					<div class="col-1"></div>
				</div>
			</div>
			<div class="col-3">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label class="form-label">Search By Type:</label>
							<select class="form-input" name="product_type" id="product_type">
								<option value="all">All</option>
								<option value="casual">Casual</option>
								<option value="sport">Sport</option>
								<option value="formal">Formal</option>
								<option value="flipflop">Flip Flops</option>
								<option value="wedges">Wedges</option>
								<option value="highheels">Highheels</option>
								<option value="flatshoes">Flatshoes</option>
								<option value="slipon">Slip On</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="row">
					<div class="col-1"></div>
					<div class="col-11">
						<div class="form-group">
							<label class="form-label">Search By Gender</label>
							<select class="form-input" name="product_gender" id="product_gender">
								<option value="all">All</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<button onclick="test()">Search</button>
			</div>
		</div>
		<!-- strtolower($product['product_name']) -->
		<div class="row">
			<?php foreach ($GLOBALS['products'] as $key=>$product) { $nameClass = str_replace(' ', '', $product['product_name']); ?>
				<div class="col-3 text-center allType allGender fall <?php echo strtolower($product['product_name']).' '.$product['product_price'].' '.$product['product_gender'].' '.$product['product_type']?>">
					<div class="row">
						<div class="col-12 cont-img">
							<img class="prd" src="assets/img/products/<?php echo $product['product_img']; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-12" id="name<?php echo $i ?>">
							<?php echo $product['product_name'] ?>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Rp. <span class="price" id="price<?php echo $key; ?>"><?php echo $product['product_price']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<form action="product" method="POST">
								<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
								<input class="btn btn-confirm" type="submit" name="view" value="View Product">
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row text-center">
			<h2 class="text-error" id="error"></h2>
		</div>
	</div>
<?php } ?>

<?php function js(){ ?>
	<script type="text/javascript" src="assets/js/store.js"></script>
<?php } ?>