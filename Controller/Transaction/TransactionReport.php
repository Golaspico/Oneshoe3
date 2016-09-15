<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();

	        $OrderID = $_POST['OrderID'];
	  //       $Date1 = $_POST['From'];
	  //       $Date2 = $_POST['To'];

	        

	  //       $time1 = strtotime($Date1);
	  //       $time2 = strtotime($Date2);
			// $newformat1 = date('Y-m-d',$time1);
			// $newformat2 = date('Y-m-d',$time2);

			// echo $newformat;
			// // 2003-10-16

	        $conn = new mysqli($servername, $username, $password,$dbname);
	        $sql = "SELECT * FROM `carts` JOIN `products` ON carts.ProductsID=products.ProductsID WHERE OrderID='$OrderID'";
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
		                        	
		                            <td><?php echo $row['ProductsID'];?></td>
		                            <td><?php echo $row['ProductName'];?></td>
		                            <td><?php echo $row['SizesID'];?></td>
		                            <td><?php echo $row['Color'];?></td>
		                            
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
		                            <td><span style="font-size:15px; font-weight:bold"><?php echo $subtotal; ?></span></td>
		     					</tr>
		                    </tbody>
		                </table>
		            </div>
        		  </div>

	 


