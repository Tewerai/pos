$(document).ready(function(){

    function onScanSuccess(decodedText, decodedResult) {
    // check if no inputs are empty
    if($('#product-name').val() ==""|| $('#price').val() ==""|| $('#product-description').val() ==""|| $('quantity').val()==""){
        alert('Please fill in  all values above')
    } else {
        
 // dealing with database
  $.ajax({
      url:"scan.php",
      method:"POST",
      data:{
          post_name: decodedText,
          product_name: $('#product-name').val(),
          stockPrice: $('#product-description').val(),
          price: $('#price').val(),
          quantity: $('#quantity').val()
      },
      dataType:"text",
      success:function(data)
      {
       alert('okay')
       $('#product-name').val(''),
       $('#product-description').val(''),
       $('#price').val(''),
       $('#quantity').val('')
      }
  });
    }

}

function onScanFailure(error) {
// handle scan failure, usually better to ignore and keep scanning.
// for example:
}

let html5QrcodeScanner = new Html5QrcodeScanner(
"reader",
{ fps: 10, qrbox: {width: 250, height: 250} },
 false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

$('a').hide();
// special code
$('special-code').click(function(){
  $('special-code').append('<h3>Enter Second Item Details</h3> <label>Product Name</label><input type="text" name="product_name" placeholder="product name" id="product-name" required/> <br/><label>Product Description (optional)</label><input type="text" name="product_description" placeholder="product description" id="product-description"/> <br/><label>Price</label><input type="text" name="price" placeholder="price" id="price" required/> <br/><label>Quantity</label><input type="text" name="product_description" placeholder="items quantity" id="quantity" required/> <br/>')
})

$('#code-error').click(function(){
      if($('#product-name').val() ==""|| $('#price').val() ==""|| $('#product-description').val() ==""|| $('quantity').val()==""){
        alert('Please fill in  all values above')
    }else{
$.ajax({
  url:"scan.php",
  method:"POST",
  data:{
          post_name:$('#product_serial').val(),
          product_name: $('#product-name').val(),
          stockPrice: $('#product-description').val(),
          price: $('#price').val(),
          quantity: $('#quantity').val()
  },
  dataType:"text",
  success:function(data)
  {
   alert('success');
   $('#error').val('');
    $('#product-name').val(''),
    $('#product-description').val(''),
    $('#price').val(''),
      $('#product_serial').val(''),
    $('#quantity').val('')

  }

})}

})
  var shopid= $('#goHome').val() ;
  $('#goHome').click(function(){window.location.href=`home.php?shopid=${shopid}`})

})
