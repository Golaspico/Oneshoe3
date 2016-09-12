<?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "oneshoe";
            // Create connection
            $conn = new mysqli($servername, $username, $password,$dbname);

            //Intel Check
            session_start();
            if($_SESSION['Role'] == 1)
            {
                $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID";
            }else if ($_SESSION['Role'] == 2 || $_SESSION['Role'] == 0)
            {
                $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID WHERE products.Status='0'";
            }

            
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

               <div class="col-md-3">
                    
                    <div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" alt="thumb01" width="200" height="200"></center></div>
                    <div><strong>MERCHANT : </strong><?php echo $row['UserName'];?></div>
                    <div><strong>NAME</strong> : <?php echo $row['ProductName']; ?></div>
                    <div><strong>PRICE</strong> : <?php echo $row['ProductPrice']; ?></div>
                    <div><strong>DETAILS</strong> : <?php echo $row['Details']; ?></div>
                    <div><strong>CATEGORY</strong> : <?php changeCategory($row['Category']);?></div>
                    <div><strong>STOCKS</strong> : <?php echo $row['Stocks'];?></div>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="admindecissionyes" method="post" action="../Controller/Products/AcceptProduct.php">
                            <input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>
                            <button type="submit" class="col-md-12 btn btn-primary magicbtn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> ACCEPT</button>
                            </form>   
                        </div>
                        <div class="col-md-6">
                        <form class="admindecissionno" method="post" action="../Controller/Products/IgnoreProduct.php">
                            <input type="hidden" name="ProductsID" value="<?php echo $row['ProductsID'];?>"/>
                            <button type="submit" class="col-md-12 btn btn-primary magicbtn"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> IGNORE</button>
                        </form> 
                        </div>
                    </div>
                    
                    
                      
               </div><!-- mobileCenterView --> 


      <?php }?>


      <?php if($result->num_rows <= 0){ ?>

        <center><h2 style="color:#FE980F;">NO PENDING ITEMS</h2></center>

        <?php }?>





