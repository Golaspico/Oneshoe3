<?php

	
	

	$valUsersID = $_POST['UsersID'];
	$valProductsID = $_POST['ProductsID'];
	$valSizesID = $_POST['SizesID'];
	$valAmount = $_POST['Amount'];
	$valPrice = $_POST['Price'];
	$valTotalAmount = $_POST['TotalAmount'];
	$valOrderID = $_POST['OrderID'];

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Cart.php");

	

	// $valUsersID,$valProductsID,$valSizesID,$valAmount,$valPrice,$valTotalAmount,$valOrderID

	$CART->insertCart($valUsersID,$valProductsID,$valSizesID,$valAmount,$valPrice,$valTotalAmount,$valOrderID);

	

?>