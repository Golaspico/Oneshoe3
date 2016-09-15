<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="UTF-8">
	<title>SoleSearchPH</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />	
    
	<meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="../css/animate.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/chris.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/customstyle.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
   

</head>

 <header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../images/headerIMG/logo.png" alt=""></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">

        <ul class="nav navbar-nav navbar-right moveDown">
            <!-- <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Men<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="Mleather.php" >Leather</a></li>
                    <li><a href="MRubbershoes.php">Rubber Shoes</a></li> 
                    <li><a href="MSlippers.php">Slippers</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Women<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="WFlats.php">Flats</a></li>
                    <li><a href="WHeels.php">Heels</a></li> 
                    <li><a href="WWedge.php">Wedge</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Kids<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="KRubbershoes.php">Rubber Shoes</a></li>
                    <li><a href="KSlippersB.php">Slippers (Boys) </a></li> 
                    <li><a href="KFlatsG.php">Flats (Girls) </a></li> 
                </ul>
            </li>   -->
            <li>
              <div class="col-sm-8"><!--/dropdownmenu-->
					
						<div class="shop-menu pull-right">
						<div class="dropdown">

							
    

	
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
								<li><a href="UserUpdate.php"><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
								 <?php if($_SESSION['Role'] == 2){?>
                                    <li><a href="Admin.php"><i class="fa fa-briefcase"></i>Pending Items</a></li>
                                    <li><a href="DashboardAdmin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href="Transaction.php"><i class="fa fa-calendar-o"></i>Transaction</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Dashboard2.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 0){?>
                                    <li><a href="Dashboard.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                <?php }?>
								
								<li><a href="../Controller/Authentication/Logout.php"><i class="fa fa-lock"></i>Logout</a></li>
								</ul>

								</div><!--/dropdownmenu-->		
						</div>
					</div>
            </li>
          
                
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
  



 


</header>


<body>

<?php
	$myProduct = $_GET['encrypt'];

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $sql = "SELECT * FROM `products` WHERE ProductsID='$myProduct'";

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
			}else{
				die();
			}
	
?>
<div class="container" style="margin-bottom:15px;">
	<div class="row" style="margin-top:10%;">
		
		<div id="ProductList">
		<form class="UpdateProduct" action="../Controller/Products/Update.php" method="post">
	        		<div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" width="200" height="200"></center></div>
	        			<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>" class="form-control"/>
	        	
	        		<div class="form-group">
	        			<label>Product Name</label>
	        			<input type="text" name="ProductName" value="<?php echo $row['ProductName']; ?>" placeholder="Product Name" class="loginforms"/>
	        		</div>	
	        		<div class="form-group">
	        			<label>Product Price</label>
	        			<input type="text" name="ProductPrice" id="ProductPrice" min="0" value="<?php echo $row['ProductPrice']; ?>" placeholder="Product Price" class=" loginforms"/>
	        		</div>
	        		<div class="form-group">
	        			<label>Stocks</label>
	        			<input type="text" min="0" name="Stocks" id="Stocks" value="<?php echo $row['Stocks']; ?>" placeholder="Product Price" class=" loginforms"/>
	        		</div>		
	        		<div class="form-group">
	        			<label>Details</label>
	        			<input type="text" name="Details" value="<?php echo $row['Details']; ?>" placeholder="Product Details" class="loginforms"/>
	        		</div>	
	        		<div class="form-group">
	        			<label>Category</label>
	        			<select name="Category">
							<option value="1" <?php if($row['Category'] == 1)echo "selected";?>>MEN-LEATHER</option>
							<option value="2" <?php if($row['Category'] == 2)echo "selected";?>>MEN-RUBBER SHOES</option>
							<option value="3" <?php if($row['Category'] == 3)echo "selected";?>>MEN-SLIPPERS</option>
							<option value="4" <?php if($row['Category'] == 4)echo "selected";?>>WOMEN-FLATS</option>
							<option value="5" <?php if($row['Category'] == 5)echo "selected";?>>WOMEN-HEELS</option>
							<option value="6" <?php if($row['Category'] == 6)echo "selected";?>>WOMEN-WEDGE</option>
							<option value="7" <?php if($row['Category'] == 7)echo "selected";?>>KIDS-RUBBER SHOES</option>
							<option value="8" <?php if($row['Category'] == 8)echo "selected";?>>KIDS-SLIPPERS(BOYS)</option>
							<option value="9" <?php if($row['Category'] == 9)echo "selected";?>>KIDS-SLIPPERS(GIRLS)</option>

						</select>
	        		</div>	
	        			<center><h2 id ="resultMessage" style="display:none">ITEM UPDATED</h2></center>
						<button type="submit" class="btn btn-primary col-xs-12">UPDATE</button>
</form>
		</div>
			<center><a href="DashBoard2.php" class="btn btn-danger col-xs-12" style="margin-top:20px;">BACK</a></center>
	</div>
</div>





   




       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.form.js"></script>
<script>

$(document).ready(function(){
		// $(".UpdateProduct").ajaxForm(function(data){
		// 	//You need the jquery.form.js to use this
		// 		// alert(data);
		// 		console.log(data);
		// 	//THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
		// 	$.post("../Controller/Products/UpdateSingleDiv.php",
		            
		//             function(response){
		//             $("#ProductList").html(response);
		             
		//              updateProduct();
		//         });
		// 	//END OF RE POPULATING WITHOUT REFRESHING.
				
		// });


		updateProduct();

	});


function updateProduct()
{
	$(document).ready(function(){
		$(".UpdateProduct").submit(function(data){
			//You need the jquery.form.js to use this
				// alert(data);
				console.log(data);
			//THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
			if($("#ProductPrice").val() <= 0 || $("#Stocks").val() <= 0){
				$("#resultMessage").html("Stock and Price Cannot be lower than 0");
				$("#resultMessage").fadeIn(1000);
            	$("#resultMessage").fadeOut(1000);
            	return false;
			}





			       $.post("../Controller/Products/Update.php",
            $(".UpdateProduct").serialize()
            ,function(response){
            console.log(response);
        });

			         $.post("../Controller/Products/UpdateSingleDiv.php",
            $(".UpdateProduct").serialize()
            ,function(response){
            	$("#resultMessage").html("Item Updated");
            	$("#resultMessage").fadeIn(1000);
            	$("#resultMessage").fadeOut(1000);
            updateProduct();
        });

			//END OF RE POPULATING WITHOUT REFRESHING.
			return false;
		});


	});
}
</script>

   
</body>
</html>

				