<?php
	$title = "Sepa2 AdminPanel";
	include 'view/layouts/master.php';

	
?>

<?php function nav(){ include 'layouts/navbar/adminNav.php'; } ?>

<?php function content(){ ?>
	<div>
		<ul class="navbar navbar-black" style="width: 10%; height: 100vh;">
			<li class="nav-item"><a class="item" href="javascript:void(0);">Welcome, <br><?php echo $_SESSION['user']; ?></a></li>
			<li class="nav-item"><a class="item" href="addProduct">Insert Product</a></li>
		</ul>
	</div>
	<div style="width: 10%; display: inline-block;"></div>
	<div class="break text-center" style="width: 80%; display: inline-block;">
		<div class="row">
			<div class="col-3">Name</div>
			<div class="col-3">Price</div>
			<div class="col-3">Description</div>
			<div class="col-3">Action</div>
		</div>
		<hr>
	<?php 
		include 'database.php';
		$query = "SELECT * FROM products ORDER BY product_name DESC";
		$products = $connect->query($query);
		$connect=null;
		foreach ($products as $key => $value) {
	?>
		<div class="row">
			<div class="col-3">
				<?php echo $value['product_name'] ?>
			</div>
			<div class="col-3">
				<?php echo $value['product_price'] ?>
			</div>
			<div class="col-3">
				<?php echo $value['product_desc'] ?>
			</div>
			<div class="col-3">
				<div class="row">
					<div class="col-6">
						<form action="productAdmin" method="POST">
							<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
							<input class="btn btn-confirm" type="submit" name="edit" value="Edit">
						</form>		
					</div>
					<div class="col-6">
						<form action="productAdmin" method="POST">
							<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
							<input class="btn btn-danger" type="submit" name="delete" value="Delete">
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<br>
	<?php } ?>

	</div>

<?php } ?>