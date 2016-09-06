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
	        	</div>


	  <?php }?>

