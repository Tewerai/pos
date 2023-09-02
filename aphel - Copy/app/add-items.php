<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- include the library -->
  <script src="js/scanner.js" type="text/javascript"> </script>
	
    
    <title>Add Items</title>
</head>

<body>
    <div id="container">
        <div id="details">
        <label>Product Name</label><input type="text" name="product_name" placeholder="product name" id="product-name" required/> <br/>
        <label>Stock Price</label><input type="number" name="stockPrice" placeholder="stockPrice" id="product-description" required/> <br/>
        <label>Sell Price</label><input type="number" name="price" placeholder="price" id="price" required/> <br/>
        <label>Quantity</label><input type="number" name="product_description" placeholder="items quantity" id="quantity" required/> <br/>
        </div>
        <div id="reader" width="600px"></div><br><br><hr>
        <div id="failed-to-scan">
           <h3> Code Not Scanning?</h3> 
           <label>Code Number:</label> <input type="text"  id="product_serial"/>
            <button id='code-error'>okay</button>
          <br><br><hr>

        </div>
                <center>
        <button href="home.php?shopid='<?php echo $_SESSION["user_id"] ?>'" style="display: block;" id='goHome'>Go Home </button>
      </center>
      <input type='hidden' value="<?php echo $_SESSION["user_id"] ?>" id="goHome" />
    </div>
</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/app.js"></script>
  
</html>