<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();
	        
      
			// echo $newformat;
			// // 2003-10-16
	        $UsersID = $_SESSION['UsersID'];
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `products` WHERE UsersID='$UsersID'";
	        $result = $conn->query($sql);?>

	        <table class="table table-striped">
				<thead>
					<tr>
						<th>CUSTOMER NAME</th>
						<th>ITEM</th>
						<th>SIZE</th>
						<th>COLOR</th>
						<th>QUANTITY</th>
						<th>PRICE</th>
						
						
					</tr>
				</thead>
				<tbody>


	       <?php while($row = $result->fetch_assoc()){ ?>
	       			
			
					<tr>
						<?php 
							$productsID = $row['ProductsID'];
							$sql2 = "SELECT * FROM `carts` JOIN `users` ON carts.UsersID=users.UsersID WHERE carts.ProductsID='$productsID'";
							$result2 = $conn->query($sql2);
							$row2 = $result2->fetch_assoc();
						?>
						<td><?php echo $row2['UserName'];?></td>
						<td><?php echo $row['ProductName'];?></td>
						<td><?php echo $row2['SizesID'];?></td>
						<td><?php echo $row2['Color'];?></td>
						
						<td><?php echo $row2['Amount'];?></td>
						<td><?php echo $row2['Price'];?></td>
						
						
						
						
					</tr>
					<?php      }?>
				</tbody>
			</table>





