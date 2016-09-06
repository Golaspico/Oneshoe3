<?php
	class Authentication
	{
		public function loginUser($valEmail,$valPassword)
		{
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $encryptedPassword = md5($valPassword);

	        $sql = "SELECT * FROM `Users` WHERE `Email`='$valEmail' AND `Password`='$encryptedPassword'";
	        $result = $conn->query($sql);
	        if($result->num_rows > 0)
	        {
	        	$myResult = $result->fetch_assoc();
	        	return $myResult;
	        }

	        return "Failed";

		}

		public function logoutUser()
		{
						// Initialize the session.
			// If you are using session_name("something"), don't forget it now!
			session_start();

			// Unset all of the session variables.
			$_SESSION = array();

			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
			        $params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
			    );
			}

			// Finally, destroy the session.
			session_destroy();
			header("Location: http://localhost");
		}

	}

	$AUTHENTICATION = new Authentication();

?>