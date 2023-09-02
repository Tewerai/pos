<!DOCTYPE html>
<html lang="en">
<?php 
  include('session.php'); 
  include('dbcon.php'); 
    $we = htmlspecialchars($_GET["shopid"]);

  	$commodity = mysqli_query($con,"SELECT*FROM `regular products` WHERE `type`='Commodity'");
  	$drinks = mysqli_query($con,"SELECT*FROM `regular products` WHERE `type`='Drinks'");
  	$dry_grocery = mysqli_query($con,"SELECT*FROM `regular products` WHERE `type`='Dry Grocery'");


   //serialize reecipts 
?>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Aphel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $row['shop'] ;?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="home.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Analytics</a>
                    <a href="update-stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Update Stock</a>
                    <a href="stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>View Stock</a>
                    <a href="sell-items.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Sell Items</a>
                    <a href="add-items.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Stock</a>
                  <?php 
                  $render_stock_price_int = 0 ;
                  	for($i=0;$i<=$count_products;$i++){
                    	if($go['stock price'][$i]=='')$render_stock_price_int++;
                    }
                  if($render_stock_price_int!=0) echo '<a href="add-items.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Stock Price</a>';
                  ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Messages From Your Customers Will Appear Here</h6>
                                        <small></small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">No notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $row['shop'];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
          
          <!-- ITEMS TO SELECT -->
          <input class="form-control bg-dark border-0" id="search_products" type="search" placeholder="@search here..."/> <br><br>
                  
          <br><br>
          <div class="items_to_select">
            <div class="items-holder" id="search_results"> </div>
       <h3 style="text-align:center;">Commodity</h3><br>
       <div class="items-holder">
          
          <?php while($row=$commodity->fetch_assoc()){?>
            
            <div class="item-select" id="commodity" style="text-align:center;">
             <input type="checkbox" id="item-selected" value="<?php echo $row['serial id']?>" />
              
              <img src="<?php echo  $row['image url']?>" style="width:100%;height:100px;" />
              <p><?php echo  $row['name']?></p>
            </div>
		<?php } ?>

     </div>
      
      	<br><br>
          <h3 style="text-align:center;">Drinks</h3><br>
          <div class="items-holder">
          <?php while($row=$drinks->fetch_assoc()){?>
            
            <div class="item-select" id="commodity" style="text-align:center;">
             <input type="checkbox" id="item-selected" value="<?php echo $row['serial id']?>" />
              
              <img src="<?php echo  $row['image url']?>" style="width:100%;height:100px;" />
              <p><?php echo  $row['name']?></p>
            </div>
		<?php } ?>

        </div>
  
  		<br><br>
          <h3 style="text-align:center;">DRY GROCERY</h3><br>
          <div class="items-holder">
          <?php while($row=$dry_grocery->fetch_assoc()){?>
            
            <div class="item-select" id="commodity" style="text-align:center;">
             <input type="checkbox" id="item-selected" value="<?php echo $row['serial id']?>" />
              
              <img src="<?php echo  $row['image url']?>" style="width:100%;height:100px;" />
              <p><?php echo  $row['name']?></p>
            </div>
		<?php } ?>

        <center><div id="done" style="width:100%; height:50px; border-radius:8px; background:aqua; position:fixed; bottom:0; left:0;"><text style="
            position:relative; top:26%;">  <h4>Done</h4> </text></div></center><br><br>
          </div>
        <!-- Content End -->
          </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- Template Javascript -->
    <script src="../script.js"></script>
</body>

</html>