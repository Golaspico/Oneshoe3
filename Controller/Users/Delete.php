<?php

$valUsersID = $_POST['UsersID'];

// $valBirthday = $_POST['Birthday'];
session_start();

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Users.php");

	

	// $encode = array("UserName" => $myResult['UserName'],
	// 				"Email" => $myResult['Email'],
	// 			    "FullName" => $myResult['FullName'],
	// 			    "Address" => $myResult['Address'],
	// 			    "Role" => $myResult['Role'] 		
	// 				);
	// $encoded = json_encode($encode);
	// echo $encoded;

	$valEmail = strtolower($valEmail);
	$myUsersID = $USERS->deleteUser($valUsersID);

	


	
	
	
	

?>