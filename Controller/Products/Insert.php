<?php

	
	print_r($_FILES['fileToUpload']);
	print_r($_POST);

	$ProductName = $_POST['ProductName'];
	$ProductPrice = $_POST['ProductPrice'];
	$Category = $_POST['Category'];
	$Details = $_POST['Details'];
	$UsersID = $_POST['UsersID'];

	$Size1 = $_POST['Size1'];
	$Size2 = $_POST['Size2'];
	$Size3 = $_POST['Size3'];
	$Size4 = $_POST['Size4'];

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Products.php");

	$image = $_FILES;

	// $valProductName,$valProductPrice,$valImage,$valCategory,$valDetails

	$PRODUCTS->insertsizesProducts($ProductName,$ProductPrice,$image,$Category,$Details,$UsersID,$Size1,$Size2,$Size3,$Size4);
	
	

?>