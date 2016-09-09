<?php
	$ProductsID = $_POST['ProductsID'];
	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Products.php");

	$PRODUCTS->productIgnore($ProductsID);

?>