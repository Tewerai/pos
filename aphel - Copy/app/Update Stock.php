<!DOCTYPE HTML >
<?php 
  include('dbcon.php');include('session.php');
  $admin = mysqli_query($con, "SELECT*FROM `owners` WHERE `shopid`='".$_SESSION['user_id']."'")or die('Error In Session1'.mysqli_error($con));
  $fetch = $admin->fetch_assoc();  
?>
<html>
<head>
      <script src="../js/jquery.min.js"></script>
</head>
<body>
  <input type="hidden" value="<?php echo $fetch['Admin Password']?>"; id="Admin"/>  
</body>
 <script>
        var admin = $("#Admin").val();
        let pass = prompt("Kindly Enter Admin Password");  
   		if(pass==admin){alert('sucess');window.location.href='update-stock.php';}
        else  if (pass ==null){window.location.href='updateStockC.php'}
  </script>
</html>