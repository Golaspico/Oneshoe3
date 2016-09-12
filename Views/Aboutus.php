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


          <li class="ctmHighlight"><a href="#" class="navTitles">Login</a></li>
          <li class="ctmHighlight"><a href="Register.php" class="navTitles">Sign Up</a></li>
          <li class="ctmHighlight"><a href="#" class="navTitles">About Us</a></li>         
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
  



 


</header>


<body>

<div class="container">
    <div class="row" style="margin-top:70px;">
      <center>
       <div class="col-xs-12">
          
          <p>Sole searching? SoleSearchPH.com is here. SoleSearchPH.com is an online shoe market that offers convenience to both the customers and the local stores. We promote locally-made footwears from different local stores online in which we let them post and sell their products freely.</p>
       </div>
       <div class="col-xs-12">
          <h2>MISSION</h2>
          <p>Our Mission is to promote the products from the local small businesses in the shoe industry</p>
       </div>
       <div class="col-xs-12">
          <h2>VISION</h2>
          <p>Solesearch PH will be a medium for every local shoe store's success i the market.</p>

       </div>
       </center>
        <div class="col-xs-12">

        <center><img src="../images/aboutus/pic1.PNG" class="img img-circle imagecircle" width="100" height="100"></center>
        <center><p>Madrona, Stephen King Daniel</p></center>
        <center><img src="../images/aboutus/pic2.PNG" class="img img-circle imagecircle" width="100" height="100"></center>
        <center><p>Labrague, Bea Marie</p></center>
        <center><img src="../images/aboutus/pic3.PNG" class="img img-circle imagecircle" width="100" height="100"></center>
        <center><p>Maala, Jonna Rose</p></center>
        <center><img src="../images/aboutus/pic4.PNG" class="img img-circle imagecircle" width="100" height="100"></center>
        <center><p>Gabillo, Christian Paul</p></center>
        <center><img src="../images/aboutus/pic5.PNG" class="img img-circle imagecircle" width="100" height="100"></center>
        <center><p>Boa, Rose Ann</p></center>
       </div>
    </div>
</div>
<center><h2><span id="StatusMessage" style="display:none;"></span></h2></center>




<footer class="footer">
  <p>SoleSearchPH.com by A-Team</p>
  <p>Jose Rizal University</p>
</footer>       



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

<!-- END OF LOG IN SCRIPT -->
   
</body>
</html>