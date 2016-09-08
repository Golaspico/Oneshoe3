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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="../css/animate.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/chris.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/customstyle.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
   

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
            <!-- <li class="dropdown ctmHighlight"><a href="#" class="navTitles">Men<i class="glyphicon glyphicon-menu-down"></i></a>
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
            </li>   -->
            <li class="ctmHighlight">
                <a href="#"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"><span class="badge badge" id="cartcounter"></span></i></a>
            </li>
            <li>
              <div class="col-sm-8"><!--/dropdownmenu-->
					
						<div class="shop-menu">
						<div class="dropdown">

							
    

	
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
								<span class="caret"></span></button>
								<ul class="dropdown-menu" style="left:-70px;">
								<li><a href=""><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
								<li><a href="Dashboard.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>Reports</a></li>
								<li><a href="logout_sucess.php"><i class="fa fa-lock"></i>Logout</a></li>
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

<div class="productListView"><!-- productListView -->
    <div class="container">
        
        <div class="row" id="productList" style="margin-top:10%;">
            
            



        </div>


    </div>

  <!--   <div class="paginationWrapper">
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




       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.form.js"></script>
<script>
  $(document).ready(function(){

    
      //You need the jquery.form.js to use this
        // alert(data);
        

        //After Inserting Repopulate the Product List
        $.post("../Controller/Products/PurchasableItemList.php",
                
                function(response){
                $("#productList").html(response);
              
            });
            //End of Repopulating
   

    
  });
</script>

   
</body>
</html>