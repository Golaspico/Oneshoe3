<?php
	session_start();
			$UsersID = $_SESSION['UsersID'];
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";
	        // Create connection
	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `carts` JOIN `products` ON carts.ProductsID=products.ProductsID WHERE carts.UsersID='$UsersID' AND carts.OrderID='0'";
	        $result = $conn->query($sql);
	        $TotalAmount = 0;
	        $TotalItems = 0;
	        $TotalNotif = 0;
	        while($row = $result->fetch_assoc())

	        	{
	        		$TotalAmount = $TotalAmount + $row['TotalAmount'];
	        		$TotalItems = $TotalItems + $row['Amount'];
	        		$TotalNotif = $TotalNotif + 1;
	        		?>

	        <div class="row listcart">
                <div class="col-xs-12">
                    <div class="col-xs-3"><img src="../images/uploads/<?php echo $row['Image'];?>" width="100" height="100" style="width:100px !important; height:100px !important;"></div>
                    <div class="col-xs-2"><span class="biggerfont">Name:</span><?php echo $row['ProductName'];?></div>
                    <div class="col-xs-2"><span class="biggerfont">Details:</span><?php echo $row['Details'];?></div>
                    <div class="col-xs-2"><span class="biggerfont">Price:</span><?php echo $row['ProductPrice'];?></div>
                    <div class="col-xs-2"><span class="biggerfont">Quantity:</span><?php echo $row['Amount'];?></div>
                    <div class="col-xs-1"><span class="biggerfont">Total Price:</span><?php echo $row['TotalAmount'];?></div>
                </div>
                <div class="col-xs-12">
                    <center>
                    <div class="row">
                         <div class="col-xs-6">
                            
                            
                                <label>Quantity</label>
                                
                             <form class="UpdateProduct" action="../Controller/Carts/Update.php" method="post">
                            	<input type="hidden" name="cartsID" value="<?php echo $row['cartsID'];?>"/>
                            	<input type="number"  min="0" name="Amount" value="<?php echo $row['Amount'];?>">
                            	<input type="hidden" name="Price" value="<?php echo $row['ProductPrice'];?>"/>

                            	<button type="submit" class="btn btn-primary magicbtn" style="margin-top:0px;">UPDATE</button>
                            </form>
                            
                            
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                            <label>Remove from cart</label>
                            <form class="DeleteProduct" action="../Controller/Carts/Delete.php" method="post">
                            	<input type="hidden" name="cartsID" value="<?php echo $row['cartsID'];?>"/>

                            	<button type="submit" class="btn btn-primary magicbtn" style="margin-top:0px;">DELETE</button>
                            </form>
                                
                            </div>
                        </div>
                    </div>
                   </center>
                </div>
            </div>
           


<?php } ?>

<?php 
	if($result->num_rows > 0){?>
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-3">
				<div class="form-group">
					
					<a href="Payment.php" class="col-xs-12 btn btn-primary magicbtn"><i class="fa fa-money" aria-hidden="true"></i> CHECK OUT CART</a>
				</div>
			</div>

			<div class="col-xs-3 col-xs-offset-6" style="margin-top:10px;">
				<div><span class="biggerfont">Total Price :</span> <?php echo $TotalAmount;?></div>
				<div><span class="biggerfont">Total Items :</span> <?php echo $TotalItems;?></div>
				<input type="hidden" id="numberofnotif" value="<?php echo $TotalNotif;?>"/>
			</div>

		</div>
	</div>

	<?php	}else{?>
	<div class="row">
	 <center><h1 style="color: #FE980F;">NO ITEMS IN CART, PLEASE CHECK IN SOME ITEM.</h1></center>
	</div>


<?php } ?>