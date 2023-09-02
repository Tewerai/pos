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
      <input type="text" name="ownersName" placeholder="Jack" />
      <input type="text" name="ownersSurname"  placeholder="Doe" />
      <input type="email" name="email" id="email" placeholder="email@xyz.com" />
      <input type="tel" name="tel" id="tel" placeholder="0782679098" />
      Operating Country: <select name="country">
        <option>United States Of America</option>
        <option>South Africa</option>
        <option>Zimbabwe</option>
      </select><br><br>
      <input type="password" name="pass" placeholder="set your password" />
      <input type="submit" name="login" class="next action-button" value="Next" />
    </fieldset>
  </form>

</body>

</html>

  <?php
	if (isset($_POST['login']))
		{
			$shop_id = mysqli_real_escape_string($con, $_POST['email']);
			$ownerName = mysqli_real_escape_string($con, $_POST['ownersName']);
			$ownerSurname = mysqli_real_escape_string($con, $_POST['ownersSurname']);
			$tel = mysqli_real_escape_string($con, $_POST['tel']);
			$country = mysqli_real_escape_string($con, $_POST['country']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
      
      		// check if email exists
      		$query 		= mysqli_query($con, "SELECT * FROM `owners` WHERE `shopid`='$shop_id'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row == 0 ) 
				{
                $query = mysqli_query($con, "INSERT INTO `owners`(`shop`, `name`, `surname`, `email`, `tel`, `shopid`, `password`, `shopType`,`country`) VALUES 
          		('$shop_id','$ownerName','$ownerSurname','$shop_id','$tel','$shop_id','$password','shop','$country')" ) or die('Error In Session 1'.mysqli_error($con));
          
			$_SESSION['user_id']=$shop_id;
			header('location:home.php?shopid='.$_SESSION['user_id']);
       }
      else{
        echo '<script>alert("Cannot use this email adress. Email address already exists")</script>';
        return false;
            		
            }
			
		
                    
		}
  ?>
 
  
