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

<?php function content(){ ?>
	<form method="POST" action="mailConf">
		
	</form>
<?php } ?>