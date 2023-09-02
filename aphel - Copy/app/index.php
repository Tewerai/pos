<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
  <title>Register</title>
</head>

<body>
  <!-- multistep form -->
  <form id="msform" action="" method="post">

    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Shop Details</h2>
      <input type="email" name="shopid" id="email" placeholder="email@xyz.com" />
      <input type="password" name="pass" id="phone-number" placeholder="password" />
      <input type="submit" name="login" class="next action-button" value="Next" />
    </fieldset>
  </form>

</body>

</html>

  <?php
	if (isset($_POST['login']))
		{
			$shop_id = mysqli_real_escape_string($con, $_POST['shopid']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM `owners` WHERE  password='$password' and `shopid`='$shop_id'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0 ) 
				{	
              		if($row['shopType']=='shop'){
                      
					$_SESSION['user_id']=$row['shopid'];
					header('location:home.php?shopid='.$_SESSION['user_id']);
                    }else if($row['shopType']=='largeShop'){
                      
					$_SESSION['user_id']=$row['shopid'];
					header('Location:http://buy.blueichor.org/app/buy/app/buy/app/home.php?shopid='.$_SESSION['user_id']);
                    }
					
				}
			else
				{
					echo '<h3>Invalid Username and Password Combination</h3>';
				}
		}
  ?>
 
  
