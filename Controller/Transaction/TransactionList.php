<?php
      $servername = "127.0.0.1";
          $username = "root";
          $password = "";
          $dbname = "oneshoe";

          session_start();
          
      // echo $newformat;
      // // 2003-10-16

          $conn = new mysqli($servername, $username, $password,$dbname);

          $sql = "SELECT * FROM `orders`";
          $result = $conn->query($sql);?>

          <table class="table table-striped">
        <thead>
          <tr>
            <th>TRANSACTION NUMBER</th>
            <th>USERS ID</th>
            <th>ORDERS</th>
            <th>DATE PURCHASED</th>
            <th>TOTAL</th>

          </tr>
        </thead>
        <tbody>


         <?php while($row = $result->fetch_assoc()){ ?>

         <?php 
            $orderID = $row['OrderID'];
            $sqltotal = "SELECT DISTINCT OrderID FROM carts WHERE OrderID='$orderID' AND OrderID != 0";
            $result2 = $conn->query($sqltotal);
            while($row2 = $result2->fetch_assoc()){
            $sqlmainTotal = "SELECT * FROM carts WHERE OrderID='$orderID' AND OrderID !=0";
            $result3 = $conn->query($sqlmainTotal);
            $TotalAmount = 0;
            while($row3 = $result3->fetch_assoc()){
              $TotalAmount = $TotalAmount + $row3['TotalAmount'];
            }  
          ?>  
          <tr>
            <td><?php echo $row['OrderID'];?></td>
            <td><?php echo $row['UsersID'];?></td>
            <td>
            <form action="../Controller/Transaction/TransactionReport.php" method="post" class="reports">
              <input type="hidden" value="<?php echo $orderID;?>" name="OrderID" />
              <button class="btn btn-primary magicbtn" type="submit">ITEMS</button>
            </form>  
            
            </td>
            <td><?php echo $row['Date'];?></td>
         
            <td><?php echo $TotalAmount;?></td>
          </tr>
          <?php   }   }?>
        </tbody>
      </table>





