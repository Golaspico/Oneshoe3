<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();

	        $UsersID = $_POST['UsersID'];
	  //       $Date1 = $_POST['From'];
	  //       $Date2 = $_POST['To'];

	        

	  //       $time1 = strtotime($Date1);
	  //       $time2 = strtotime($Date2);
			// $newformat1 = date('Y-m-d',$time1);
			// $newformat2 = date('Y-m-d',$time2);

			// echo $newformat;
			// // 2003-10-16

	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $sql = "SELECT * FROM `products` WHERE UsersID='$UsersID'";
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
	        	
	        	?>
	        				<?php 
		                        		$productID = $row['ProductsID'];
		                        		$sql2 = "SELECT * FROM `carts` WHERE `ProductsID`='$productID' AND `OrderID` !='0'";
		                        		$result2 = $conn->query($sql2);
		                        		$row2 = $result2->fetch_assoc();
		                        		$subtotal = $subtotal + $row2['TotalAmount'];
		                        		if($result2->num_rows > 0){
		                        		$orderID = $row2['OrderID'];
		                        		$sql3= "SELECT * FROM `orders` WHERE OrderID='$orderID' AND Status='1'";	
		                        		$result3 = $conn->query($sql3);
		                        		$row3 = $result3->fetch_assoc();	
		                        	?>
		                        <tr>
		                        	
		                            <td><?php echo $row2['ProductsID'];?></td>
		                            <td><?php echo $row['ProductName'];?></td>
		                            <td><?php echo $row2['SizesID'];?></td>
		                            <td><?php echo $row2['Color'];?></td>
		                            <td><?php echo $row3['Date'];?></td>
		                            <td><?php echo $row2['Price'];?></td>
		                            <td><?php echo $row2['Amount'];?></td>
		                            <td><?php echo $row2['TotalAmount'];?></td>
		                        </tr>
		                        <?php }?>
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

	 


