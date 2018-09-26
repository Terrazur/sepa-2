<?php
	include 'database.php';

	if (isset($_POST['skipComment'])) {
	}

	if (isset($_POST['save'])) {
		$queryUser = "SELECT * FROM comments where user_name= '".$_SESSION['user']."' ";
		$result= $connect->query($queryUser);

		foreach ($_SESSION['cart'] as $key => $value) {
			if ($result->num_rows == 0) {
				$query = "INSERT INTO comments(`product_id`, `user_name`, `rate`, `comment`) 
					VALUES ('".$value[0]."','".$_SESSION['user']."','".$_POST['rating'.$key]."','".$_POST['comment'.$key]."')";
				echo $query;
				echo "<br>";
				$connect->query($query);
			}
			else{
				$query = "UPDATE comments SET comment='".$_POST['comment'.$key]."', rate='".$_POST['rating'.$key]."' where user_name='".$_SESSION['user']."' ";
				echo $query;
				echo "<br>";
				$connect->query($query);
			}
		}
		$connect=null;
	}
	unset($_SESSION['cart']);
	header('Location: profile');

?>