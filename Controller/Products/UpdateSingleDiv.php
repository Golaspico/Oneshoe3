<?php
			$ProductsID = $_POST['ProductsID'];
			
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $sql = "SELECT * FROM `products` WHERE ProductsID='$ProductsID'";

	        $result = $conn->query($sql);
	        if($result->num_rows > 0 )
	        {
	        	$row = $result->fetch_assoc();

	        }else
	        {
	        	exit();
	        }


?>


<form class="UpdateProduct" action="../Controller/Products/Update.php" method="post">
	        		<div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" width="200" height="200"></center></div>
	        			<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>" class="form-control"/>
	        	
	        		<div class="form-group">
	        			<label>Product Name</label>
	        			<input type="text" name="ProductName" value="<?php echo $row['ProductName']; ?>" placeholder="Product Name" class="loginforms"/>
	        		</div>	
	        		<div class="form-group">
	        			<label>Product Price</label>
	        			<input type="text" name="ProductPrice" value="<?php echo $row['ProductPrice']; ?>" placeholder="Product Price" class=" loginforms"/>
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
	        			
						<button type="submit" class="btn btn-primary col-xs-12">UPDATE</button>
</form>