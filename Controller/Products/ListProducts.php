<?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "oneshoe";
            // Create connection
            $conn = new mysqli($servername, $username, $password,$dbname);

            $sql = "SELECT * FROM `products` JOIN `users` ON products.UsersID=users.UsersID";
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

               <div class="col-lg-4  col-sm-6  mobileCenterView">
                    <form>
                    <img src="<?php echo "../images/uploads/". $row['Image'];?>" alt="thumb01">
                    <div class="sizes">
                        <ul class="radio-inline">
                            <li class="sizesList"><label><input type="radio" name="gender" value="30" checked> 30 </label></li>
                            <li class="sizesList"><label><input type="radio" name="gender" value="30" > 31 </label></li>
                            <li class="sizesList"><label><input type="radio" name="gender" value="30" > 32 </label></li>
                            <li class="sizesList"><label><input type="radio" name="gender" value="30" > 33 </label></li>
                        </ul>

                    </div>
                    
                    <div class="color">
                        <ul class="radio-inline">
                            <li class="sizesList"><label><input type="radio" name="gender" value="Red" checked><span class="badge" style="background-color:Red;">Red</span></label></li>
                            <li class="sizesList"><label><input type="radio" name="gender" value="Blue" ><span class="badge" style="background-color:Blue;">Blue</span></label></li>
                            <li class="sizesList"><label><input type="radio" name="gender" value="Gray" ><span class="badge" style="background-color:Gray;">Gray</span></label></li>                           
                        </ul>
                    </div>
                    <button type="submit" class="ctmsubmit btn btn-default"> <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
                   </form>      
                </div><!-- mobileCenterView --> 


      <?php }?>





