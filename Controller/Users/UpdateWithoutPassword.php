<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        $UserName = $_POST['UserName'];
	        $Password = $_POST['Password'];
	        $Address = $_POST['Address'];

	        session_start();

	        $myUserID = $_SESSION['UsersID'];;

	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $encrypt = md5($Password);
	        $sql = "UPDATE `users` SET `UserName`='$UserName',`Address`='$Address' WHERE `UsersID`='$myUserID'";

	        $conn->query($sql);
	        
?>