<?php

	// $valProductID,$valProductName,$valProductPrice,$valCategory,$valDetails

	$ProductsID = $_POST['ProductsID'];
	$ProductName = $_POST['ProductName'];
	$ProductPrice = $_POST['ProductPrice'];
	$Category = $_POST['Category'];
	$Details = $_POST['Details'];
	$Stocks = $_POST['Stocks'];

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Products.php");

	$myResponse = $PRODUCTS->updateProduct($ProductsID,$ProductName,$ProductPrice,$Category,$Details,$Stocks);
	echo $myResponse;
	
?>