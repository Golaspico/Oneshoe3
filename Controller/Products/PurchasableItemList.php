<?php
			session_start();
			$status = "no-status";

			if(isset($_POST['status']))
			{
				$status = "index";
				$productsID = "";
			}

			if(isset($_POST['mode']))
			{
				$mode = $_POST['mode'];

			}

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);
	       
	         function changeCategory($val1)
	        {
	        	switch($val1)
	        	{
	        		case 1 : 
	        			echo "MEN LEATHER";
	        			break;
	        		case 2 :
	        			echo "MEN RUBBER SHOES";
	        			break;
	        		case 3 :
	        			echo "MEN SLIPPERS";
	        			break;
	        		case 4 :
	        			echo "WOMEN FLATS";
	        			break;
	        		case 5 :
	        			echo "WOMEN HEELS";
	        			break;
	        		case 6 :
	        			echo "WOMEN WEDGE";
	        			break;
	        		case 7 :
	        			echo "KIDS RUBBER SHOES";
	        			break;
	        		case 8 :
	        			echo "KIDS SLIPPERS(BOYS)";
	        			break;
	        		case 9 :
	        			echo "KIDS FLATS";
	        			break;
	        	}
	        }

	        if(isset($mode))
	        {
	        	$sql = "SELECT * FROM `products` WHERE `Stocks`!='0' AND `Status`!='0' AND `Category`='$mode' LIMIT 8";
	        }else
	        {
	        	$sql = "SELECT * FROM `products` WHERE `Stocks`!='0' AND `Status`!='0' LIMIT 8";
	        }

	        if(isset($_POST['Search']))
	        {
	        	$mysearch = $_POST['Search'];
	        	$sql = "SELECT * FROM `products` WHERE `Stocks`!='0' AND `Status`!='0' AND `Details` LIKE '$mysearch%'";


	        }

	        $result = $conn->query($sql);
	        while($row = $result->fetch_assoc())
	        {?>
	        	<?php 
	        		if($status == "no-status")
	        		{?>
						<form action="Controller/Carts/Insert.php" method="post" class="insertCart">
	        	<?php	}else{?>
	        			
	        		<form action="Views/Login.php" method="get" class="indexform">
	        		<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>

	        	<?php }
	        	?>
	        	
	        	<?php 
	        		if(isset($_SESSION['UsersID']))
	        		{?>
	        			<input type="hidden" name="UsersID" value="<?php echo $_SESSION['UsersID'];?>"/>
	        		<?php }
	        	?>
	        	<div class="col-md-3">
	        		<div class="col-md-12">
		        		<div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" width="200" height="200"></center></div>
		        		<div><strong>NAME</strong> : <?php echo $row['ProductName']; ?></div>
		        		<div><strong>PRICE</strong> : <?php echo $row['ProductPrice']; ?></div>
		        		<div><strong>DETAILS</strong> : <?php echo $row['Details']; ?></div>
		        		<div><strong>CATEGORY</strong> : <?php changeCategory($row['Category']);?></div>
		        		<div><strong>STOCKS</strong> : <?php echo $row['Stocks'];?></div>
		      			
		        		<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>
		        		<input type="hidden" name="Amount" value="1"/>
		        		<input type="hidden" name="TotalAmount" value="1"/>
		        		<input type="hidden" name="OrderID" value="0"/>
		        		<input type="hidden" name="Price" value="<?php echo $row['ProductPrice'];?>"/>

		        		<div><center><strong>SIZES</strong></center></div>
		        <div class="btn-group" data-toggle="buttons">
		       	

			
			
		        		<?php 
		        			$productsID = $row['ProductsID'];
		        			$sql2 = "SELECT * FROM `sizes` WHERE `ProductsID`='$productsID'";
		        			$result2 = $conn->query($sql2);
		        			if($result2->num_rows > 0)
		        			{
		        				while($row2 = $result2->fetch_assoc()){ ?>
		        				
		        				 <!--<div class="col-md-3 sizesPanel"><?php echo $row2['Size'];?></div>
				        		 <div class="col-md-3 sizesPanel"><?php echo $row2['Size'];?></div>
				        		 <div class="col-md-3 sizesPanel"><?php echo $row2['Size'];?></div>
				        		 <div class="col-md-3 sizesPanel"><?php echo $row2['Size'];?></div>-->
							 <label class="btn btn-warning">
				<input type="radio" name="Size" id="option2" value="<?php echo $row2['Size'];?>" autocomplete="off" required="reqruied">
				<span class="glyphicon glyphicon-ok"></span><span><?php echo $row2['Size'];?></span>
			</label>
			
			

			
					
		
		      <?php }?> 			
								
		        		<?php }
		        		?>
		      </div><!-- Endof the toggle -->
		      <div><center><strong>COLOR</strong></center></div>
								      <div class="btn-group" data-toggle="buttons">
								      <label class="btn btn-warning" style="background-color:black;">
								      	<input type="radio" name="Color" id="option2" value="Black" autocomplete="off" required="required">
										<span class="glyphicon glyphicon-ok"></span><span style="color:lavender">Black</span>
									</label>

									 <label class="btn btn-warning" style="background-color:lavender;">
								      	<input type="radio" name="Color" id="option2" value="White" autocomplete="off">
										<span class="glyphicon glyphicon-ok"></span><span style="color:black" >White</span>
									</label>

									 <label class="btn btn-warning" style="background-color:gray;">
								      	<input type="radio" name="Color" id="option2" value="Gray" autocomplete="off">
										<span class="glyphicon glyphicon-ok"></span><span style="color:lavender">Gray</span>
									</label>
									</div>
							<button type="submit" class="col-md-12 btn-btn-warning magicbtn" style="color:white;" style="border:0;height:30px;"><i class="fa fa-cart-plus" aria-hidden="true"></i> ADD TO CART</button>
	        		</div>
	        		
	        		
	        	</div>
	        </form>
	  <?php }

?>

