(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    
    $(".add").click(function () { 
        $('#real-checks').append('<tr><td><input type="checkbox" checked></td><td><input type="text" name="menu-category[]" placeholder="enter category name"></td>');
})
  



    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});
		
  		var xValues = [100,200,300,400,500,600,700,800,900,1000];


	$('#drinks').hide();
    $('#dry_grocery').hide();
  
  	 var item = document.querySelectorAll('#item-selected');

	for (let i = 0; i < item.length; i++){
	    item[i].addEventListener('click',add,false);    
}
	function add(e){
    var serial = $(this).val() ;
    var product_name = $(this).next().next('p').text(); 
    console.log(product_name);
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
          alert('success');
        }
    });
   $(this).closest('.item-select').hide();
  }
  
   var to_edit = document.querySelectorAll('#mySelect');

            for (var i = 0; i < to_edit.length; i++) {
            to_edit[i].addEventListener('change',edit,false);
            }
            // edit colum
          function edit(ev){
            		var what_to_view = $(this).val()
                    var date = $('#dt').val();
	                $.ajax({
        			url:"ajax.php",
        			method:"POST",
        			data:{
        			    what_to_view: what_to_view,
                        date: date,
        			},
        			dataType:"text",
        			success:function(html)
        			{
                      $('#tay').html(html);
        			}
 			 })
            }
  
  		$('#catalogue').click(function(){
        	window.location.replace("select-items.php");
        })
  
  			$('#add').click(function(){
        	window.location.replace("add-items.php");
        })
  
  			$('#done').click(function(){
        	window.location.replace("add-stock-price.php");
        })
  
  		   $('#dt').change(function(e){
        	  var date  = e.target.value;
              var what_to_view = 'recent';
              $.ajax({
              url:"ajax.php",
              method:"POST",
              data:{
                  what_to_view: what_to_view,
                  date: date,
              },
              dataType:"text",
              success:function(html)
              {
                $('#tay').html(html);
              }
        })
        })
          
         
})(jQuery);

