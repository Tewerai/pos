<?php
//Including Database configuration file.
include "../d.php";
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $ame = $_POST['search'];
//Search query.
   $query = "SELECT*FROM `retail products` WHERE name LIKE '%$ame%'";
//Query execution
   $result = mysqli_query($con, $query);
//Creating unordered list to display result.
   //Fetching result from database.
   while ($row = $result->fetch_assoc()) {
       ?>
  		 <tr>
           <td id='product_name'><?php echo $row['name']?></td>
           <td id='product_q'><?php echo $row['quantity']?></td>
           <td id='product_price'><?php echo $row['price']?></td>
           <td id='product_revenue'><?php $pass = $row['amount sold']*$row['price']; echo $pass?></td>
           <td id='product_sold'><?php echo $row['amount sold']?></td>
           <td><button id='edit'>Edit Column</button></td>
         </tr>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}
}
?>
