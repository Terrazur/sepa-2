<?php
	$title = "Welcome to Sepa2 - Login";
	include 'layouts/master.php';
?>

<?php function nav(){ include 'layouts/navbar/authNav.php'; } ?>

<?php function content(){ ?>
	<br>
	<br>
	<div class="break">
		<div class="panel">
			<div>
				<h1 class="panel-header">Login</h1>
			</div>
			<form action="auth" method="POST">
				<div class="form-group">
					<label class="form-label" for="email">Email</label>
					<input class="form-input" type="email" name="email" id="email">
				</div>
				<br>
				<div class="form-group">
					<label class="form-label" for="pass">Password</label>
					<input class="form-input" type="password" name="pass" id="pass">
				</div>
				<br>
				<div class="text-center">
					<label class="text-center">No Account? <a href="register">No Problem!</a></label>
					<div class="text-error">
						<?php 
							if (isset($_SESSION['alert'])) {
								echo $_SESSION['alert'];
							}
						?>
					</div>
				</div>
				<br>
				<input class="btn btn-confirm" type="submit" name="login">
			</form>
		</div>
	</div>
	
<?php } ?>