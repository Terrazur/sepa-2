<?php
	$servername="localhost";
	$username="root";
	$password="";
	$db_name="ebis";

	// connect
	$connect=new mysqli($servername,$username,$password,$db_name);

	if(!$connect){
		die("Connect failed");
	}
?>