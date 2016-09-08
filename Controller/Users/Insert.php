<?php

$valUsername = $_POST['UserName'];
$valPassword = $_POST['Password'];
$valAddress = $_POST['Address'];
$valEmail = $_POST['Email'];
$valFullname = $_POST['FullName'];
$valRole = $_POST['Role'];
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


	$myUsersID = $USERS->insertUser($valUsername,$valPassword,$valAddress,$valEmail,$valFullname,$valRole);

	$_SESSION['UserName'] = $valUsername;
	$_SESSION['UsersID'] = $myUsersID;

	if($valRole == 0){
		header("Location: http://localhost/Views/Dashboard.php");
	}else{
		header("Location: http://localhost/Views/Dashboard2.php");
	}
	

?>