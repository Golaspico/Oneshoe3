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

	        $sql = "SELECT * FROM `products` JOIN `carts` ON products.ProductsID=carts.ProductsID WHERE products.UsersID='$UsersID'";
	        $result = $conn->query($sql);?>

	        <table class="table table-striped">
				<thead>
					<tr>
						<th>USERNAME</th>
						<th>ADDRESS</th>
						
					</tr>
				</thead>
				<tbody>


	       <?php while($row = $result->fetch_assoc()){ ?>
	       			<?php 
	       				$customerID = $row['UsersID'];
	       				$sql2 = "SELECT DISTINCT UsersID,Address,UserName FROM users WHERE UsersID='$customerID'";
	       				$result2 = $conn->query($sql2);
	       				$row2 = $result2->fetch_assoc();
	       			?>
			
					<tr>
						
						<td><?php echo $row2['UserName'];?></td>
						
						<td><?php echo $row2['Address'];?></td>
						
					</tr>
					<?php      }?>
				</tbody>
			</table>





