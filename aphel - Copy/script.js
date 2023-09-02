$(document).ready(function() {
  
  // from select products
  $("#search_products").keyup(function() {
       var name = $('#search_products').val();
       //Validating, if "name" is empty.
       if (name == "") {
           return false
       }
       else {
           $.ajax({
               type: "POST",
               url: "ajax.php",
               data: {
                   search_products: name
               },
               success: function(html) {
                 	$('.items-holder').hide();
                 	$('#search_results').html(html).show();
                   
               }
           });
         
       }
});
  
  $("#searchi").keyup(function() {
       var name = $('#searchi').val();
       //Validating, if "name" is empty.
       if (name == "") {
           return false
       }
       else {
           $.ajax({
               type: "POST",
               url: "ajax.php",
               data: {
                   search: name
               },
               success: function(html) {
                 	console.log(name)
                 	$('#order_table_body').html(html);
                 	$('.items_to_select').html(html);
                   $("#display").html(html).show();
                 	$('#search_results').html(html);
                   
               }
           });
         
       }
});
  
    $("#error").keyup(function() {
       var name = $('#error').val();
       //Validating, if "name" is empty.
       if (name == "") {
           return false
       }
       else {
           $.ajax({
               type: "POST",
               url: "ajax.php",
               data: {
                   searchpro: name
               },
               success: function(html) {
                 	console.log(name)
                 	$('#search_results').html(html);

               }
           });
         
       }
});
});