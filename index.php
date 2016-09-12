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
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/chris.css">
    <link rel="stylesheet" href="css/customstyle.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">


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
         <li><form action="Controller/Products/PurchasableItemList.php" id="SearchForm" method="post">    
                <input type="text" placeholder="SEARCH" name="Search" id="Search" class="loginforms" style="margin-top:10px;"/>
            </form></li>   
         <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Men<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="Mleather.php" >Leather</a></li>
                    <li><a href="MRubbershoes.php">Rubber Shoes</a></li> 
                    <li><a href="MSlippers.php">Slippers</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Women<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="WFlats.php">Flats</a></li>
                    <li><a href="WHeels.php">Heels</a></li> 
                    <li><a href="WWedge.php">Wedge</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Kids<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="KRubbershoes.php">Rubber Shoes</a></li>
                    <li><a href="KSlippersB.php">Slippers (Boys) </a></li> 
                    <li><a href="KFlatsG.php">Flats (Girls) </a></li> 
                </ul>
            </li>  

            <li class="ctmHighlight">
                <a href="Views/Cart.php"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"><span class="badge badge" id="cartcounter" style="background-color:red;"></span></i></a>
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
                                    <li><a href="Views/Admin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>Reports</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Views/Dashboard2.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
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

        <ul class="nav navbar-nav navbar-right moveDown">
            <li>
            <form action="Controller/Products/PurchasableItemList.php" id="SearchForm" method="post">    
                <input type="text" placeholder="SEARCH" name="Search" id="Search" class="loginforms" style="margin-top:10px;"/>
            </form>
            </li>
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Men<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="Mleather.php" >Leather</a></li>
                    <li><a href="MRubbershoes.php">Rubber Shoes</a></li> 
                    <li><a href="MSlippers.php">Slippers</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Women<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="WFlats.php">Flats</a></li>
                    <li><a href="WHeels.php">Heels</a></li> 
                    <li><a href="WWedge.php">Wedge</a></li> 
                </ul>
            </li>    
            <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Kids<i class="glyphicon glyphicon-menu-down"></i></a>
                <ul role="menu" class="sub-menu">
                    <li><a href="KRubbershoes.php">Rubber Shoes</a></li>
                    <li><a href="KSlippersB.php">Slippers (Boys) </a></li> 
                    <li><a href="KFlatsG.php">Flats (Girls) </a></li> 
                </ul>
            </li>  


          <li class="ctmHighlight"><a href="Views/Login.php" class="navTitles">Login</a></li>
          <li class="ctmHighlight"><a href="Views/Register.php" class="navTitles">Sign Up</a></li>
          <li class="ctmHighlight"><a href="" class="navTitles">About Us</a></li>         
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>

<?php }?>
  
  



  <div class="eiwrapper">
  <div id="ei-slider" class="ei-slider">
                    <ul class="ei-slider-large">
                        <li>
                            <img src="images/headerIMG/large/1.jpg" alt="image01" />
                            <div class="ei-title">
                                <h2>Creative</h2>
                                <h3>Duet</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/2.jpg" alt="image02" />
                            <div class="ei-title">
                                <h2>Friendly</h2>
                                <h3>Girl</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/3.jpg" alt="image03"/>
                            <div class="ei-title">
                                <h2>Tranquilent</h2>
                                <h3>Compatriot</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/4.jpg" alt="image04"/>
                            <div class="ei-title">
                                <h2>Insecure</h2>
                                <h3>Hussler</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/5.jpg" alt="image05"/>
                            <div class="ei-title">
                                <h2>Loving</h2>
                                <h3>Rebel</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/6.jpg" alt="image06"/>
                            <div class="ei-title">
                                <h2>Passionate</h2>
                                <h3>Seeker</h3>
                            </div>
                        </li>
                        <li>
                            <img src="images/headerIMG/large/7.jpg" alt="image07"/>
                            <div class="ei-title">
                                <h2>Crazy</h2>
                                <h3>Friend</h3>
                            </div>
                        </li>
                    </ul><!-- ei-slider-large -->
                    <ul style="display: block; max-width: 1050px;" class="ei-slider-thumbs">
                        <li class="ei-slider-element" >Current</li>
                        <li><a href="#">Slide 1</a><img src="images/headerIMG/thumbs/1.jpg" alt="thumb01"></li>
                        <li><a href="#">Slide 2</a><img src="images/headerIMG/thumbs/2.jpg" alt="thumb02"></li>
                        <li><a href="#">Slide 3</a><img src="images/headerIMG/thumbs/3.jpg" alt="thumb03"></li>
                        <li><a href="#">Slide 4</a><img src="images/headerIMG/thumbs/4.jpg" alt="thumb04"></li>
                        <li><a href="#">Slide 5</a><img src="images/headerIMG/thumbs/5.jpg" alt="thumb05"></li>
                        <li><a href="#">Slide 6</a><img src="images/headerIMG/thumbs/6.jpg" alt="thumb06"></li>
                        <li><a href="#">Slide 7</a><img src="images/headerIMG/thumbs/7.jpg" alt="thumb07"></li>
                    </ul><!-- ei-slider-thumbs -->
                </div>
</div>    

</header>

<div class="container">

        <div class="productListView" id="productListView"><!-- productListView -->
        
            

    <!--     <div class="paginationWrapper">
            <div class="text-center">
        <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li> 
                <li><a href="#">1</a></li> 
                <li><a href="#">2</a></li> 
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li> 
                <li><a href="#">5</a></li> 
                <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a>
        </ul>
        </div> 
            
        </div>  -->

        

    </div><!-- end of productListView -->
</div>


       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.form.js"></script>
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

                $.post("Controller/Products/PurchasableItemList.php",
                   
                    function(response){
                    $("#productListView").html(response);
                    
                    insertCart();

                });

         });
         </script>

        <script>
            function insertCart()
                {

                    $(document).ready(function(){
                        $(".insertCart").ajaxForm(function(data){
                            //You need the jquery.form.js to use this
                                // alert(data);
                                console.log(data);
                            //THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
                            $.post("Controller/Products/PurchasableItemList.php",
                                    
                                    function(response){
                                     $("#productListView").html(response);
                                     insertCart();
                                     $("#Messenger").fadeIn(1000);
                                     $("#Messenger").fadeOut(1000);
                                });
                            addNotification();
                            //END OF RE POPULATING WITHOUT REFRESHING.
                                
                        });

                    });
                }

         
        function addNotification()
        {
            var myCurrentValue = 0;
            dbRef.on('value',snap => myCurrentValue = snap.val().CartNumber);
           
            myCurrentValue++;
            dbRef.child('CartNumber').set(myCurrentValue);
        }

        </script> 

     


    <?php }else{

?>
 <script>
         $(document).ready(function(){

                $.post("Controller/Products/PurchasableItemList.php",
                   {"status":"index"},
                    function(response){
                    $("#productListView").html(response);
                    
                });

         });
         </script>

<script>
$(document).ready(function(){
       $("#SearchForm").on('input',function(){
        var mySearch = $("#Search").val();
        $.post("Controller/Products/PurchasableItemList.php",
                   {"Search" : mySearch},
                    function(response){
                    $("#productListView").html(response);
                    
                });

        return false;
       });

    });
</script>

<?php }?>



</body>
</html>