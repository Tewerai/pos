<?php
include "../d.php";
include "scan.php";

if (isset($_POST['search'])) {
   $ame = $_POST['search'];
   $query = "SELECT*FROM `retail products` WHERE name LIKE '%$ame%' AND `shopid`='".$_SESSION['user_id']."'";
   $result = mysqli_query($con, $query);
   while ($row = $result->fetch_assoc()) {
       ?>
							<tr>
                                <td  id='product_name'><?php echo $row['name']?></td>
                                <td id='product_quantity'><?php echo $row['quantity']?></td>
                                <td  id='product_price'><?php echo $row['price']?></td>
                                <td  id='product_price'><?php echo $row['stock price']?></td>
                                <td><button id='edit'>Edit Column</button></td>
                                <input type="hidden" value="<?php echo $row['id']?>" id="qua"/>
                              </tr>
   <?php 
     #close if
     }} 

if (isset($_POST['search_products'])) {
   $ame = $_POST['search_products'];
   $query = "SELECT*FROM `regular products` WHERE name LIKE '%$ame%'";
   $result = mysqli_query($con, $query);
   while ($row = $result->fetch_assoc()) {
       ?>
			<div class="item-select" id="commodity" style="text-align:center;">
             <input type="checkbox" id="item-selected" value="<?php echo $row['serial id']?>" />
              
              <img src="<?php echo  $row['image url']?>" style="width:100%;height:100px;" />
              <p><?php echo  $row['name']?></p>
            </div>
   <?php 
     #close if
     }} 

if (isset($_POST['add_stock_price'])){
  	   $query = "SELECT*FROM `retail products` WHERE id='".$_POST['id']."'";
   	   $result = mysqli_query($con, $query);
  	   $row = $result->fetch_assoc();
  	   $price = 0 ;
       $price = $row['quantity']+$row['amount sold'];
       $price = $price*$_POST['add_stock_price'];
       $que = "UPDATE `retail products` SET  `amount spent`='$price',`stock price`='".$_POST['add_stock_price']."' where id=1";
  	   mysqli_query($con, $que);
}

if (isset($_POST['what_to_view'])){
  
	if($_POST['what_to_view']=='profits'){
    	$for_made_return=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND `order-status`='complete' ")or die('Error In Session 1'.mysqli_error($con));
     	$for_spent=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' ")or die('Error In Session 1'.mysqli_error($con));
     	$profit = 0;
     	$spent = 0;
      	while($row=$for_made_return->fetch_assoc()){
        $profit+=$row['amount'];
        }
      	while($r=$for_spent->fetch_assoc()){
        $spent+=$r['stock price'];
        }
      ?>
		
		    <thead>
            <tr class="text-white">
                <th scope="col">Amount Spent On Products</th>
                <th scope="col">Profits</th>
            </tr>
            </thead>
           <tbody>
             <tr class="text-white">
                <th scope="col">$<?php echo $spent;?></th>
                <th scope="col">$<?php echo $profit-$spent;?></th>
            </tr>
          </tbody>

<?php

       } else if($_POST['what_to_view']=='top_sellers'){
     $for_made_return=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND `order-status`='complete' ")or die('Error In Session 1'.mysqli_error($con));
     	$for_spent=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' ORDER BY `product revenue` DESC ")or die('Error In Session 1'.mysqli_error($con));
      ?>
		
		    <thead>
            <tr class="text-white">
                <th scope="col">Products Name</th>
                <th scope="col">Amount Sold</th>
              <th scope="col">Profits</th>
            </tr>
            </thead>
           <tbody>
             <?php while($row=$for_spent->fetch_assoc()){?>
             <tr class="text-white">
                <th scope="col"><?php echo $row['name'];?></th>
                <th scope="col"><?php echo $row['amount sold'];?></th>
                <th scope="col">$<?php echo $row['amount sold']*$row['price'];?></th>
            </tr>
            <?php }?>
          </tbody>

<?php
       
}
  	  else if($_POST['what_to_view']=='low_sellers'){
        $for_made_return=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND `order-status`='complete' ")or die('Error In Session 1'.mysqli_error($con));
     	$for_spent=mysqli_query($con, "SELECT*FROM `retail products` where `shopid`='".$_SESSION['user_id']."' ORDER BY `product revenue` ASC ")or die('Error In Session 1'.mysqli_error($con));
      ?>
		
		    <thead>
            <tr class="text-white">
                <th scope="col">Products Name</th>
                <th scope="col">Amount Sold</th>
              <th scope="col">Profits</th>
            </tr>
            </thead>
           <tbody>
             <?php while($row=$for_spent->fetch_assoc()){?>
             <tr class="text-white">
                <th scope="col"><?php echo $row['name'];?></th>
                <th scope="col"><?php echo $row['amount sold'];?></th>
                <th scope="col">$<?php echo $row['amount sold']*$row['price'];?></th>
            </tr>
            <?php }?>
          </tbody>

<?php
       }
  	  else if($_POST['what_to_view']=='recent'){
          $total=0;
          $jsDateTS = strtotime($_POST['date']);
          $date = date('l jS \of F Y', $jsDateTS );
          $products_of_the_day=mysqli_query($con, "SELECT*FROM `retailers complete orders` where `shopid`='".$_SESSION['user_id']."' AND
  `date`='$date'")or die('Error In Session 1'.mysqli_error($con));
  
      ?>
		
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Receipt Id</th>
                                    <th scope="col">Items</th>
                                </tr>
                            </thead>
           <tbody>
 <?php  while($roww= $products_of_the_day->fetch_assoc()){$total += $roww['total'];?>
                              <tr>
                                <td><?php echo $roww['date']?></td>
                                <td><?php echo $roww['total']?></td>
                                <td><?php echo $roww['order-number']?></td>
                                <td><?php $items  = unserialize($roww['products']); echo $items[0];$x = 1; while($x <= count($items)) {  echo "<br>$items[$x] <br>";  $x++;
}?></td>
                              </tr>
                              <script>$('#dayTotal').html(<?php echo $total?>)</script>
             <?php }?>
          </tbody>

<?php
       
}
}

if (isset($_POST['searchpro'])) {
   $ame = $_POST['searchpro'];
   $query = "SELECT*FROM `retail products` WHERE name LIKE '%$ame%' AND `shopid`='".$_SESSION['user_id']."'";
   $result = mysqli_query($con, $query);
   while ($row = $result->fetch_assoc()) {
       ?>
           <input type="text" value="<?php echo $row['name']?>" id="code-err" readonly/>
			<input type="hidden" value="<?php echo $row['serial id']?>" id="code-err" readonly/>
   <?php }}

  if (isset($_POST['add_stock_price_with_onchange'])) {
	$sqli = "UPDATE `retail products` SET `stock price`='".$_POST['add_stock_price_with_onchange']."' WHERE `id`='".$_POST['id']."'";
    mysqli_query($con, $sqli);
  }       


  if (isset($_POST['add_sell_price_with_onchange'])) {
	$sqli = "UPDATE `retail products` SET `price`='".$_POST['add_sell_price_with_onchange']."' WHERE `id`='".$_POST['id']."'";
    mysqli_query($con, $sqli);
  }       

 if (isset($_POST['add_product_with_onchange'])) {
	$sqli = "UPDATE `retail products` SET `quantity`='".$_POST['add_product_with_onchange']."' WHERE `id`='".$_POST['id']."'";
    mysqli_query($con, $sqli);
  }    

  if (isset($_POST['add_stock_prize'])) {
  $query = "SELECT*FROM `retail products`  WHERE `id`='".$_POST['id']."'";
   $result = mysqli_query($con, $query);
    $res = $result->fetch_assoc();
    $spent = $res['quantity']*$res['stock price'];
	$sqli = "UPDATE `retail products` SET `amount spent`='$spent' WHERE `id`='".$_POST['id']."'";
    mysqli_query($con, $sqli);
  }     

	if (isset($_POST['add_stock_prize_two'])) {
   $sqli = "UPDATE `retail products` SET `quantity`='".$_POST['productq']."' WHERE `id`='".$_POST['id']."' ";
    mysqli_query($con, $sqli);
  $query = "SELECT*FROM `retail products`  WHERE `id`='".$_POST['id']."'";
   $result = mysqli_query($con, $query);
    $res = $result->fetch_assoc();
    $spent = $res['quantity']*$res['stock price'];
	$sqli = "UPDATE `retail products` SET `amount spent`='$spent' WHERE `id`='".$_POST['id']."'";
    mysqli_query($con, $sqli);
  }  
?>


    <script src="../js/jquery.min.js"></script>
			<script>
var err = document.querySelectorAll('#code-err');

for (let i = 0; i < err.length; i++){
    err[i].addEventListener('click',er,false);    
}

		function er(){
          
      var sell = $(this).val();
      var serial = $(this).next().val();
    $.ajax({
        url:"scan.php",
        method:"POST",
        data:{
            selly: sell,
          	serry: serial,
            product_name: $('#product-name').val(),
        },
        dataType:"text",
        success:function(data)
        {
         $('#error').val('');
		 $('#search_results').html('');
		 console.log(serial);
        }

  })}
$(document).ready(function(){
          	 
  edit_column = document.querySelectorAll('#edit');

 for (var i = 0; i < edit_column.length; i++) {
 edit_column[i].addEventListener('click',edit,false);
 }
            /*EDIT FUNCTION*/
            function edit(ev){
            ev.preventDefault();
            //get text of colums
             var product_name = $(this).parent().prev().prev().prev().prev().text();
             var product_price = $(this).parent().prev().prev().text();
             var stock_price = $(this).parent().prev().text();
             var product_quantity = $(this).parent().prev().prev().prev().text();
             var product_id = $(this).parent().next().val();

             $(this).closest('tr').html(`<td><input type="text" value="${product_name}" id="im"/></td><td><input type="number" value="${product_quantity}" id="q"/></td><td><input type="number" value="${product_price}" id="price" /></td><td><input type="number" value="${stock_price}" id="stocked" /></td><td><button id='changes'>Upload Changes</button><input type="hidden" value="${product_id}" id="productId"/></td>`);



             
             /*UPLOAD CHANGES*/
            $('#changes').click(function(){
              var lost =product_quantity-$("#q").val();

             if($("#q").val()<product_quantity){
               let person = prompt("How The Items Leave:\n 1. Was Sold. \n 2.Loss (damaged or other)");
               if (person == 1) {               
               $.ajax({ 
              url:"scan.php",method:"POST",
               data:{
               update_stock: $("#im").val(),
               product_quantity: $("#q").val(),
               price:$("#price").val(),
               stock_price: $("#stocked").val(),
               spent:0,
               id: product_id,
               },              
               dataType:"text",
               success:function(data){ alert('right'); location.reload()}})   
    
  } else if (person == 2){
    		   $.ajax({ 
               url:"scan.php",
               method:"POST",
               data:{
               update_stock_with_loss: $("#im").val(),
               id:$('#productId').val(),
               product_quantity: $("#q").val(),
               price:$("#price").val(),
               stock_price: $("#stocked").val(),
               difference: lost,
               },              
               dataType:"text",
               success:function(data){ alert('right'); location.reload()}})
      

            
            }
  		}else{

              var newItems = $("#q").val()-product_quantity;
              var spent =newItems*stock_price;
              alert(spent)
                             
               $.ajax({ 
              url:"scan.php",
               method:"POST",
               data:{
                update_stock: $("#im").val(),
               product_quantity: $("#q").val(),
               price:$("#price").val(),
               stock_price: $("#stocked").val(),
               spent:spent,
               id: product_id,
               },              
               dataType:"text",
               success:function(data){ alert('right'); location.reload()}
            })
               }
            })

            /*UPLOAD TO `UPDATE HISTORY` TABLE*/
            $('#im').change(function(){

            //if name is changed
            $.ajax({ 
              url:"scan.php",
               method:"POST",
               data:{
               id:$('#productId').val(),
               updateHistory: $("#im").val(),
               catergory:'name',
               formerState: product_name,
               spent:0,
               },              
               dataType:"text",
               success:function(data){ alert('right'); location.reload()}
            })
            })

            //if quantity is changed
            $('#q').change(function(){
            //calculate new spents
            var spent = 1;
            if($("#q").val()>product_quantity){
                spent = $("#q").val()-product_quantity;
                spent*=stock_price;
            }
                $.ajax({ 
              url:"scan.php",
               method:"POST",
               data:{
               id:$('#productId').val(),
               updateHistory: $("#q").val(),
               catergory:'quantity',
               formerState: product_quantity,
               spent:spent,

               },              
               dataType:"text",
               success:function(data){ }
            })
               
            })

            //if price is changed
            $('#price').change(function(){
                $.ajax({ 
              url:"scan.php",
               method:"POST",
               data:{
               id:$('#productId').val(),
               updateHistory: $("#price").val(),
               catergory:'price',
               formerState: product_price,
               spent:0,               },              
               dataType:"text",
               success:function(data){ }
            })
               
            })
            // if stock price is changed

            $('#stocked').change(function(){
                $.ajax({ 
              url:"scan.php",
               method:"POST",
               data:{
               id:$('#productId').val(),
               updateHistory: $("#stocked").val(),
               catergory:'stock price',
               formerState: stock_price,
               spent:0,
               },              
               dataType:"text",
               success:function(data){ }
            })
            })
           
          }
          /*END OF EDIT FUNCTION*/


})
              
              	 var item = document.querySelectorAll('#item-selected');

	for (let i = 0; i < item.length; i++){
	    item[i].addEventListener('click',add,false);    
}
	function add(e){
    var serial = $(this).val() ;
    var product_name = $(this).next().next('p').text(); 
    console.log(serial);
    // dealing with database
    $.ajax({
        url:"scan.php",
        method:"POST",
        data:{
            add_stock_from_catalogue: serial,
          	product_name: product_name ,
        },
        dataType:"text",
        success:function(data)
        {
        }
    });
   $(this).closest('.item-select').hide();
  }
  
            
              
			</script>
