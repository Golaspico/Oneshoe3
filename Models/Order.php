<?php
	class Order 
	{

		public function insertOrder($valUsersID,$valStatus,$valMessage)
		{
				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$sql = "INSERT INTO `orders` (UsersID,Status,Message) VALUES ('$valUsersID','$valStatus','$valMessage')";

				$conn->query($sql);
				
				$last_id = mysqli_insert_id($conn);
				$sql2 = "UPDATE `carts` SET `OrderID`='$last_id' WHERE UsersID='$valUsersID'";
				$conn->query($sql2);

				return "Order Insert";				
		}

		public function updateOrder($valOrderID,$valstatus,$valMessage)
		{
				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$sql = "UPDATE `orders` SET `Status`='$valstatus',`Message`='$valMessage' WHERE OrderID='$valOrderID'";

				$conn->query($sql);

				return "Order Updated"; 
		}

		public function deleteOrder($valOrderID)
		{

				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$sql = "DELETE FROM `orders` WHERE OrderID='$valOrderID'";
				$conn->query($sql);

				return "Order Deleted";
			
		}


	}


	$ORDER = new Order();

?>