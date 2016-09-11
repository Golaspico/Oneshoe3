<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-type: text/javascript');
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";



$jsonResponse ="";

$conn = new mysqli($servername, $username, $password,$dbname);
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

echo random_string(50);
if(isset($_POST['imagebase64'])){
    $data = $_POST['imagebase64'];

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    $randomstring = random_string(15);
    $target_dir = "../../images/profile/";
    $finalLocation = $target_dir.$randomstring;   
    file_put_contents($finalLocation, $data);
 
}else{
    echo "can't find file";
    die();
}


session_start();
$myUserID = $_SESSION['UsersID'];

//var_dump($_FILES);
//$target_dir = "../images/profile/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//// to lower
//$imageFileType = strtolower($imageFileType);
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//
//        $jsonResponse = array('message' => 'File is not an image.');
//        echo json_encode($jsonResponse);
//        $uploadOk = 0;
//    }
//}
//
//// Check if file already exists
//if (file_exists($target_file)) {
//    $jsonResponse = array('message' => 'Sorry, file already exists.');
//    echo json_encode($jsonResponse);
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    $jsonResponse = array('message' => 'Sorry, your file is too large.');
//    echo json_encode($jsonResponse);
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif") {
//    $jsonResponse = array('message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
//    echo json_encode($jsonResponse);
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    $jsonResponse = array('message' => 'Sorry, your file was not uploaded.');
//    echo json_encode($jsonResponse);
//
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        $fileName = $_FILES["fileToUpload"]["name"];
//        $path = $target_dir . $fileName;
        $sql="UPDATE `users` SET `Profile`='$finalLocation' WHERE `UsersID`='$myUserID'";
        $conn->query($sql);
$jsonResponse = array('message' => 'The file has been uploaded');
echo json_encode($jsonResponse);
//        
////        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//        
//
//    } else {
//        $jsonResponse = array('message' => 'Sorry, there was an error uploading your file.');
//        echo json_encode($jsonResponse);
//
//    }
//}


/*

die();*/

 header("Location: http://solesearch/Views/UserUpdate.php");