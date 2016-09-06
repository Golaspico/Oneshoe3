<?php
	class Products
	{

		public function insertProducts($valProductName,$valProductPrice,$valImage,$valCategory,$valDetails)
		{
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);

				$ProductName = $valProductName;
				$Details = $valDetails;


				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$target_dir = "../images/uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// to lower
				$imageFileType = strtolower($imageFileType);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}
				// Check if file already exists
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				    && $imageFileType != "gif") {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        $fileName = $_FILES["fileToUpload"]["name"];
				        $sql="INSERT INTO `carousel` (Image,ProductName,Details) VALUES ('$fileName','$ProductName','$Details')";
				        $conn->query($sql);
				        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}

				//
				

		}



		public function deleteProduct($valProductID)
		{
				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$sql = "DELETE FROM products WHERE `ProductsID`='$valProductID'";
				$conn->query($sql);

				return "Deleted";
		}

		public function updateProduct($valProductID,$valProductName,$valProductPrice,$valProductImage,$valCategory,$valDetails)
		{
				$servername = "127.0.0.1";
				$username = "root";
				$password = "";
				$dbname = "oneshoe";

				$conn = new mysqli($servername, $username, $password,$dbname);

				$sql = "UPDATE `products` SET `ProductName`='$valProductName',`ProductPrice`='$valProductPrice',`Image`='$valImage',`Category`='$valCategory',`Details`='Details'";

				$conn->query($sql);

				return "Updated Products";
		}
	}

	$PRODUCTS = new Products();
	

?>