<?php 
	$title = "Products Review";
	include 'layouts/master.php';
?>


<?php function content(){ ?>
	<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="row text-center">
					<h3>Please Riview:</h3>
				</div>
				<div class="row">
					<form action="commentLogic" method="POST">
						<input class="btn btn-danger" type="submit" name="skipComment" value="Skip">
					</form>				
				</div> 
			</div>
			<div class="col-9">
				<form action="commentLogic" method="POST">
					<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
						<div><h4><?php echo $value[2]; ?></h4></div>
						<hr>
						<br>
						<div class="form-group">
							<label class="form-label">Your Rating</label>
							<select class="form-input" name="rating<?php echo $key; ?>">
								<option value="Very Good">Very Good</option>
								<option value="Good">Good</option>
								<option value="Bad">Bad</option>
							</select>
						</div>
						<br>
						<div class="form-group">
							<label class="form-label">Your Comment</label>
							<textarea class="form-input" name="comment<?php echo $key; ?>"></textarea>
						</div>
					<?php } ?>
					<br>
					<br>
					<input class="btn btn-confirm" type="submit" name="save">
				</form>
			</div>
		</div>
	</div>
<?php } ?>