<?php

	
	print_r($_FILES['fileToUpload']);
	print_r($_POST);

	$ProductName = $_POST['ProductName'];
	$ProductPrice = $_POST['ProductPrice'];
	$Category = $_POST['Category'];
	$Details = $_POST['Details'];
	$UsersID = $_POST['UsersID'];

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Products.php");

	$image = $_FILES;

	// $valProductName,$valProductPrice,$valImage,$valCategory,$valDetails

	$PRODUCTS->insertProducts($ProductName,$ProductPrice,$image,$Category,$Details,$UsersID);

	

?>