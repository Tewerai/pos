<!DOCTYPE html>
<html lang="en">
<?php 
    $we = htmlspecialchars($_GET["shopid"]);
  	$_SESSION['user_id'] = $we;
  include('session.php'); include('dbcon.php'); 
// 
$date= date("l jS \of F Y");
$result=mysqli_query($con, "SELECT*FROM `retail products of the day` where `shopid`='".$_SESSION['user_id']."' 
AND `date`='$date' ")
or die('Error In Session 1'.mysqli_error($con));
$row= $result->fetch_assoc();

if($row==NULL){
          $order_number = 1;
          // what to do 

          //$_SESSION['order-number'] = $new_order_number;
          $sqli= "INSERT INTO `retail products of the day`(`shopid`, `order`,  `date`) 
          VALUES ('".$_SESSION['user_id']."','$order_number','$date')";
          mysqli_query($con,$sqli) or die(mysqli_error($con));
      }else{
         $_SESSION['order-number'] = $row['order'];
      }

    
    $sqli = mysqli_query($con,"SELECT*FROM `owners` WHERE `shopid`='".$_SESSION['user_id']."'");
  
    $row= $sqli->fetch_assoc();
  	$sql = mysqli_query($con,"SELECT*FROM `retail products` WHERE `shopid`='".$_SESSION['user_id']."'");
    $go= mysqli_fetch_all($sql);
  	$count_products = count($go);
  
	// mula made
  	$date= date("l jS \of F Y");
  
   $result=mysqli_query($con, "SELECT*FROM `retailers complete orders` where `shopid`='".$_SESSION['user_id']."' AND
  `date`='$date' ")or die('Error In Session 1'.mysqli_error($con));
  
  $products_of_the_day=mysqli_query($con, "SELECT*FROM `retailers complete orders` where `shopid`='".$_SESSION['user_id']."' AND
  `date`='$date'  ")or die('Error In Session 1'.mysqli_error($con));
  
   $resul=mysqli_query($con, "SELECT*FROM `retail products of the day` where `shopid`='".$_SESSION['user_id']."' AND
  `date`='$date'")or die('Error In Session1'.mysqli_error($con));
   $total = 0; 
   $today_sold= mysqli_fetch_assoc($resul);
   $count_today_sold = $today_sold['order'];
   while($r= $result->fetch_assoc()){ $total += $r['total'];}

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="../js/jquery.min.js"></script>

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
        <!-- Spinner Start --
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
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
                    <a href="select_from.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Stock</a>
                    <a href="Update Stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Update Stock</a>
                    <a href="stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>View Stock</a>
                    <a href="sell-items.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Sell Items</a>
                  <?php 
                  $render_stock_price_int = 0 ;
                  	for($i=0;$i<=$count_products;$i++){
                    	if($go['stock price'][$i]==0) $render_stock_price_int++;
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
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
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

          
          			            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <input type='date' id="dt" value="<?php echo date('Y-m-d'); ?>"  />
                        <select id="mySelect" >
  							<option value="recent">Recent Orders</option>
  							<option value="profits">Profit Margins</option>
  							<option value="top_sellers">Top Sellers</option>
  							<option value="low_sellers">Low Sellers</option>
						</select>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="tay">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Receipt Id</th>
                                    <th scope="col">Items</th>
                                </tr>
                            </thead>
                          	<tbody>
                              <?php  while($roww= $products_of_the_day->fetch_assoc()){?>
                              <tr>
                                <td><?php echo $roww['date']?></td>
                                <td><?php echo $roww['total']?></td>
                                <td><?php echo $roww['order-number']?></td>
                                <td><?php if($roww['total']==0 ) { echo "error!can't load items";}
                                else if($roww['total']>0){$items  = unserialize($roww['products']); echo $items[0];$x = 1; while($x <= count($items)) {  echo "<br>$items[$x] <br>";  $x++;}}?></td>
                              </tr>
                              <?php }?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Orders Complete</p>
                                <h6 class="mb-0" id="orders"><?php echo $count_today_sold-1?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0" id="dayTotal"><?php echo $total?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Available Stock</p>
                                <h6 class="mb-0"><?php echo $count_products?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Feedback</p>
                                <h6 class="mb-0">No Data In Yet</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
             <canvas id="myChart" style="width:100%;max-width:600px;"></canvas>
            <!-- Sales Chart End -->



        </div>
        <!-- Content End -->


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
  
  <script>
  <?php 
        $two_days_ago=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND
  `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `order-status`='complete'")or die('Error In Session 1'.mysqli_error($con));
    
       $two_days_ago6=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));

    $two_days_ago7=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
    $two_days_ago8=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
	$two_days_ago9=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
	$two_days_ago10=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
	$two_days_ago11=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
	$two_days_ago12=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago13=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_3%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago14=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_4%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago15=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_5%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago16=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago17=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago18=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago19=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago20=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago21=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$two_days_ago22=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y',strtotime("-2 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));


    	$yesterday=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND
  		`date`='".date('l jS \of F Y',strtotime("-1 days"))."' AND `order-status`='complete'")or die('Error In Session 1'.mysqli_error($con));
    
     	$yesterday6=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));

    	$yesterday7=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
    	$yesterday8=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday9=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday10=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday11=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday12=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday13=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_3%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday14=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_4%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday15=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_5%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday16=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday17=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday18=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday19=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday20=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday21=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$yesterday22=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."'AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
    	$today6=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));

    	$today7=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
    	$today8=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today9=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '0%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today10=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today11=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today12=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today13=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_3%' AND 
       `date`='".date('l jS \of F Y',strtotime("-1 days"))."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today14=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_4%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today15=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_5%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today16=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_6%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today17=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_7%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today18=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_8%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today19=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '1%' AND `time` LIKE '_9%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today20=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_0%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today21=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_1%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));
    
		$today22=mysqli_query($con, "SELECT * FROM `retailers history` WHERE `time` LIKE '2%' AND `time` LIKE '_2%' AND 
       `date`='".date('l jS \of F Y')."' AND `shopid`='".$_SESSION['user_id']."'")or die('Error In Session 1'.mysqli_error($con));



    ?>
var xValues = ['06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00']
new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [<?php $zero=0; while($row=$two_days_ago6->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago7->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago8->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago9->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago10->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago11->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago12->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago13->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago14->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago15->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago16->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago17->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago18->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago20->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago21->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$two_days_ago22->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>],
      borderColor: "red",
      fill: false,
      label:'2 days ago'
    }, { 
      data: [<?php $zero=0; while($row=$yesterday6->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday7->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday8->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday9->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday10->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday11->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday12->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday13->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday14->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday15->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday16->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday17->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday18->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday20->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday21->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$yesterday22->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>],
      borderColor: "green",
      fill: false,
      label:'yesterday'
    }, { 
      data: [<?php $zero=0; while($row=$today6->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today7->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today8->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today9->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today10->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today11->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today12->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today13->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today14->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today15->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today16->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today17->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today18->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today19->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today20->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today21->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>,
             <?php $zero=0; while($row=$today22->fetch_assoc()){$zero+=$row['amount'];} echo $zero; ?>],
      borderColor: "blue",
      fill: false,
      label:'today'
    }]
  },
  options: {
    legend: {display: false}
  }
});
  </script>
</body>

</html>