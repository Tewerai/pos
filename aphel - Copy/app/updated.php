<?php
	include('session.php');
	$con = mysqli_connect("localhost","root","12345678","blueicho_try");
	
	$result=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND
 `receipt-id`='".$_SESSION['order-number']."' AND `date`='$date' ")or die('Error In Session1'.mysqli_error($con));


	while($row= $result->fetch_assoc()){
      	$update_result=mysqli_query($con, "UPDATE `retail products` SET `amount spent`='".$row['quantity']."' ")or die('Error In Session1'.mysqli_error($con));

    	
    }
?>