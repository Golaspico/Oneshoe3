<?php 
	session_start();



	$valUsersID = $_POST['UsersID'];
	$valStatus = $_POST['Status'];
	$valMessage = $_POST['Message'];


	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Order.php");

	$orderid = $ORDER->insertOrder($valUsersID,$valStatus,$valMessage);
	


?>