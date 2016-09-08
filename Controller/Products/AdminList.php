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
                $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID";
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
                    <form>
                    <div><center><img src="<?php echo "../images/uploads/". $row['Image'];?>" alt="thumb01" width="200" height="200"></center></div>
                    <div><center><strong>MERCHANT : </strong><?php echo $row['UserName']?></center></div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="col-md-12 btn btn-primary magicbtn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> ACCEPT</button>
                        </div>
                        <div class="col-md-6">
                            <button class="col-md-12 btn btn-primary magicbtn"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> IGNORE</button>
                        </div>
                    </div>
                    
                    
                   </form>      
               </div><!-- mobileCenterView --> 


      <?php }?>





