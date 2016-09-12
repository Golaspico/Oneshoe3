 <table class="table" style="border-color:#F0F0E9;">
                    <thead>
                        <tr>
                          <th>NAME</th>
                          <th>QUANTITY</th>
                          <th>SIZE</th>
                          <th>COLOR</th>
                          <th>AMOUNT</th>
                          <th>TOTAL</th>

                        </tr>
                    </thead>
                    <tbody class="table-striped">
                      <?php 
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "oneshoe";
                        // Create connection
                        $conn = new mysqli($servername, $username, $password,$dbname);
                        session_start();
                        $myUserID = $_SESSION['UsersID'];
                        $sql = "SELECT * FROM `carts` JOIN `products` ON carts.ProductsID=products.ProductsID";

                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['ProductName'];?></td>
                        <td><?php echo $row['Amount'];?></td>
                        <td><?php echo $row['SizeID'];?></td>
                        <td><?php echo $row['Color'];?></td>
                        <td><?php echo $row['Price'];?></td>
                        <td><?php echo $row['TotalAmount'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>