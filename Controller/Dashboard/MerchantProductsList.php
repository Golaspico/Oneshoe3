<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();
	        

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

			// echo $newformat;
			// // 2003-10-16
	        $UsersID = $_SESSION['UsersID'];
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `products` WHERE UsersID='$UsersID'";
	        $result = $conn->query($sql);?>

	        <table class="table table-striped">
				<thead>
					<tr>
						<th>ITEM</th>
						<th>SIZE</th>
						<th>COLOR</th>
						<th>CATEGORY</th>
						<th>DESCRIPTION</th>
						<th>STOCKS</th>
						<th>PRICE</th>
						
						
					</tr>
				</thead>
				<tbody>


	       <?php while($row = $result->fetch_assoc()){ ?>
	       			
			
					<tr>
						<?php 
							$productsID = $row['ProductsID'];
							$sql2 = "SELECT * FROM `carts` WHERE ProductsID='$productsID'";
							$result2 = $conn->query($sql2);
							$row2 = $result2->fetch_assoc();
						?>
						<td><?php echo $row['ProductName'];?></td>
						<td><?php echo $row2['SizesID'];?></td>
						<td><?php echo $row2['Color'];?></td>
						<td><?php echo $row['Category'];?></td>
						<td><?php echo $row['Details'];?></td>
						<td><?php echo $row['Stocks'];?></td>
						<td><?php echo $row['ProductPrice'];?></td>
						
						
						
					</tr>
					<?php      }?>
				</tbody>
			</table>





