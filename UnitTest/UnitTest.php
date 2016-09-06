<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	require_once("../Models/Users.php");
	require_once("../Models/Authentication.php");

	$myUser = $USERS->getUser('John');

	// Email, Password
	// Will return Failed or the Object of a User
	// print_r($AUTHENTICATION->loginUser('MJ@yahoo.com','JordanAir')); 


	// This is Inserting the a User to the database
	// UserName, Password, Address, Email, FullName, Role
	// echo $USERS->insertUser('Michael','JordanAir','123 Magic City of Ohio','MJ@yahoo.com','Michael Jordan',0);

	// This is Deleting the User
	// echo $USERS->deleteUser('Michael');

	$AUTHENTICATION->logoutUser();

?>
</body>
</html>