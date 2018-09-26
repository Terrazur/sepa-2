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

<?php function content(){ ?>
	<div class="break">
		<div class="panel">
			<div>
				<h2 class="panel-header"><?php echo $_SESSION['user']; ?>'s Account</h2>
			</div>
			<form action="auth" method="POST">
				<?php foreach ($GLOBALS['profile'] as $key => $profile): ?>
					<div class="form-group">
						<label class="form-label" for="fullName">Full Name</label>
						<input class="form-input" type="text" name="fullName" id="fullName" value="<?php echo $profile['fullName'] ?>">
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="email">Email</label>
						<input class="form-input" type="email" name="email" id="email" value="<?php echo $profile['email'] ?>">
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="pass">New Password</label>
						<input class="form-input" type="password" name="pass" id="pass">
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="conf">New Password Confirm</label>
						<input class="form-input" type="password" name="conf" id="conf" oninput="confirm()">
					</div>
					<br>
					<div class="form-group">
						<label class="form-label" for="addr">Address</label>
						<textarea class="form-input" name="addr" id="addr"><?php echo $profile['addr'] ?></textarea>
					</div>
					<br>
					<div class="text-center">
						<p class="text-center" id="error"></p>
					</div>
				<?php endforeach ?>
				<br>
				<input class="btn btn-confirm" type="submit" name="edit" value="Edit Account">
			</form>
		</div>
	</div>
	
<?php } ?>