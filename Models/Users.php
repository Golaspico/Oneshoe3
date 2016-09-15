<?php 
	class Users
	{
		//Property declaration

		// public $var = 'a default value';

		// Method declaraction

		

		public function getUser($val1){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);


			$sql = "SELECT * FROM users WHERE UserName='$val1'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				return $result->fetch_assoc();
			}
			return "No Result";
		}


		public function updateUser($valUsername,$valPassword,$valAddress,$valEmail,$valFullname,$valRole){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "UPDATE `users` SET `Password`='$valPassword',`Address`='valAddress',`Email`='$valEmail',`FullName`='$valFullname',`Role`='$valRole' WHERE UserName='$valUsername'";
	        // }


			
			$result = $conn->query($sql);
			
			return "Updated User";
		}

		public function updatePassword($valUsername,$valPassword){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "UPDATE `users` SET `Password`='$valPassword' WHERE UserName='$valUsername'";
	        // }

	      
			
			$result = $conn->query($sql);
			
			return "Updated Password";
		}

		public function updateAddress($valUsername,$valPassword){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "UPDATE `users` SET `Address`='$valAddress' WHERE UserName='$valUsername'";
	        // }

	      
			
			$result = $conn->query($sql);
			
			return "Updated Address";
		}

		public function updateEmail($valUsername,$valEmail){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "UPDATE `users` SET `Email`='$valEmail' WHERE UserName='$valUsername'";
	        // }

	      
			
			$result = $conn->query($sql);
			
			return "Updated Email";
		}

		public function updateRole($valUsername,$valRole){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "UPDATE `users` SET `Role`='$valRole' WHERE UserName='$valUsername'";
	        // }

	      
			
			$result = $conn->query($sql);
			
			return "Updated Role";
		}

		public function deleteUser($valUsersID){

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        // if(isset($valPassword) && isset($valAddress) && isset($valEmail) && isset($valEmail) && isset($valFullname) && isset($valPRole)){
	        	$sql = "DELETE FROM `users` WHERE UsersID='$valUsersID'";
	        // }

	      
			
			$result = $conn->query($sql);
			
			return "Deleted $valUsersID";
		}

		public function insertUser($valUsername,$valPassword,$valAddress,$valEmail,$valFullname,$valRole)
		{
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $encryptPassword = md5($valPassword);
	        $sql = "INSERT INTO `users` (UserName,Password,FullName,Address,Email,Role) VALUES ('$valUsername','$encryptPassword','$valFullname','$valAddress','$valEmail','$valRole')";
	        $conn->query($sql);

	        $sqlgetID = "SELECT * FROM `users` WHERE `UserName`='$valUsername'";
	        $result = $conn->query($sqlgetID);
	        $row = $result->fetch_assoc();

	        return $row['UsersID'];
		}



	}


	$USERS = new Users();


	


?>