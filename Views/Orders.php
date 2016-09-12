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
    <link rel="stylesheet" href="../css/customstyle.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
 <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
 

<style>
    



</style>

</head>
<body>
<div id="Messenger" class="messenger" style="display:none">
    Added To Cart
</div>
 <header>

 <?php if(isset($_SESSION['UserName']))
 {?>
    <input type="hidden" id="UsersID" value="<?php echo $_SESSION['UsersID'];?>"/>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../images/headerIMG/logo.png" alt=""></a>
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

            <li class="ctmHighlight">
                <a href="Cart.php"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"><span class="badge badge" id="cartcounter" style="background-color:red;"></span></i></a>
            </li>
            <li>
              <div class=""><!--/dropdownmenu-->
                    
                        <div class="shop-menu pull-right">
                        <div class="dropdown">

                            
    

    
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="left:-70px;">
                                <li><a href="Views/UserUpdate.php"><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
                                <?php if($_SESSION['Role'] == 2){?>
                                    <li><a href="Admin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href="Orders.php"><i class="fa fa-calendar-o"></i>Reports</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Dashboard2.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href="Orders.php"><i class="fa fa-calendar-o"></i>Reports</a></li>
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
 <?php }else
 {?>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="images/headerIMG/logo.png" alt=""></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">

      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>

<?php }?>
  
  



  

</header>

<div class="container" style="margin-top:10%;">
    <div class="col-xs-5">
        <form action="../Controller/Order/Reports.php" id="Dater" method="post">
            <div class="form-group">
                <label class="hideme">FROM DATE</label>
                <input type="text" class="datepicker form-control loginforms hideme" name="From">
            </div>
            <div class="form-group">
                <label class="hideme">TO DATE</label>
                <input type="text" class="datepicker form-control loginforms hideme" name="To">
            </div>
          
    </div>
    <div class="col-xs-7">
        <button class="btn btn-primary magicbtn hideme" style="margin-top:30px;" id="">GO</button>
        </form>  
        <button class="btn btn-primary magicbtn hideme" onclick="print()" style="margin-top:30px;">PRINT</button>
    </div>

        <div class="productListView" id="productListView"><!-- productListView -->
       

        

    </div><!-- end of productListView -->
</div>


       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.form.js"></script>
<script type="text/javascript">
            $(function() {
                $('#ei-slider').eislideshow({
                    animation           : 'center',
                    autoplay            : true,
                    slideshow_interval  : 3000,
                    titlesFactor        : 0
                });
            });
        </script>

<?php 
    if(isset($_SESSION['UserName']))
    {?>
           <script src="https://www.gstatic.com/firebasejs/3.3.2/firebase.js"></script>
        <script>
          // Initialize Firebase
          var config = {
            apiKey: "AIzaSyCNYJHw9AHzj0_1LPIcEFjAEYHtm7CH1HQ",
            authDomain: "solesearch-d101b.firebaseapp.com",
            databaseURL: "https://solesearch-d101b.firebaseio.com",
            storageBucket: "",
          };
          firebase.initializeApp(config);
           var UsersID = document.getElementById('UsersID').value;
           var notification = document.getElementById('cartcounter');
           var dbRef = firebase.database().ref('cart').child(UsersID);

           dbRef.on('value',snap => notification.innerText = snap.val().CartNumber);
           
           // dbRef.child('CartNumber').set(14);
           
           
        </script>

        <script>
         $(document).ready(function(){

            

                $.post("../Controller/Order/Reports.php",
                   {"From" : "2016-01-01", "To" : "2017-01-01" },
                    function(response){
                    $("#productListView").html(response);
                    
                    // insertCart();

                });

                        $("#Dater").ajaxForm(function(data){
                    //You need the jquery.form.js to use this
                        // alert(data);
                        console.log(data);
                    //THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
                    // $.post("../Controller/Products/List.php",
                            
                    //         function(response){
                    //         $("#ProductList").html(response);
                    //          deleteProduct();
                    //          updateProduct(); 
                    //     });
                    //END OF RE POPULATING WITHOUT REFRESHING.
                         $("#productListView").html(data);
                        
                });


         });
         </script>

        <script>
          
         
        
        </script> 

     


    <?php }else{

?>
 // <script>
 //         $(document).ready(function(){

 //                $.post("Controller/Products/PurchasableItemList.php",
 //                   {"status":"index"},
 //                    function(response){
 //                    $("#productListView").html(response);
                    
 //                });

 //         });
 //         </script>

<?php }?>
 <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>


</body>
</html>