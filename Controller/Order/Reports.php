<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();

	        $UsersID = $_SESSION['UsersID'];
	        $Date1 = $_POST['From'];
	        $Date2 = $_POST['To'];

	        

	        $time1 = strtotime($Date1);
	        $time2 = strtotime($Date2);
			$newformat1 = date('Y-m-d',$time1);
			$newformat2 = date('Y-m-d',$time2);

			// echo $newformat;
			// // 2003-10-16

	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $sql = "SELECT * FROM `orders` JOIN `carts` ON orders.OrderID=carts.OrderID WHERE (Date BETWEEN '$newformat1' AND '$newformat2')";
	        $result = $conn->query($sql);
	        ?>

	         <div class="row">
		            <div class="col-xs-12">
		                <table class="table table-striped">
		                    <thead>
		                        <tr>
		                            <th>ITEM ID</th>
		                            <th>ITEM NAME</th>
		                            <th>ITEM SIZE</th>
		                            <th>ITEM COLOR</th>
		                            <th>ITEM DATE AND TIME</th>
		                            <th>ITEM PRICE</th>
		                            <th>ITEM QUANTITY</th>
		                            <th>TOTAL</th>

		                        </tr>
		                    </thead>
		                    <tbody>

	        <?php 
	        $subtotal = 0;
	        while($row = $result->fetch_assoc())
	        	
	        {
	        	$subtotal = $subtotal + $row['TotalAmount'];
	        	?>
	        	
		                        <tr>
		                        	<?php 
		                        		$productID = $row['ProductsID'];
		                        		$sql2 = "SELECT * FROM `products` WHERE `ProductsID`='$productID'";
		                        		$result2 = $conn->query($sql2);
		                        		$row2 = $result2->fetch_assoc();
		                        	?>
		                            <td><?php echo $row['ProductsID'];?></td>
		                            <td><?php echo $row2['ProductName'];?></td>
		                            <td><?php echo $row['SizesID'];?></td>
		                            <td><?php echo $row['Color'];?></td>
		                            <td><?php echo $row['Date'];?></td>
		                            <td><?php echo $row['Price'];?></td>
		                            <td><?php echo $row['Amount'];?></td>
		                            <td><?php echo $row['TotalAmount'];?></td>
		                        </tr>
		     <?php } ?>
		     					<tr>
		     						<td></td>
		                            <td></td>
		                            <td></td>
		                            <td></td>
		                            <td></td>
		                            <td></td>
		                            <td></td>
		                            <td><span style="font-size:15px; font-weight:bold"><?php echo $subtotal; ?></span></td>
		     					</tr>
		                    </tbody>
		                </table>
		            </div>
        		  </div>

	 


