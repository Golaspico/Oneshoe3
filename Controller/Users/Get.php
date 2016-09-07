<?php
	$UserName = $_POST['UserName'];

	header('Content-Type: application/json');
	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Users.php");

	$myResult = $USERS->getUser($UserName);

	$encode = array("UserName" => $myResult['UserName'],
					"Email" => $myResult['Email'],
				    "FullName" => $myResult['FullName'],
				    "Address" => $myResult['Address'],
				    "Role" => $myResult['Role'] 		
					);
	$encoded = json_encode($encode);
	echo $encoded;


?>


