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
        <a class="navbar-brand" href="index.php"><img src="../images/headerIMG/logo.png" alt=""></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">

        <ul class="nav navbar-nav navbar-right moveDown">
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


          <li class="ctmHighlight"><a href="#" class="navTitles">Login</a></li>
          <li class="ctmHighlight"><a href="#" class="navTitles">Sign Up</a></li>
          <li class="ctmHighlight"><a href="#" class="navTitles">About Us</a></li>         
        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
  



 


</header>


<body>

<div class="container">
    <div class="row goingDown">
        <div class="col-md-5">
            <form method="post" id="loginForm">
                <div class="form-group">
                    <input type="email" name="Email" placeholder="Email Address" class="loginforms">
                </div>    
                    
                <div class="form-group">
                    <input type="password" name="Password" placeholder="Password" class="loginforms">
                </div> 
                  
                <button type="Submit" class="btn btn-primary magicbtn">Log In</button>
            </form>
                <br>
                <a href="#">Already a member?</a><br>
                <a href="#">Not yet a member?</a>
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
                                          window.location.replace("Dashboard.php");
                                        }, 2000);     
                                     }else{
                                        setTimeout(function(){
                                          //do something special
                                          window.location.replace("Dashboard2.php");
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