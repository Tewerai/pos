  $(document).ready(function(){
  
  function onScanSuccess(decodedText, decodedResult) {
// dealing with database
$.ajax({
url:"scan.php",
    method:"POST",
    data:{
        sell: decodedText,
        product_name: $('#product-name').val(),
    },
    dataType:"text",
    success:function(data)
    {
      alert('okay')
    }
});
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


$('#test').click(function(){
    // dealing with database
    $.ajax({
        url:"scan.php",
        method:"POST",
        data:{
            complete: 'order-success',
        },
        dataType:"text",
        success:function(data)
        {
        }
    });

})

var clear = document.querySelectorAll('#clear');

for (let i = 0; i < clear.length; i++){
clear[i].addEventListener('click',remove,false);    
}
function remove(){
var price = parseInt($(this).parent().prev().text()); 
var total = parseInt($('#total').val()) - price;
$(this).closest('#me').hide();
$('#total').val(total);
// dealing with database
$.ajax({
    url:"scan.php",
    method:"POST",
    data:{
        id:$(this).val(),
    },
    dataType:"text",
    success:function(data)
    {
     
    }
});
}

$('#comply').click(function(){
// dealing with database
$.ajax({
    url:"scan.php",
    method:"POST",
    data:{
        complete: 'order-complete',
    },
    dataType:"text",
    success:function(data)
    {
    }
});

})

$('#code-error').click(function(){
$.ajax({
    url:"scan.php",
    method:"POST",
    data:{
        sell: $('#error').val(),
        product_name: $('#product-name').val(),
    },
    dataType:"text",
    success:function(data)
    {
     $('#error').val('');

    }

});})

$('#code-err').click(function(){
$.ajax({
    url:"scan.php",
    method:"POST",
    data:{
        sell: $(this).val(),
        product_name: $('#product-name').val(),
    },
    dataType:"text",
    success:function(data)
    {
      alert('okay')
     $('#error').val('');

    }

});})
$('#creditCheckOut').click(function(e){
e.preventDefault();
let val = $(this).val()
if($('#customerNumber').val().length===10){
      window.location.href='refer.php?total=val';
}else  {
  alert('invalid phone number');
}
})
setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
$('#orders').load("items-scanned.php").fadeIn("slow");
//load() method fetch data from fetch.php page
}, 100);
// completi
$('#complete').click(function(){

    $(this).hide();
})

})
