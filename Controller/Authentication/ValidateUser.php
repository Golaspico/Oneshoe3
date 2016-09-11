<?php
/**
 * Created by PhpStorm.
 * User: VanHyori
 * Date: 6/24/2016
 * Time: 2:09 PM
 */

//require_once('../cigclasses/DBConext.php');

//$newConnection = $db->ConnectToDB();
$makeMe = "true";

$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection

$email = strtolower($_POST['email']);
$sql = "SELECT * FROM `users` WHERE `Email` = '$email'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
$wow = $result->fetch_assoc();
    if($wow['Email'] == $email){
        $makeMe = 'false';
    }


}

echo $makeMe;