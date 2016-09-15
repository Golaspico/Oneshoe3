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
    <link href="../assets/css/croppie.css" rel="stylesheet">
    
   

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
        <?php if($_SESSION['Role'] == 2){?>
        <a class="navbar-brand" href="Admin.php"><img src="../images/headerIMG/logo.png" alt=""></a>
        <?php }else if ($_SESSION['Role'] == 1){?>
        <a class="navbar-brand" href="Dashboard2.php"><img src="../images/headerIMG/logo.png" alt=""></a>    
        <?php }else{ ?>
        <a class="navbar-brand" href="../index.php"><img src="../images/headerIMG/logo.png" alt=""></a>  
        <?php }?>    
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
                                <?php if($_SESSION['Role'] == 2){?> 
								    <li><a href="Admin.php"><i class="fa fa-briefcase"></i>Pending Items</a></li>
                                    <li><a href="DashboardAdmin.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
                                    <li><a href="Transaction.php"><i class="fa fa-calendar-o"></i>Transaction</a></li>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <li><a href="Dashboard2.php"><i class="fa fa-briefcase"></i>Inventory</a></li>
                                    <li><a href="DashboardMerchant.php"><i class="fa fa-briefcase"></i>Dashboard</a></li>
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
    if(!isset($_SESSION)){
        session_start();
    }
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "oneshoe";
            // Create connection
            $conn = new mysqli($servername, $username, $password,$dbname);

   $valUsername=  $_SESSION['UserName'];
   $myUsersID = $_SESSION['UsersID'];

   $sql="SELECT * FROM `users` WHERE `UsersID`='$myUsersID'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();

?>
<div class="productListView"><!-- productListView -->
    <div class="container">
        <div class="row" style="margin-top:10%;">
            <div class="col-md-4 col-md-offset-4">
                <center><img src="<?php echo $row['Profile'];?>" width="100" height="100"/></center>
                <center><button class="btn btn-success capsule" data-target="#modalcroppie" data-toggle="modal" style="margin-bottom: 30px; width:300px;">Upload Profile Image</button></center>

            </div>

        </div>
        <div class="row">
        <form action="#" id="UpdateForm" method="post">
            <div class="col-md-3">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" name="UserName" id="username" value="<?php echo $valUsername;?>" class="loginforms" required="required"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" name="Password" id="password1" value="" class="loginforms"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>RETYPE PASSWORD</label>
                    <input type="password" name="Password1" id="password2" value="" class="loginforms"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>ADDRESS</label>
                    <input type="text" name="Address" id="address" value="<?php echo $row['Address'];?>" class="loginforms" required="required"/>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-7 col-md-offset-4">
                    <button class="btn btn-primary magicbtn col-md-3" type="submit">UPDATE</button>

                                <?php if($_SESSION['Role'] == 2){?>
                                    <a href="Admin.php" class="btn btn-primary magicbtn col-md-3 col-md-offset-1">BACK</a>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 1){?>
                                    <a href="Dashboard2.php" class="btn btn-primary magicbtn col-md-3 col-md-offset1" >BACK</a>
                                <?php }?>
                                <?php if($_SESSION['Role'] == 0){?>
                                    <a href="../index.php" class="btn btn-primary magicbtn col-md-3 col-md-offset-1">BACK</a>
                                <?php }?>
                </div>
            </div>
        </form>    
        </div>



    </div>

 <!--    <div class="paginationWrapper">
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


<!-- Modal -->
<div class="modal fade" id="modalcroppie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Profile Image</h4>
            </div>
            <div class="modal-body">
                <div id="upload-demo" class="croppie-container">

                </div>
                <form action="../Controller/Users/UpdateProfilePicture.php" id="form" method="post" enctype="multipart/form-data" style="margin-top:0px;margin-bottom:0px;">
                    <center><input type="file" id="upload" value="Choose a file"></center>
                    <div id="upload-demo"></div>
                    <input type="hidden" id="imagebase64" name="imagebase64">
                    <center><a href="#" class="upload-result btn btn-primary capsule" style="margin-top: 30px; width:300px;">Send</a></center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default capsule" style="width:200px;" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->

       



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../js/jquery.form.js"></script>
<script src="../assets/js/croppie.js"></script>

<!--    croppie Section-->
<script type="text/javascript">
    $( document ).ready(function() {
        var $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    });
                    $('.upload-demo').addClass('ready');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload').on('change', function () { readFile(this);
//                $('#modalcroppie').modal('show');


        });
        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'original'
            }).then(function (resp) {
                $('#imagebase64').val(resp);
                $('#form').submit();
            });
        });

    });
</script>


<script>
    $("#UpdateForm").submit(function(){
          if($("#password1").val() == "" && $("#password2").val() == "")
          {
                    $.post("../Controller/Users/UpdateWithoutPassword.php",
                    $(this).serialize()
                    ,function(response){
                    $("#username").fadeOut(1000);
                    $("#password1").fadeOut(1000);
                    $("#password2").fadeOut(1000);
                    $("#address").fadeOut(1000);
                    $("#username").fadeIn(1000);
                    $("#password1").fadeIn(1000);
                    $("#password2").fadeIn(1000);
                    $("#address").fadeIn(1000);
                });

            //Update the Others
            return false;
          }else if($("#password1").val() == $("#password2").val())
          {
            $.post("../Controller/Users/UpdateProfile.php",
                    $(this).serialize()
                    ,function(response){
                    $("#username").fadeOut(1000);
                    $("#password1").fadeOut(1000);
                    $("#password2").fadeOut(1000);
                    $("#address").fadeOut(1000);
                    $("#username").fadeIn(1000);
                    $("#password1").fadeIn(1000);
                    $("#password2").fadeIn(1000);
                    $("#address").fadeIn(1000);
                });
                return false;
            //Change the Password and the Others
          }else if($("password1").val() != $("#password2").val())
          {
            alert("Password does not match");
          }
        return false;
    });
</script>



   
</body>
</html>