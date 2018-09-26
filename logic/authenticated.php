<?php
	
	require 'database.php';
	if (isset($_POST['register'])) {
		$query = "INSERT INTO users(fullName,email,pass,addr,role) VALUES('".$_POST['fullName']."','".$_POST['email']."','".$_POST['pass']."','".$_POST['addr']."','CST')";
		$connect->query($query);
		$_SESSION['user']=$_POST['fullName'];
		$connect = null;
		
		header('Location: /sepa2');
	}

	if (isset($_POST['login'])) {
		$query = "SELECT * from users where email ='".$_POST['email']."' ";
		$result = $connect->query($query);

		if ($result->num_rows == 0) {
			$_SESSION['alert'] = "Email/password Not Matched";
			header("Location: login");
		}

		while ($data = $result->fetch_assoc()) {
			if ($_POST['email'] == $data{'email'}) {
				echo "email true ";
				if ($_POST['pass'] == $data['pass']) {
					echo "pass right || Access Granted";
					$_SESSION['user'] = $data['fullName'];
					$_SESSION['role'] = $data['role'];

					header('Location: /sepa2');
				}
				else{
					$_SESSION['alert'] = "Email/password Not Matched";
					header("Location: login");
				}
			}
			else{
				$_SESSION['alert'] = "Email/password Not Matched";
				header("Location: login");
			}
		}
	}

	if (isset($_POST['edit'])) {
		$query = "SELECT * FROM users where fullname = '".$_SESSION['user']."' ";
		$profile = $connect->query($query);
		unset($_SESSION['user']);
		foreach ($profile as $value) {
			$queryUp = "UPDATE users SET fullName = '".$_POST['fullName']."', pass = '".$_POST['pass']."', email = '".$_POST['email']."', addr = '".$_POST['addr']."' WHERE id = '".$value['id']."' ";
			$connect->query($queryUp);

			$_SESSION['user'] = $_POST['fullName'];
		}
		header('Location: profile');
	}
?>