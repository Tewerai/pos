<?php
//insert.php
include('session.php');

$con = mysqli_connect("localhost","root","12345678","blueicho_try");
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


if(isset($_POST["post_name"]))
{
 $connect = mysqli_connect("localhost","root","12345678","blueicho_try");
 // check if product exist
  $resul=mysqli_query($connect, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' 
   AND `serial id`='".$_POST['post_name']."'")
   or die('Error In Session1'.mysqli_error($connect));
   $go= $resul->fetch_assoc();
  	if($go!=null){echo '<script>alert("product already exists")</script>';}else{
     $spent =$_POST['quantity']*$_POST['stockPrice'] ;
    $sql = "INSERT INTO `retail products`(`name`, `shopid`, `description`, `price`, `serial id`,`quantity`,`amount sold`, `amount spent`, `stock price`, `product revenue`, `losses`,`rights`)
     VALUES ('".$_POST['product_name']."','".$_SESSION['user_id']."','test',
     '".$_POST['price']."','".$_POST['post_name']."','".$_POST['quantity']."','0','$spent','".$_POST['stockPrice']."','0','0','Admin')";
    mysqli_query($connect, $sql) or die('Error In Session 2'.mysqli_error($connect));
   }
}
if(isset($_POST['sell']))
{
   $timezone = date_default_timezone_get();
   $time = date("h:i:sa");
   $resul=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' 
   AND `serial id`='".$_POST['sell']."' ")
   or die('Error In Session 2'.mysqli_error($con));
   $go= $resul->fetch_assoc();
  	
  if($go==NULL) {return false;}else{
   $sqli = "INSERT INTO `retailers history`(`shopid`, `products`, `amount`, `customer-name`, `receipt-id`, `date`,`product-name`,`order-number`, `time`, `order-status`)
       VALUES ('".$_SESSION['user_id']."','".$_POST['sell']."','".$go['price']."','Keith','".$_SESSION['order-number']."','$date','".$go['name']."','".$_SESSION['order-number']."','$time','Pending')" or die(mysqli_error($con));
       mysqli_query($con,$sqli) or die(mysqli_error($con));
  }

}

if(isset($_POST['selly']))
{
   $timezone = date_default_timezone_get();
   $time = date("h:i:sa");
   $resul=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' 
   AND `serial id`='".$_POST['serry']."' ")
   or die('Error In Session 3'.mysqli_error($con));
   $go= $resul->fetch_assoc();
  	
  if($go==NULL) {return false;}else{
   $sqli = "INSERT INTO `retailers history`(`shopid`, `products`, `amount`, `customer-name`, `receipt-id`, `date`,`product-name`,`order-number`, `time`, `order-status`)
       VALUES ('".$_SESSION['user_id']."','".$_POST['serry']."','".$go['price']."','Keith','".$_SESSION['order-number']."','$date','".$go['name']."','".$_SESSION['order-number']."','$time','Pending')" or die(mysqli_error($con));
       mysqli_query($con,$sqli) or die(mysqli_error($con));
  }

}




/* REMOVE PENDING ITEM */
if(isset($_POST['id'])){
   $sqli= "UPDATE `retailers history`
       SET `receipt-id`='removed' WHERE `id`='".$_POST['id']."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));

}

/*UPDATE STOCK */


if(isset($_POST['update_stock'])){
  // Get current Amount Spent
  $resul=mysqli_query($con, "SELECT*FROM `retail products` where `id`='".$_POST['id']."'")
  or die('Error In Session 3'.mysqli_error($con));
  $go= $resul->fetch_assoc();

  //Set Amount Spent
  $spent=(int)$go['amount spent']+(int)$_POST['spent'];

     $sqli= "UPDATE `retail products`
       SET `name`='".$_POST['update_stock']."',`price`='".$_POST['price']."', `stock price`='".$_POST['stock_price']."',
       `quantity`='".$_POST['product_quantity']."',`amount spent`='$spent' WHERE `id`='".$_POST['id']."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));
  
  
}


if(isset($_POST['update_sold_stock'])){
     $sqli= "UPDATE `retail products`
       SET `name`='".$_POST['update_sold_stock']."',`price`='".$_POST['price']."', `stock price`='".$_POST['stock_price']."',
       `quantity`='".$_POST['product_quantity']."' WHERE `shopid`='".$_SESSION['user_id']."' AND `name`='".$_POST['update_sold_stock']."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));
  
  		// check order 
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
                  $_SESSION['order-number']=$order_number;
		      }else{
		         $_SESSION['order-number'] +=1;
		      }

  
  	  //insert into history table
  		
      
  	   $sqli = "INSERT INTO `retailers history`(`shopid`, `products`, `amount`, `customer-name`, `receipt-id`, `date`,`product-name`,`order-number`, `time`, `order-status`)
       VALUES ('".$_SESSION['user_id']."','".$_POST['productCode']."','".$_POST['price']."','n/a','".$_SESSION['order-number']."','".date("l jS \of F Y")."','".$_POST['update_sold_stock']."','".$_SESSION['order-number']."','".date("h:i:sa")."','complete')" or die(mysqli_error($con));
       mysqli_query($con,$sqli) or die(mysqli_error($con));
  
  	// update complete orders
  	$sql = "INSERT INTO `retailers complete orders`(`shopid`, `order-number`, `products`, `time`,`date`,`total`) VALUES 
      ('".$_SESSION['user_id']."','".$_SESSION['order-number']."',
      '".serialize([$_POST['update_sold_stock']])."','".date("h:i:sa")."','".date("l jS \of F Y")."','".$_POST['price']."')";
	  mysqli_query($con,$sql) or die(mysqli_error($con));
  
  $sqli= "UPDATE `retail products of the day`
    SET `order`='".(string)$_SESSION['order-number']."' WHERE `shopid`='".$_SESSION['user_id']."'";
    mysqli_query($con,$sqli) or die(mysqli_error($con));
  
}

if(isset($_POST['update_stock_with_loss'])){
  	  $sqli = "SELECT*FROM `retail products` where `id`='".$_POST['id']."' ";
      $result = mysqli_query($con,$sqli) ; 
      $fetch_result = $result->fetch_assoc();
  		
  	  $losses = $fetch_result['losses']+$_POST['difference'];
  
       $sqli= "UPDATE `retail products` SET `name`='".$_POST['update_stock_with_loss']."',`quantity`='".$_POST['product_quantity']."',`price`='".$_POST['price']."', 
       `stock price`='".$_POST['stock_price']."',`losses`='".$losses."' WHERE `shopid`='".$_SESSION['user_id']."' AND
       `name`='".$_POST['update_stock_with_loss']."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));
}

if(isset($_POST['add_stock_from_catalogue'])){
 $resul=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' 
   AND `serial id`='".$_POST['add_stock_from_catalogue']."' ")
   or die('Error In Session 3'.mysqli_error($con));
   $go= $resul->fetch_assoc();
  	
  if($go==NULL) {   
    $sqli = "INSERT INTO `retail products`(`name`, `shopid`, `description`, `price`, `serial id`, `quantity`, `amount sold`,
  `amount spent`, `stock price`, `product revenue`, `losses`) 
  VALUES ('".$_POST['product_name']."','".$_SESSION['user_id']."','','n/a',
  '".$_POST['add_stock_from_catalogue']."','n/a',
  '0','n/a','n/a','0','0')" 
    or die(mysqli_error($con));
       mysqli_query($con,$sqli) or die(mysqli_error($con));}
  else{
	return false;
  }

}

/*UPDATING UPLOAD HISTORY TABLE */
if(isset($_POST['updateHistory'])){
  $resul=mysqli_query($con, "SELECT*FROM `retail products` where `id`='".$_POST['id']."'") or die('Error In Session 3'.mysqli_error($con));
  $go= $resul->fetch_assoc();

  $sqli="INSERT INTO `update history`(`shopid`, `name`, `serial`, `date`, `updatee`, `former state`, `current state`, `time`,`spent`) VALUES ('".$_SESSION['user_id']."','".$go['name']."',
  '".$go['serial id']."','$date','".$_POST['catergory']."','".$_POST['formerState']."','".$_POST['updateHistory']."','".date('h:i:sa')."','".$_POST['spent']."')";

  mysqli_query($con,$sqli) or die(mysqli_error($con));
}

?>