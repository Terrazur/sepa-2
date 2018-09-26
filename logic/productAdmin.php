<?php 
include 'database.php';
	if (isset($_POST['createPRD'])) {
		$target_dir = "assets/img/products/";
		$name = $_POST['product_name'];
		$temp = explode(".", $_FILES['product_picture']['name']);
		$filename = $name . '.' . end($temp);
		$target_file = $target_dir . $filename;

		$tempFile = $_FILES['product_picture']['tmp_name'];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (move_uploaded_file($tempFile , $target_file)) {	}
		else{
			echo "FAIL";
		} 

		$query="INSERT INTO products(product_img,product_name,product_desc,product_price,product_type,product_gender) VALUES('".$filename."','".$_POST['product_name']."','".$_POST['product_desc']."','".$_POST['product_price']."','".$_POST['product_type']."','".$_POST['product_gender']."')";
		$connect->query($query);
		$connect = null;
		header("Location: /");
	}

	if (isset($_POST['edit'])) {
		$id = $_POST['id'];

		require('view/productEdit.php');
	}

	if (isset($_POST['editPRD'])) {
		echo $_POST['imgPrev'];
		$delete = 'assets/img/products/'.$_POST['imgPrev'];
		echo "<img src='".$delete."'>";
		unlink($delete);

		$target_dir = "assets/img/products/";
		$name = $_POST['product_name'];
		$temp = explode(".", $_FILES['product_picture']['name']);
		$filename = $name . '.' . end($temp);
		$target_file = $target_dir . $filename;

		$tempFile = $_FILES['product_picture']['tmp_name'];
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (move_uploaded_file($tempFile , $target_file)) {	}
		else{
			echo "FAIL";
		}

		$query = "UPDATE products SET product_img='$filename', product_name='".$_POST['product_name']."', product_desc='".$_POST['product_desc']."', product_price='".$_POST['product_price']."', product_type='".$_POST['product_type']."', product_gender='".$_POST['product_gender']."' where id='".$_POST['id']."' ";

		$connect->query($query);
		header("Location: /");
	}

	if (isset($_POST['delete'])) {
		$query = "DELETE FROM products where id = '".$_POST['id']."' ";
		$connect->query($query);
		header("Location: /");
	}
?>