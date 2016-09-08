<?php

	require_once $_SERVER['DOCUMENT_ROOT'] .("/Models/Authentication.php");

	$AUTHENTICATION->logoutUser();
	
?>