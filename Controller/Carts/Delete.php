<?php

	
	

	$CartsID = $_POST['cartsID'];

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Cart.php");

	

	

	$CART->deleteCart($CartsID);

	

?>