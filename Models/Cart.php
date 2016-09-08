<?php
	class Cart
	{
		public function insertCart($valUsersID,$valProductsID,$valSizesID,$valAmount,$valPrice,$valTotalAmount,$valOrderID,$valColor)
		{
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "INSERT INTO `carts` (UsersID,ProductsID,SizesID,Amount,Price,TotalAmount,OrderID,Color) VALUES ('$valUsersID','$valProductsID','$valSizesID','$valAmount','$valPrice','$valTotalAmount','$valOrderID',$valColor)";
	        $conn->query($sql);

	        return "Added to Cart";

		}

		public function deleteCart($valCartsID)
		{
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "DELETE FROM `carts` WHERE `cartsID`='$valCartsID'";
	        $conn->query($sql);

	        return "Deleted to Cart";

		}

		public function updateCart($valCartsID,$valAmount,$valTotalAmount)
		{
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        return "Updated Cart";
		}


	}

	$CART = new Cart();

?>