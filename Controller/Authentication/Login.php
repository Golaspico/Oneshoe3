<?php
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	header('Content-Type: application/json');
	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Authentication.php");

	$myResult = $AUTHENTICATION->loginUser($Email,$Password);
	if($myResult == "Failed"){
		$encode = array("Status" => "Failed"		
					);
		$encoded = json_encode($encode);
		echo $encoded;
		exit();
	}
	$encode = array("UserName" => $myResult['UserName'],
					"Email" => $myResult['Email'],
				    "FullName" => $myResult['FullName'],
				    "Address" => $myResult['Address'],
				    "Role" => $myResult['Role'],
				    "Status" => "Success" 		
					);
	$encoded = json_encode($encode);
	echo $encoded;
	session_start();
	$_SESSION['UserName'] = $myResult['UserName'];
	$_SESSION['UsersID'] = $myResult['UsersID'];
	$_SESSION['Role'] = $myResult['Role'];
?>