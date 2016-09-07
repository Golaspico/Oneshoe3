<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID";
	        $result = $conn->query($sql);

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

	        while($row = $result->fetch_assoc())
	        {?>

	        	<div class="col-md-4">
	        		<div><img src="<?php echo "../images/uploads/". $row['Image'];?>" width="200" height="200"></div>
	        		<div>Product Name : <?php echo $row['ProductName']; ?></div>
	        		<div>Product Price : <?php echo $row['ProductPrice']; ?></div>
	        		<div>Product Details : <?php echo $row['Details']; ?></div>
	        		<div>Product Category : <?php changeCategory($row['Category']);?></div>


	        		<div>Merchant Owner : <?php echo $row['UserName'];?></div>
	        		<form class="DeleteProduct" action="../Controller/Products/Delete.php" method="post">
	        			<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>
	        			<button type="submit">DELETE</button>
	        		</form>

	        		<h4>Update Form</h4>
	        		<form class="UpdateProduct" action="../Controller/Products/Update.php" method="post">
	        			<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>
	        			<input type="text" name="ProductName" value="<?php echo $row['ProductName']; ?>" placeholder="Product Name"/>
	        			<input type="text" name="ProductPrice" value="<?php echo $row['ProductPrice']; ?>" placeholder="Product Price"/>
	        			<input type="text" name="Details" value="<?php echo $row['Details']; ?>" placeholder="Product Details" />
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
						<button type="submit">UPDATE</button>
					</form>
	        	</div>


	  <?php }?>

