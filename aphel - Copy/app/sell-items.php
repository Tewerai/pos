<!DOCTYPE html>
<?php
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


	// date part
    date_default_timezone_set("Africa/Johannesburg");
	// sms part
	require_once 'Twilio/autoload.php'; 
	use Twilio\Rest\Client; 
 
	$sid    = "AC7f2285d4b5724fdfa206438bf56"; 
	$token  = "da31e49766ac43088f32b791"; 

	//complete order part
	if (isset($_POST['complete'])) {
      
      if($_POST['price']==0){echo '<script>alert("error!")</script>';}
      
      else{

          /*UPDATE retailers history */
          $sqli= "UPDATE `retailers history`
          SET `order-status`='complete' WHERE `shopid`='".$_SESSION['user_id']."' AND
          `order-number`='".$_SESSION['order-number']."'";
          mysqli_query($con,$sqli) or die(mysqli_error($con));


          /*INSERT INTO COMPLETE ORDERS */
         $sql = "INSERT INTO `retailers complete orders`(`shopid`, `order-number`, `products`, `time`,`date`,`total`) VALUES 
         ('".$_SESSION['user_id']."','".$_SESSION['order-number']."',
         '".serialize($_POST['product_name'])."','".date("h:i:sa")."','$date','".$_POST['price']."')";
       mysqli_query($con,$sql) or die(mysqli_error($con));
      // complete order,'".."','".."'
         
      for ($i=0; $i <count($_POST['serial']) ; $i++) { 
         $sqli = "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' AND `serial id`='".$_POST['serial'][$i]."'";
         $result = mysqli_query($con,$sqli) ; 
         $fetch_result = $result->fetch_assoc();
   
           /*UPDATE AVAILABLE QUANTITY */
         $new_items_available = $fetch_result['quantity'] - 1;
           /*UPDATE AMOUNT SOLD */
        $items_sold = $fetch_result['amount sold'] + 1;
        /*UPDATE AMOUNT MADE */
        $rev = $fetch_result['product revenue']+$_POST['amount'][$i];
        
        /*UPDATE AVAILABLE QUANTITY */
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
   
      
   if (!$_POST['customer_number']=='') {
    $sid    = "AC7f2285d4b5724fdfa206438bf561713c"; 
   $twilio = new Client($sid, $token);
   $message = $twilio->messages 
                     ->create("+263".$_POST['customer_number'], // to 
                              array(  
                                  "messagingServiceSid" => "MGe98bb9671c1c01a15cc6d6f09c4e55af",      
                                  "body" => "You Bought From".$_SESSION['user_id']." \n".implode(' ',$_POST['product_name'])."\n total: ".$_POST['price']."\n powered by Blue Ichor" 
                              ) 
                     ); 
                     unset($_POST['complete']);
        } else{
          unset($_POST['complete']);

        }
        
     
}
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
       <!-- include the library -->
  	<script src="js/scanner.js" type="text/javascript"> </script>

    <title>Document</title>
</head>
<body>

    <div class="container">
        <div id="reader" ></div>
    </div>    
    <div id="failed-to-scan">
           <h3> Code Not Scanning?</h3> 
           <label>Code Number:</label> <input type="search"  id="error" name="product_serial"/>
     	 <div id="search_results">
           
      
      	</div>
           <button id='code-error'>okay</button>
      </div>

<form action="" method="post">
  <center>
<table id="customers" class="customers1">
  <tr>
    <th scope="col">Image</th>
    <th scope="col"> Name</th>
    <th scope="col">Price</th>
    <th scope="col">Action</th>
  </tr>
  <tbody id="orders">
  </tbody>
</table>
</center>

<center>
   enter customer number:<input type="text" name='customer_number' id='customerNumber' /> <br><br><br>
  <input type="submit" value="complete-order" name='complete' id='complete'/>
</center>
</form>
  <center>
   <a href="home.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Change</a>
   <a href="http://blueichor.org?total=<?php echo $_SESSION['total'];?>&type=shop" class="nav-item nav-link active" id="creditCheckOut"><i class="fa fa-tachometer-alt me-2"></i>Credit Card Checkout</a><br>
   <a href="home.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Go To Home</a>
 </center>
</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/app-sell.js"></script>
<script src="../script.js"></script>
<script>

</script>
</html>