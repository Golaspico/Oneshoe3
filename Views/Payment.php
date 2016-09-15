<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="UTF-8">
	<title>SoleSearchPH</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />	
    
	<meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="../css/animate.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/chris.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/customstyle.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
   <style>
      .panel-default {
    border-color: #ffad41;
    border-radius: 0px;
    border-width: thick;
}
   </style>

</head>

 <header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php"><img src="../images/headerIMG/logo.png" alt=""></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">

        <ul class="nav navbar-nav navbar-right moveDown">
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Men<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="../Mleather.php" >Leather</a></li>
                    <li><a href="../MRubbershoes.php">Rubber Shoes</a></li> 
                    <li><a href="../MSlippers.php">Slippers</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Women<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="../WFlats.php">Flats</a></li>
                    <li><a href="../WHeels.php">Heels</a></li> 
                    <li><a href="../WWedge.php">Wedge</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Kids<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="../KRubbershoes.php">Rubber Shoes</a></li>
                    <li><a href="../KSlippersB.php">Slippers (Boys) </a></li> 
                    <li><a href="../KFlatsG.php">Flats (Girls) </a></li> 
                </ul>
            </li>  


           <li>
              <div class=""><!--/dropdownmenu-->
                    
                        <div class="shop-menu pull-right">
                        <div class="dropdown">

                            
    

    
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="left:-70px;">
                                <li><a href="UserUpdate.php"><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
                                <?php if($_SESSION['Role'] == 2){?>
                                    <li><a href="Admin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>Reports</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Dashboard2.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>Reports</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 0){?>
                                    
                                <?php }?>
                                
                                <li><a href="../Controller/Authentication/Logout.php"><i class="fa fa-lock"></i>Logout</a></li>
                                </ul>

                                </div><!--/dropdownmenu-->      
                        </div>
                    </div>
            </li>    
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
  



 


</header>


<body>
<?php 
  session_start();
?> 

<div class="container">
    <div class="row goingDown">
        <div class="col-xs-6 col-xs-offset-3" id="orderform" style="display:none;">
          <div class="panel panel-default">
              <div class="panel-header">
                <center><h4>ORDER REVIEW</h4></center>
              </div>
              <div class="panel-body">
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
                        
                        $myUserID = $_SESSION['UsersID'];
                        $sql = "SELECT * FROM `carts` JOIN `products` ON carts.ProductsID=products.ProductsID WHERE carts.UsersID='$myUserID'";

                        $result = $conn->query($sql);
                        $Total = 0;
                        while($row = $result->fetch_assoc())
                        {
                        $Total = $Total + $row['TotalAmount'];
                      ?>
                      <tr>
                        <td><?php echo $row['ProductName'];?></td>
                        <td><?php echo $row['Amount'];?></td>
                        <td><?php echo $row['SizesID'];?></td>
                        <td><?php echo $row['Color'];?></td>
                        <td><?php echo $row['Price'];?></td>
                        <td>PHP <?php echo $row['TotalAmount'];?></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span style="font-weight:bold; font-size:12px;">PHP <?php echo $Total;?></span></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-xs-12">
                    <center><a href="PaypalPayments.php" class="btn btn-primary magicbtn"><span style="color:black;"><i class="fa fa-paypal" aria-hidden="true"></i></span> PROCEED TO PAYMENT</a></center>
                  </div>
              </div>
          </div>
        </div>



          <div class="col-xs-6 col-xs-offset-3" id="shippingform" style="display:none;">
          <div class="panel panel-default">
              <div class="panel-header">
                <center><h4>SHIPPING</h4></center>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                      <h4 id="statusmessage" style="display:none;">FULL NAME AND SHIPPING ADDRESS IS REQUIRED</h4>
                      <input type="text" id="fullname" class="loginforms" placeholder="FULL NAME"/>
                      <input type="text" id="address" class="loginforms" placeholder="SHIPPING ADDRESS"/>
                      <select name="City" required="required">
                        <option disabled="disabled" selected="selected">CHOOSE CITY</option>
                        <option value="Caloocan">Caloocan</option>
                        <option value="Valenzuela">Valenzuela</option>
                        <option value="Navotas">Navotas</option>
                        <option value="Malabon">Malabon</option>
                        <option value="Manila">Manila</option>
                        <option value="Pasay">Pasay</option>
                        <option value="Paranaque">Paranaque</option>
                        <option value="Las Pinas">Las Pinas</option>
                        <option value="Quezon">Quezon</option>
                        <option value="Marikina">Marikina</option>
                        <option value="San Juan">San Juan</option>
                        <option value="Pasig">Pasig</option>
                        <option value="Pateros">Pateros</option>
                        <option value="Makati">Makati</option>
                        <option value="Taguig">Taguig</option>
                        <option value="MuntiLupa">MuntiLupa</option>
                        

                      </select>
                  </div>
                  <div class="col-xs-12">
                  <blockquote>
                  <p style="color:red;">** Shipping address should be NCR based only.</p>
                  <footer> 2016 Philippines <cite title="Source Title">SoleSearchPh.com</cite></footer>
                </blockquote>
                    <center><button id="next" class="btn btn-primary magicbtn"><span style="color:black;"><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></span> NEXT</button></center>
                  </div>
              </div>
          </div>
        </div>


        <div class="col-xs-6 col-xs-offset-3" id="completeform" style="display:none;">
          <div class="panel panel-default">
              <div class="panel-header">
                <center><h4>ORDER COMPLETE</h4></center>
              </div>
              <div class="panel-body">

                  <center><span style="color:#5dc35d;"><i class="fa fa-check-circle-o fa-5x" aria-hidden="true"></i></span></center>
                 
                  <div class="col-xs-12">
                  <blockquote>
                  <p style="color:red;">** Email has been sent. Kindly check.</p>
                  <footer> 2016 Philippines <cite title="Source Title">SoleSearchPh.com</cite></footer>
                </blockquote>
                    <center><a href="../index.php" class="btn btn-primary magicbtn"><span style="color:white;"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span> OK</a></center>
                  </div>
              </div>
          </div>
        </div>


        <div class="col-xs-6 col-xs-offset-3" id="cancelform" style="display:none;">
          <div class="panel panel-default">
              <div class="panel-header">
                <center><h4>ORDER CANCELED</h4></center>
              </div>
              <div class="panel-body">

                  <center><span style="color:red;"><i class="fa fa-times fa-5x" aria-hidden="true"></i></span></center>
                 
                  <div class="col-xs-12">
                  <blockquote>
                  <p style="color:red;">** Ordered has been canceled. Current cart is still active.</p>
                  <footer> 2016 Philippines <cite title="Source Title">SoleSearchPh.com</cite></footer>
                </blockquote>
                    <center><a href="Cart.php" class="btn btn-primary magicbtn"><span style="color:white;"><i class="fa fa-check fa-lg" aria-hidden="true"></i></span> BACK TO CART</a></center>
                  </div>
              </div>
          </div>
        </div>


    </div>
</div>
<center><h2><span id="StatusMessage" style="display:none;"></span></h2></center>




       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>


<!-- START OF LOG IN SCRIPT -->
<script>
    $(document).ready(function(){
        $("#loginForm").submit(function(){

                $.ajax({
                    url:"../Controller/Authentication/Login.php",
                    dataType:'json',
                    type:'post',
                    data:$(this).serialize(),
                    success:function(result){
                        console.log(result.Status);
                        
                            if(result.Status == "Success")
                            {

                                   // $("#UserName").html(result.UserName);
                                   //  $("#Email").html(result.Email);
                                   //  $("#FullName").html(result.FullName);
                                   //  $("#Address").html(result.Address);
                                   //  $("#Role").html(result.Role);
                                    $("#StatusMessage").html("LOG IN SUCCESS");
                                    $("#StatusMessage").fadeIn(1000);
                                    $("#StatusMessage").fadeOut(1000);
                                    
                                     if(result.Role == "0"){
                                        setTimeout(function(){
                                          //do something special
                                          window.location.replace("../index.php");
                                        }, 2000);     
                                     }else if(result.Role == "1"){
                                        setTimeout(function(){
                                          //do something special
                                          window.location.replace("Dashboard2.php");
                                        }, 2000);     
                                     }else {
                                         setTimeout(function(){
                                          //do something special
                                          window.location.replace("Admin.php");
                                        }, 2000);     
                                     }
                                    
                            }else{
                                $("#StatusMessage").html("Incorrect Login");
                                $("#StatusMessage").fadeIn(1000);
                                $("#StatusMessage").fadeOut(1000);
                            }
                            
                         
                    }
                });

            return false;
        });

    });
</script>
<?php 
  if(isset($_GET['status']))
  {
    $mystatus = $_GET['status'];
  }else{ ?> 
    <script>
  $(document).ready(function(){
      $("#shippingform").fadeIn(1000);  
      $("#next").on('click',function(){
          if($("#fullname").val() != "" && $("#address").val() != "")
          {
            $("#shippingform").fadeOut(1000);  
            $("#orderform").fadeIn(1000);
          }else{
            $("#statusmessage").fadeIn(1000);
            $("#statusmessage").fadeOut(1000);
          }
          
      });
  });

</script>



  <?php }

  if(isset($_GET['status'])){
  if($mystatus == "canceled"){

?>
<script>
  $(document).ready(function(){
      $("#cancelform").fadeIn(1000);  
    
  });

</script>
<?php }else if($mystatus == "complete"){ ?>
<script>
  $(document).ready(function(){
      $("#completeform").fadeIn(1000);  
     
  });

</script>


<?php } }?>


<!-- END OF LOG IN SCRIPT -->
   
</body>
</html>