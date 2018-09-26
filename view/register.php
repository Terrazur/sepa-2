<?php
	$title = "Welcome to Sepa2 - Login";
	include 'layouts/master.php';
?>

<?php function nav(){ include 'layouts/navbar/authNav.php'; } ?>

<?php function content(){ ?>
	<br>
	<br>
	<div class="break">
		<div class="panel" style="border-radius: 20px;">
			<div>
				<h1 class="panel-header">Register</h1>
			</div>
			<form action="auth" method="POST">
				<div class="form-group">
					<label class="form-label" for="fullName">Full Name</label>
					<input class="form-input" type="text" name="fullName" id="fullName">
				</div>
				<br>
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
				<div class="form-group">
					<label class="form-label" for="conf">Confirm Password</label>
					<input class="form-input" type="password" name="conf" id="conf" oninput="confirm()">
				</div>
				<br>

				<div class="form-group">
					<label class="form-label" for="addr">Address</label>
					<textarea class="form-input" name="addr" id="addr"></textarea>
				</div>
				<br>
				<div class="text-center">
					<label class="text-center">Already Have An Account? <a href="login">Click Here!</a></label>
					<div class="text-error">
						<?php 
							if (isset($_SESSION['alert'])) {
								echo $_SESSION['alert'];
							}
						?>
					</div>
				</div>
				<br>
				<input class="btn btn-confirm" type="submit" name="register" value="Register">
			</form>
		</div>
	</div>
	
<?php } ?>