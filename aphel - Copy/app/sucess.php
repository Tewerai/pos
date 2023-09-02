<?php 
include('scan.php');

	date_default_timezone_set("Africa/Johannesburg");
	// sms part
	require_once 'Twilio/autoload.php'; 
	use Twilio\Rest\Client; 
 
	$sid    = "ACcc36c15e80441a5ad2a6cd24b721004a"; 
	$token  = "0932ecd3de79526d9470e12a97f02aa8"; 
	$twilio = new Client($sid, $token); 
	  $sqli= "UPDATE `retailers history`
       SET `order-status`='complete' WHERE `shopid`='".$_SESSION['user_id']."' AND
       `order-number`='".$_SESSION['order-number']."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));
      
      $sql = "INSERT INTO `retailers complete orders`(`shopid`, `order-number`, `products`, `time`,`date`,`total`) VALUES 
      ('".$_SESSION['user_id']."','".$_SESSION['order-number']."',
      '".serialize($_POST['product_name'])."','".date("h:i:sa")."','$date','".$_POST['price']."')";
	  mysqli_query($con,$sql) or die(mysqli_error($con));
   // complete order,'".."','".."'
      
   for ($i=0; $i <count($_POST['serial']) ; $i++) { 
      $sqli = "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' AND `serial id`='".$_POST['serial'][$i]."'";
      $result = mysqli_query($con,$sqli) ; 
      $fetch_result = $result->fetch_assoc();

      $new_items_available = $fetch_result['quantity'] - 1;
     $items_sold = $fetch_result['amount sold'] + 1;
     $rev = $fetch_result['price']+$_POST['amount'][$i];
     
       $sqli= "UPDATE `retail products`
       SET `quantity`='".$new_items_available."' , `amount sold`= '$items_sold', `product revenue`= '".$rev."' WHERE `shopid`='".$_SESSION['user_id']."' AND
       `serial id`='".$_POST['serial'][$i]."'";
       mysqli_query($con,$sqli) or die(mysqli_error($con));
   }
    //set order number
    $_SESSION['order-number'] +=1;
    $sqli= "UPDATE `retail products of the day`
    SET `order`='".(string)$_SESSION['order-number']."' WHERE `shopid`='".$_SESSION['user_id']."'";
    mysqli_query($con,$sqli) or die(mysqli_error($con));
    /*$message = $twilio->messages 
	        ->create("+263".$_POST['customer_number'], // to 
	                  array(  
	                      "messagingServiceSid" => "MG6f1ddb8697303debcd79e562eff655ee",      
	                      "body" => "You Bought From".$_SESSION['user_id']." \n".implode(' \n',$_POST['product_name'])."\n total ".$_POST['price']." powered by Apheliea"
	                  ) 
	                  ); */
    unset($_POST['complete']);
	header('Location: sell-items.php');

?>