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
    body
    {
        font-family: 'Roboto', sans-serif !important;
        color:gray;
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
            <li>
              <div class="col-sm-8"><!--/dropdownmenu-->
					
						<div class="shop-menu pull-right">
						<div class="dropdown">

							
    

	
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
								<li><a href=""><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
								<li><a href="Dashboard.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>Reports</a></li>
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


<div class="container">

<div class="col-md-12" style="margin-top:10%;">
    <!-- THIS IS THE PRODUCT INSERTION FORM -->
<div class="col-md-12">

    
    <form method="post" action="../Controller/Products/Insert.php" id="addProduct" enctype="multipart/form-data">
       <div class="col-md-5">
        <div class="form-group">
            <label>What are you selling?</label>
            <input type="text" name="ProductName" placeholder="Display Item Name" class="loginforms" />
        </div>
        
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="any"  min="0" name="ProductPrice" placeholder="Price" class="loginforms"/>
        </div>
        <div class="form-group">
            <label>Kind of Shoe</label>
            <select name="Category">
                <option value="1">MEN-LEATHER</option>
                <option value="2">MEN-RUBBER SHOES</option>
                <option value="3">MEN-SLIPPERS</option>
                <option value="4">WOMEN-FLATS</option>
                <option value="5">WOMEN-HEELS</option>
                <option value="6">WOMEN-WEDGE</option>
                <option value="7">KIDS-RUBBER SHOES</option>
                <option value="8">KIDS-SLIPPERS(BOYS)</option>
                <option value="9">KIDS-SLIPPERS(GIRLS)</option>

            </select>
        </div>


        <div class="form-group col-md-3">
            <label>Size 1</label>
            <input type="number" name="Size1" class="loginforms" required="required" placeholder="30">
        </div>
        <div class="form-group col-md-3">
            <label>Size 2</label>
            <input type="number" name="Size2" class="loginforms" required="required" placeholder="31">
        </div>
        <div class="form-group col-md-3">
            <label>Size 3</label>
            <input type="number" name="Size3" class="loginforms" required="required" placeholder="32">
        </div>
        <div class="form-group col-md-3">
            <label>Size 4</label>   
            <input type="number" name="Size4" class="loginforms" required="required" placeholder="33">
        </div>

        <!-- <div class="form-group">
            <select name="Color">
                <option "1">Black</option>
                <option "2">White</option>
                <option "3">Gray</option>
            </select>
        </div> -->

         <input type="file" name="fileToUpload" />

        <input name="UsersID" type="hidden" value="<?php echo $_SESSION['UsersID'];?>"/>
    </div>
    <div class="col-md-5">
        <div class="form-group">
                <label>Details</label>
                <textarea name="Details" placeholder="Item Description" style="margin-top:10px;" rows="10"></textarea>
            </div>
    </div>
        <div class="col-md-12">
            <button type="Submit" class="btn btn-primary col-xs-12"> <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ITEM</button>
        </div>
        
    </form>
    <!-- END OF PRODUCT INSERTION FORM -->
    </div>   
</div>    


    <div id="ProductList" style="margin-top:10%;" class="col-md-12">
            
    </div>
</div>

       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.form.js"></script>


<!-- START OF LISTING THE PRODUCTS -->
<script>
    $(document).ready(function(){
                $.post("../Controller/Products/MerchantList.php",
                    
                    function(response){
                    $("#ProductList").html(response);
                    deleteProduct();
                    updateProduct();
                });

          

    });
</script>
<!-- END OF LISTING THE PRODUCTS -->

<!-- SCRIPT FOR INSERTING PRODUCTS -->
<script>
    $(document).ready(function(){

        $("#addProduct").ajaxForm(function(data){
            //You need the jquery.form.js to use this
                // alert(data);
                console.log(data);

                //After Inserting Repopulate the Product List
                $.post("../Controller/Products/MerchantList.php",
                    
                    function(response){
                    $("#ProductList").html(response);
                    
                });
                //End of Repopulating
        });

        
    });
</script>
<!-- END OF INSERTING PRODUCTS SCRIPT -->

   
</body>
</html>