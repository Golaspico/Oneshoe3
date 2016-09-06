<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	require_once("../Models/Users.php");
	require_once("../Models/Authentication.php");
	require_once("../Models/Products.php");

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

<form method="post" id="addProduct" enctype="multipart/form-data">
	<input type="file" name="fileToUpload"/>
	<input type="text" name="ProductName"/>
	<input type="number" step="any" name="ProductPrice"/>
	<select name="Category">
		<option value="1">MEN-LEATHER</option>
		<option value="2">MEN-RUBBER SHOES</option>
		<option value="3">MEN-SLIPPERS</option>
		<option value="4">WOMEN-FLATS</option>
		<option value="5">WOMEN-HEELS</option>
		<option value="6">WOMEN-WEDGE</option>
		<option value="7">KIDS-RUBBER SHOES</option>
		<option value="8">KIDS-SLIPPERS(BOYS)</option>
		<option value="9">KIDS-SLIPPERS(GIRLS)</option>

	</select>

	<input type="text" name="Details"/>
</form>

<script>

</script>
</body>
</html>