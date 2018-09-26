<?php
	$title = "Sepa2 AdminPanel";
	include 'database.php';

	$query = "SELECT * FROM products WHERE id = '".$id."' ";
	$product = $connect->query($query);
	$connect = null;
	include 'view/layouts/master.php';
?>

<?php function nav(){ include 'layouts/navbar/adminNav.php'; } ?>

<?php function content(){ ?>
	<!-- <div style="width: 10%;">
		<ul class="navbar navbar-black" style="width: 10%; height: 100vh;">
			<li class="nav-item"><a class="item" href="addProduct">Insert Product</a></li>
		</ul>
	</div> -->
	
	<div class="break">
		<div style="width: 10%; display: inline-block;"></div>
		<div style="width: 80%; display: inline-block;">
			<div>
				<h1 class="panel-header">Add Product</h1>
			</div>
			<?php foreach ($GLOBALS['product'] as $key => $value): ?>
				<form enctype="multipart/form-data" action="productAdmin" method="POST">
					<input type="hidden" name="imgPrev" value="<?php echo $value['product_img'] ?>">
					<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
					<div class="form-group">
						<label class="form-label" for="product_name">Product Name</label>
						<input class="form-input" type="text" name="product_name" id="product_name" value="<?php echo $value['product_name'] ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label for="product_name">Product Image</label>
						<br>
						<input class="form-input" type="file" name="product_picture" id="product_picture" accept="image/*" required>
					</div>
					<br>
					Previous Image <br>
					<img src="assets/img/products/<?php echo $value['product_img'] ?>">
					<br>
					<div class="form-group">
						<label class="form-label" for="product_price">Product Price</label>
						<input class="form-input" type="number" name="product_price" id="product_price" value="<?php echo $value['product_price'] ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="product_type">Product Type</label>
						<select class="form-input" name="product_type" id="product_type">
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
					<br>
					<div class="form-group">
						<label class="form-label" for="product_gender">Product Type</label>
						<select class="form-input" name="product_gender" id="product_gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="product_desc">Product Description</label>
						<textarea class="form-input" name="product_desc" id="product_desc" required><?php echo $value['product_desc'] ?></textarea>
					</div>
					<br>
					<input type="submit" name="editPRD" value="Create Product">
				</form>
			<?php endforeach ?>
		</div>
	</div>
<?php } ?>