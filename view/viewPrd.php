<?php  
	$title = "Store"; 
	require('layouts/master.php');
?>

<?php function css(){ ?>
	<link rel="stylesheet" type="text/css" href="assets/css/styleStore.css">
<?php } ?>

<?php function nav(){require 'layouts/navbar/redirectNav.php';} ?>

<?php function content(){ ?><br><br><br>
	<div>
		<?php foreach ($GLOBALS['product'] as $prd){ ?>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<img style="width: 100%;" src="assets/img/products/<?php echo $prd['product_img']; ?>">
					</div>
					<div class="col-md-5 col-6">
						<div class="container-subt">
							<div class="row">
								<div class="col-12 text-center">
									<h1>
										<?php echo $prd['product_name']; ?>
									</h1>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-4">
									Size
								</div>
								<div class="col-1">:</div>
								<div class="col-5 text-center">
									28 | 30 | 40 | 45
								</div>
							</div>
							<div class="row">
								<div class="col-4">
									Description
								</div>
								<div class="col-1">:</div>
								<div class="col-5 text-center">
									<?php echo $prd['product_desc']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6 text-center">
						<div class="row">
							<div class="col-12">
								<h2>
									Price
									Rp. <span class="price" id="price0"><?php echo $prd['product_price']; ?></span>
								</h2>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-12">
								<?php if (isset($_SESSION['user'])): ?>
									<?php foreach ($GLOBALS['user'] as $key => $value): ?>
										<?php if ($value['email_confirm'] == "DENY"): ?>
											<h3>Please Go To Profile Page To Activate Your Account</h3>
											<?php else: ?>
												<form action="product" method="POST">
													<div class="row text-center">
														<div class="col-2"></div>
														<div class="col-8">
															<div class="form-group">
																<label class="form-label" for="qty">Quatity</label>
																<input class="form-input" type="number" name="qty" id="qty" required>
															</div>
															<br>
															<div class="form-group">
																<label class="form-label" for="size">Size</label>
																<select class="form-input" name="size" id="size" required>
																	<option value="28">28</option>
																	<option value="30">30</option>
																	<option value="40">40</option>
																	<option value="45">45</option>
																</select>
															</div>
														</div>
														<div class="col-2"></div>
													</div>
													<br>
													<input type="hidden" name="id" value="<?php echo $prd['id']; ?>">
													<input class="btn btn-confirm" type="submit" name="cart">
												</form>
										<?php endif ?>
									<?php endforeach ?>
									<?php else: ?>
										Please Login To Order <?php $prd['product_name']; ?>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-3">User</div>
					<div class="col-4">Rate</div>
					<div class="col-5">Comment</div>
				</div>
				<?php foreach ($GLOBALS['comments'] as $key => $comment) { ?>
				<div class="row">
					<div class="col-3"><?php echo $comment['user_name'] ?></div>
					<div class="col-4"><?php echo $comment['rate'] ?></div>
					<div class="col-5"><?php echo $comment['comment'] ?></div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
<?php } ?>