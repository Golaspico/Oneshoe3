<?php

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Cart.php");

	$valCartsID = $_POST['cartsID'];
	$valAmount = $_POST['Amount'];
	$valPrice = $_POST['Price'];
	$valTotalAmount = $_POST['Amount'] * $_POST['Price'];

	$CART->updateCart($valCartsID,$valAmount,$valPrice,$valTotalAmount);

?>