<?php 
include('scan.php');
$date= date("l jS \of F Y");
$result=mysqli_query($con, "SELECT*FROM `retailers history` where `shopid`='".$_SESSION['user_id']."' AND
 `receipt-id`='".$_SESSION['order-number']."' AND `date`='$date' ")or die('Error In Session1'.mysqli_error($con));
$_SESSION['order-number']
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>

 <?php $total = 0; while($row= $result->fetch_assoc()){ $total += $row['amount']; $_SESSION['total']=$total ?>

             <tr id="me" class="text-white">
             <td></td>
             <td><input type="text" value="<?php echo $row['product-name']?>" name="product_name[]" readonly/></td>
             <td><input type="text" value="<?php echo $row['amount']?>" name="amount[]" readonly/></td>
             <input type="text" value="<?php echo $row['id']?>" name="id[]" hidden/>
             <td> <button id="clear" value="<?php echo $row['id']?>"> Remove </button> </td>
             </tr>
             <input type="text" value="<?php echo $row['products']?>" name="serial[]" hidden/>

 <?php } ?>
 <table id="customers" class="customers1">
  <tr>
    <th scope="col">Total</th>
    <th scope="col">$ <input type="number" value="<?php  echo $total ;?>" name="price" id="total" readonly/> </th>
  </tr>

</table>
 </body>
 <script src="../js/jquery.min.js"></script>
 <script>
  var clear = document.querySelectorAll('#clear');

for (let i = 0; i < clear.length; i++){
    clear[i].addEventListener('click',remove,false);    
}
function remove(e){
    e.preventDefault();
    var price = parseInt($(this).parent().prev().text()); 
    var total = parseInt($('#total').val()) - price;
  	var id = $(this).val();
    $(this).closest('#me').hide();
    $('#total').val(total);
    // dealing with database
    $.ajax({
        url:"scan.php",
        method:"POST",
        data:{
            id: id,
        },
        dataType:"text",
        success:function(data)
        {
        }
    });
  }

 </script>
 </html>


