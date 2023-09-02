<!DOCTYPE html>
<?php 
	include('session.php');include('dbcon.php');
	$result=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' AND `stock price`=''")or
      die('Error In Session1'.mysqli_error($con));

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Stock</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <script src="../js/jquery.min.js"></script>

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
                    <a href="stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>View Stock</a>
                    <a href="update-stock.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Update Stock</a>
                    <a href="sell-items.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Sell Items</a>
                    <a href="add-items.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Stock</a>
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
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
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
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                  <tr class="text-white">
                                  <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Stock Price</th>
                                    <th scope="col">Sell Price</th>
                                    <th scope="col">Currently Available In Stock</th>
                                    <th scope="col">Action</th>                                    
                                </tr>
                            </thead>
                            <tbody id="order_table_body">
							<?php  while($row= $result->fetch_assoc()){  
							  $pic=mysqli_query($con, "SELECT*FROM `regular products` where `serial id`='".$row['serial id']."'")or die('Error In Session1'.mysqli_error($con));
                              $fetch_pic = $pic->fetch_assoc();?>
                              <tr>
                                
                                <td  id='product_image'><?php echo "<image src='".$fetch_pic['image url']."' style='width:50px;height:50px;'/>"?><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                                <td  id='product_name'><?php echo $row['name']?><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                                <td id='stock-price'><input type="text" id="stock_price"/><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                                <td id='sell-price'><input type="text" id="sell_price"/><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                                <td id='product_quantity'><input type="text" id="product_quantity"/><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                                <td><button id='save'>Save</button><input type="hidden" id="id" value="<?php echo $row['id']?>"/></td>
                              </tr>
                              <?php }?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
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
        $(document).ready(function(){
          	 
              var stockPrice   = document.querySelectorAll('#stock_price');
              var sellPrice    = document.querySelectorAll('#sell_price');
              var productQua   = document.querySelectorAll('#product_quantity');
              var edit_column = document.querySelectorAll('#save');
          
          		

            for (var i = 0; i < edit_column.length; i++) {
            stockPrice[i].addEventListener('change',stock,false);
            sellPrice[i].addEventListener('change',sell,false);
            productQua[i].addEventListener('change',productQ,false);
            edit_column[i].addEventListener('click',edy,false);
            }
          
          	function stock(e){
              var id = $(this).next('#id').val() ;
              console.log(id,);
          		 $.ajax({
        			url:"ajax.php",
        			method:"POST",
        			data:{
        			    add_stock_price_with_onchange: this.value,
                      	id: id,
        			},
        			dataType:"text",
        			success:function(data,html)
        			{
                    }
  					})
            }
          
          	function sell(e){
              		var id = $(this).next('#id').val() ;              		
                    $.ajax({
        			url:"ajax.php",
        			method:"POST",
        			data:{
        			    add_sell_price_with_onchange: this.value,
                        id: id,
        			},
        			dataType:"text",
        			success:function(data,html)
        			{
                    }
  					})
            }
          	function productQ(e){
              		var id = $(this).next('#id').val() ;
                    $.ajax({
        			url:"ajax.php",
        			method:"POST",
        			data:{
        			    add_product_with_onchange: this.value,
                        id: id,
        			},
        			dataType:"text",
        			success:function(data,html)
        			{
                    }
  					})
            }
            // edit colum
          function edy(ev){     
            var id = $(this).next('#id').val();
            var productq = $(this).parent().prev().find('#product_quantity').val();
           // var stockPrice = $(this).parent().prev().prev().prev().val();
           // var sellPrice = ;
                    $.ajax({
        			url:"ajax.php",
        			method:"POST",
        			data:{
        			    add_stock_prize_two: this.value,
                        productq: productq,
                      	id: id,
        			},
        			dataType:"text",
        			success:function(data,html)
        			{
                    }
  					})
            		$(this).closest('tr').hide();            
            }
          
         
})
    </script>

   
</body>

</html>