<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>

<?php 
	// require_once("../Models/Users.php");
	// require_once("../Models/Authentication.php");
	// require_once("../Models/Products.php");

	// $myUser = $USERS->getUser('John');

	// Email, Password
	// Will return Failed or the Object of a User
	// print_r($AUTHENTICATION->loginUser('MJ@yahoo.com','JordanAir')); 


	// This is Inserting the a User to the database
	// UserName, Password, Address, Email, FullName, Role
	// echo $USERS->insertUser('Michael','JordanAir','123 Magic City of Ohio','MJ@yahoo.com','Michael Jordan',0);

	// This is Deleting the User
	// echo $USERS->deleteUser('Michael');

	// $AUTHENTICATION->logoutUser();

?>

<h1>EVERYTHING IN THIS PAGE IS PURELY HTML AND JAVASCRIPT</h1>

<!-- THIS IS THE USERS DIV -->
<h2> IN THIS DIV, WE GET THE INFORMATION OF THE USER USING AJAX JQUERY BY JSON OBJECT </h2>
<div id="UsersDiv">
	<p id="UserName"></p>
	<p id="Email"></p>
	<p id="Address"></p>
	<p id="FullName"></p>
	<p id="Role"></p>
	<h4 id="StatusMessage"></h4>

</div>
<h2> YOU CAN DOUBLE CHECK THE INSPECTORS CONSOLE FOR THE OBJECT DATA </h2>
<!-- END OF USERS DIV -->


<h2> IN THIS SECTION WE CAN TRY TO LOG IN BUT YOU WOULD HAVE TO IMPLEMENT YOUR OWN VALIDATION </h2>

<!-- THIS IS THE LOG IN TEST -->
<div>
	<form method="post" id="loginForm">
		<input type="text" name="Email" placeholder="Email Address">
		<input type="password" name="Password" placeholder="Password">
		<button type="Submit">Log In</button>
	</form>
</div>
<br>
<!-- END OF THE LOG IN TEST -->



<!-- THIS IS THE PRODUCT INSERTION FORM -->
<form method="post" action="../Controller/Products/Insert.php" id="addProduct" enctype="multipart/form-data">
	<input type="file" name="fileToUpload"/>
	<input type="text" name="ProductName" placeholder="Product Name" />
	<input type="number" step="any" name="ProductPrice" placeholder="Product Price" />
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

	<input type="text" name="Details" placeholder="Details" />

	<h4>THE "UsersID should be a hidden input field, depending on current UserID logged in</h4>
	<select name="UsersID">
		<option value="0" disabled="disabled">CHOOSE OWNER</option>
		<option value="1">John</option>
	</select>
	<button type="Submit">Insert</button>
</form>
<!-- END OF PRODUCT INSERTION FORM -->



<!-- THIS IS THE PRODUCT DELETION LIST -->
<hr>
	<h4>IN HERE WE POPULATE THIS DIV WITH ALL THE LIST OF PRODUCTS</h4>
	<div id="ProductList">
		
	</div>

<hr>	
<!-- END OF PRODUCT DELETION -->

<script src="../js/jquery-2.2.3.min.js"></script>

<!-- YOU NEED THIS JQUERY FORM JS TO USE THE "ajaxForm call" -->
<script src="../js/jquery.form.js"></script>


<script src="../js/bootstrap.min.js"></script>





<!-- USERS SECTION USERS SECTION USERS SECTION USERS SECTION USERS SECTION USERS SECTION USERS SECTION USERS SECTION-->
<!-- IN THE DATA ATTRIBUTE WE INSERT "USERNAME AS THE PARAMETER TO GET THE INFORMATION" -->
<script>
	$(document).ready(function(){
		 $.ajax({
            url:"../Controller/Users/Get.php",
            dataType:'json',
            type:'post',
            data:{"UserName":"John"},
            success:function(data){
               		
                    console.log(data);
                    $("#UserName").html(data.UserName);
                    $("#Email").html(data.Email);
                    $("#FullName").html(data.FullName);
                    $("#Address").html(data.Address);
                    $("#Role").html(data.Role);
            }
        });

	})
	 

</script>



<!-- END OF USERS SECTION END OF USERS SECTION END OF USERS SECTION END OF USERS SECTION END OF USERS SECTION END OF USERS SECTION -->

<!-- START OF LOG IN SCRIPT -->
<script>
	$(document).ready(function(){
		$("#loginForm").submit(function(){

				$.ajax({
		            url:"../Controller/Authentication/Login.php",
		            dataType:'json',
		            type:'post',
		            data:$(this).serialize(),
		            success:function(result){
		            	console.log(result.Status);
		            	
		               		if(result.Status == "Success")
		               		{

		               			   $("#UserName").html(result.UserName);
				                    $("#Email").html(result.Email);
				                    $("#FullName").html(result.FullName);
				                    $("#Address").html(result.Address);
				                    $("#Role").html(result.Role);
				                    $("#StatusMessage").html("LOG IN SUCCESS");
				                    
		               		}else{
		               			$("#StatusMessage").html("Incorrect Login");
		               		}
		                	
		                 
		            }
		        });

			return false;
		});

	});
</script>

<!-- END OF LOG IN SCRIPT -->




<!-- SCRIPT FOR INSERTING PRODUCTS -->
<script>
	$(document).ready(function(){

		$("#addProduct").ajaxForm(function(data){
			//You need the jquery.form.js to use this
				// alert(data);
				console.log(data);

				//After Inserting Repopulate the Product List
				$.post("../Controller/Products/List.php",
		            
		            function(response){
		            $("#ProductList").html(response);
		            deleteProduct();
		            updateProduct(); 
		        });
		        //End of Repopulating
		});

		
	});
</script>
<!-- END OF INSERTING PRODUCTS SCRIPT -->

<!-- START OF LISTING THE PRODUCTS -->
<script>
	$(document).ready(function(){
				$.post("../Controller/Products/List.php",
		            
		            function(response){
		            $("#ProductList").html(response);
		            deleteProduct();
		            updateProduct();
		        });

		  

	});
</script>
<!-- END OF LISTING THE PRODUCTS -->

<!-- START OF THE DELETE PRODUCT CALL -->
<!-- NOTE : NOTICE THE LISTING PRODUCTS JS IS CALLING THE LINE 102 "deleteProduct()" -->
<!-- THIS IS TO ENSURE THAT WE POPULATE DIV FIRST BEFORE WE DECLARE THE DELETEPRODUCT BELOW -->
<script>
function deleteProduct()
{

	$(document).ready(function(){
		$(".DeleteProduct").ajaxForm(function(data){
			//You need the jquery.form.js to use this
				// alert(data);
				console.log(data);
			//THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
			$.post("../Controller/Products/List.php",
		            
		            function(response){
		            $("#ProductList").html(response);
		             deleteProduct();
		             updateProduct(); 
		        });
			//END OF RE POPULATING WITHOUT REFRESHING.
				
		});

	});
}
</script>
<!-- END OF THE DLETE PRODUCT CALL -->


<script>
function updateProduct()
{
	$(document).ready(function(){
		$(".UpdateProduct").ajaxForm(function(data){
			//You need the jquery.form.js to use this
				// alert(data);
				console.log(data);
			//THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
			$.post("../Controller/Products/List.php",
		            
		            function(response){
		            $("#ProductList").html(response);
		             deleteProduct(); 
		             updateProduct();
		        });
			//END OF RE POPULATING WITHOUT REFRESHING.
				
		});

	});
}
</script>


</body>
</html>