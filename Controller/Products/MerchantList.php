<?php
			ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        session_start();
	        $UsersID = $_SESSION['UsersID'];

	        $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID WHERE users.UsersID='1'";
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

	        	<div class="col-md-3 panelofitems">
	        		<div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" width="200" height="200"></center></div>
	        		<div><strong>NAME</strong> : <?php echo $row['ProductName']; ?></div>
	        		<div><strong>PRICE</strong> : <?php echo $row['ProductPrice']; ?></div>
	        		<div><strong>DETAILS</strong> : <?php echo $row['Details']; ?></div>
	        		<div><strong>Category</strong> : <?php changeCategory($row['Category']);?></div>


	        		
	        		<!--<form class="DeleteProduct" action="../Controller/Products/Delete.php" method="post"> -->
	        		<!--	<input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/> -->
	        		<!--	<button type="submit" class="btn btn-primary">DELETE</button> -->
	        		<!--</form>  -->

	        		
	        		<center><a href="ItemUpdate.php?encrypt=<?php echo $row['ProductsID'];?>" class="btn btn-primary col-xs-12">UPDATE</a></center>
	        	</div>


	  <?php }?>

