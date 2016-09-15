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
        <a class="navbar-brand" href="DashBoard2.php"><img src="../images/headerIMG/logo.png" alt=""></a>
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
								<li><a href="UserUpdate.php"><i class="fa fa-user"></i>Hi : <?php echo $_SESSION['UserName'];?></a></li>
								 <?php if($_SESSION['Role'] == 2){?>
                                    <li><a href="Admin.php"><i class="fa fa-briefcase"></i>Pending Items</a></li>
                                    <li><a href="DashboardAdmin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href="Transaction.php"><i class="fa fa-calendar-o"></i>Transaction</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Dashboard2.php"><i class="fa fa-briefcase"></i>Inventory</a></li>
                                    <li><a href="DashboardMerchant.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 0){?>
                                    <li><a href="Dashboard.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
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

<div class="productListView"><!-- productListView -->
    <div class="container">
        
        <div class="row hideme"  style="margin-top:10%;">
            <div class="col-xs-2">
                <ul class="mysidebar">
                    <li><a href="#" id="customer">CUSTOMER</a></li>
                    <li><a href="#" id="orders">ORDERS</a></li>
                    <li><a href="#" id="products">PRODUCTS</a></li>
                </ul>
            </div>
            <div class="col-xs-10">
                <div id="productList"></div>
            </div>
            



        </div>


       


    </div>


    

</div><!-- end of productListView -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="hideme" aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">MERCHANT REPORT</h4>
      </div>
      <div class="modal-body" id="ReportModal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary hideme" onclick="print()">PRINT</button>
        <button type="button" class="btn btn-primary hideme" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>

       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>

<script src="../js/jquery.form.js"></script>
<script>
  $(document).ready(function(){

    
      //You need the jquery.form.js to use this
        // alert(data);
        

        //After Inserting Repopulate the Product List
        $.post("../Controller/Dashboard/MerchantCustomerList.php",
                
                function(response){
                $("#productList").html(response);
                    
            });
            //End of Repopulating

         $("#customer").on('click',function(){
            $.post("../Controller/Dashboard/MerchantCustomerList.php",
                
                function(response){
                $("#productList").html(response);
                    
            });

         });

         $("#products").on('click',function(){
            $.post("../Controller/Dashboard/MerchantProductsList.php",
                
                function(response){
                $("#productList").html(response);
                    
            });
            
         });

         $("#orders").on('click',function(){
            $.post("../Controller/Dashboard/MerchantOrderList.php",
                
                function(response){
                $("#productList").html(response);
                    
            });
            
         });
   
   

    
  });
</script>

<script>
// 	  $.post("../Controller/Dashboard/CustomerList.php",
                    
//                     function(response){
//                     $("#productList").html(response);
                     
                     
//                 });

// 	  $.post("../Controller/Dashboard/MerchantList.php",
                    
//                     function(response){
//                     $("#productList2").html(response);
//                     reports();
                     
//                 });

// function reports(){
// 	 $(document).ready(function(){
// 	  		$(".reports").ajaxForm(function(data){
// 	  			$("#ReportModal").html(data);
// 	  			$('#myModal').modal('show');
// 	  		});


// 	  });

// }
	 

	  // $('#myModal').modal('toggle');
	  
</script>
	
<script>
function deleteProduct()
{

    $(document).ready(function(){
        $(".admindecissionno").ajaxForm(function(data){
            //You need the jquery.form.js to use this
                // alert(data);
                console.log(data);
            //THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
            $.post("../Controller/Dashboard/CustomerList.php",
                    
                    function(response){
                    $("#productList").html(response);
                     
                     
                });
            //END OF RE POPULATING WITHOUT REFRESHING.
                
        });

    });
}
</script>

<script>
function updateProduct()
{
    $(document).ready(function(){
        $(".admindecissionyes").ajaxForm(function(data){
            //You need the jquery.form.js to use this
                // alert(data);
                console.log(data);
            //THEN WE RE POPULATE THE PRODUCT LIST AFTER DELETING
            $.post("../Controller/Products/AdminList.php",
                    
                    function(response){
                    $("#productList").html(response);
                     deleteProduct(); 
                     updateProduct();
                });
            //END OF RE POPULATING WITHOUT REFRESHING.
                
        });

    });
}
</script>
   
</body>
</html>