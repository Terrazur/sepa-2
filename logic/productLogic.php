<?php
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	require 'database.php';

	// master start
		if ($request_uri[0] == '/sepa2/store') {
			$query = "SELECT * FROM products";
			$products = $connect->query($query);
			$connect = null;
			require('view/store.php');
		}

		if(isset($_POST['view'])){
			$query = "SELECT * FROM products where id='".$_POST['product_id']."' ";
			$product = $connect->query($query);
			$queryCom = "SELECT * FROM comments where product_id = '".$_POST['product_id']."' ";
			$comments = $connect->query($queryCom);
			$queryUser = "SELECT * FROM users where fullName='".$_SESSION['user']."' ";
			$user = $connect->query($queryUser);
			$connect = null;
			require('view/viewPrd.php');
		}
	// master end

	// cart logic start
		if (isset($_POST['cart'])) {
			$query = "SELECT * FROM products where id='".$_POST['id']."' ";
			$carts = $connect->query($query);

			foreach ($carts as $cart) {
				$id=$cart['id'];
				$img=$cart['product_img'];
				$name=$cart['product_name'];
				$price=$cart['product_price'];
				$qty=$_POST['qty'];
				$size=$_POST['size'];
			}

			if (isset($_SESSION['cart'])) {
				$check = 0;
				foreach ($_SESSION['cart'] as $key=>$value) {
					if ($value[0] == $_POST['id']) {
						$count = $value[4] += $qty;
						$value[4] = $count;
						$value[$key][4] = $count;
						echo $value[4];
						$_SESSION['cart'][$key][4] = $count;
						$check=1;
					}
				}
				if ($check == 0) {
					$cart = $_SESSION['cart'];
					$cart[] = array($id,$img,$name,$price,$qty,$size);
					$_SESSION['cart']= $cart;
					echo " Unqie";
				}
			}
			else{
				echo "Tests";
				$cart = $_SESSION['cart'];
				$cart[] = array($id,$img,$name,$price,$qty,$size);
				$_SESSION['cart']= $cart;
			}
			header('Location: cart');
		}

		if(isset($_POST['clearAll'])){
			unset($_SESSION['cart']);
			header("Location: cart");
		}
		
		if(isset($_POST['clear'])){
			foreach ($_SESSION['cart'] as $k => $v) {
				if ($_POST['id'] == $k) {
					unset($_SESSION["cart"][$k]);
				}
			}
			if (count($_SESSION['cart']) == 0) {
				unset($_SESSION["cart"]);
			}
			header('Location: cart');
		}

		if (isset($_POST['checkout'])) {
			$query1 = "SELECT * FROM users where fullName = '".$_SESSION['user']."'";
			$user = $connect->query($query1);
			foreach ($user as $value) {
				$user_id = $value['id'];
				foreach ($_SESSION['cart'] as $key => $value) {
					$prd_id =  $value[0];
					$prd_name = $value[2];
					$prd_price = $value[3];
					$prd_qty = $value[4];
					$prd_size = $value[5];

					echo $prd_size;
					
					${"queryPrd".$key} = "INSERT INTO orders(`user_id`, `product_id`, `product_name`, `qty`, `product_price`, `product_size`) VALUES ('".$user_id."','".$prd_id."','".$prd_name."','".$prd_qty."','".$prd_price."','".$prd_size."')";
					$connect->query(${"queryPrd".$key});
					$connect= null;
				}
			}
			header('Location: review');
		}
	// cart logic end
?>