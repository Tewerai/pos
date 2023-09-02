/* Sticky Navigation */
$(function () {
  if ($('.owl-testimonials').length) {
    $('.owl-testimonials').owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      items: 1,
      margin: 30,
      autoplay: false,
      smartSpeed: 700,
      autoplayTimeout: 6000,
      responsive: {
        0: {
          items: 1,
          margin: 0
        },
        460: {
          items: 1,
          margin: 0
        },
        576: {
          items: 2,
          margin: 20
        },
        992: {
          items: 2,
          margin: 30
        }
      }
    });
  }
  if ($('.owl-partners').length) {
    $('.owl-partners').owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      items: 1,
      margin: 30,
      autoplay: false,
      smartSpeed: 700,
      autoplayTimeout: 6000,
      responsive: {
        0: {
          items: 1,
          margin: 0
        },
        460: {
          items: 1,
          margin: 0
        },
        576: {
          items: 2,
          margin: 20
        },
        992: {
          items: 4,
          margin: 30
        }
      }
    });
  }




  var sticky = $('.sticky');
  var contentOffset;
  var nav_height;

  if (sticky.length) {

    if (sticky.data('offset')) {
      contentOffset = sticky.data('offset');
    }
    else {
      contentOffset = sticky.offset().top;
    }
    nav_height = sticky.height();
  }

  var scrollTop = $(window).scrollTop();
  var window_height = $(window).height();
  var doc_height = $(document).height();

  $(window).bind('resize', function () {
    scrollTop = $(window).scrollTop();
    window_height = $(window).height();
    doc_height = $(document).height();
    navHeight();
  });

  $(window).bind('scroll', function () {
    stickyNav();
  });

  function navHeight() {
    sticky.css('max-height', window_height + 'px');
  }

  function stickyNav() {
    scrollTop = $(window).scrollTop();
    if (scrollTop > contentOffset) {
      sticky.addClass('fixed');
    }
    else {
      sticky.removeClass('fixed');
    }
  }
  $('.btn btn-primary').click(function () {

  })



});

$('document').ready(function () {

  
  var nav_height = 70;

  $("a[data-role='smoothscroll']").click(function (e) {
    e.preventDefault();

    var position = $($(this).attr("href")).offset().top - nav_height;

    $("body, html").animate({
      scrollTop: position
    }, 1000);
    return false;
  });
});

$('document').ready(function () {
  // Back to top
  var backTop = $(".back-to-top");

  $(window).scroll(function () {
    if ($(document).scrollTop() > 400) {
      backTop.css('visibility', 'visible');
    }
    else if ($(document).scrollTop() < 400) {
      backTop.css('visibility', 'hidden');
    }
  });

  backTop.click(function () {
    $('html').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
});


$('document').ready(function () {
    // Popovers

    // Page scroll animate
    new WOW().init();

    // school register form

  $('#grades_select').css({'visibility': 'hidden'});

  $('#school-table').hide();
  $('#primary_subjects_holder').hide();
  $('#senior_subjects_holder').hide();
  $('#languages_holder').hide();


  //primary
  $('#primary_grades').click(()=>{

    // select primary grades
    var inputs = document.querySelectorAll('#primary');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    // select primary subjects
    var inputs = document.querySelectorAll('#primary_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    let text = "";
    $('#school-table tr td').remove();
    for (let i = 1; i < 8; i++) {
      text += "<tr> <td>" + i + "</td> <td> <input type='number' name='classes[]' id='primary' value='i'></td> </tr>";
    }

    $('#school-table').append(text);
    $('#senior_subjects_holder').hide();
    $('#fet_subjects_holder').hide();




  })

  
  //secondary grades
  $('#secondary_grades').click(()=>{
    // select primary grades
    var inputs = document.querySelectorAll('#secondary');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    var inputs = document.querySelectorAll('#senior_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    let text = "";
    $('#school-table tr td').remove();

    for (let i = 8; i < 13; i++) {
      text += "<tr> <td>" + i + "</td> <td> <input type='number' name='classes[]' id='primary'></td> </tr>";
    }

    $('#school-table').append(text);
    var inputs = document.querySelectorAll('#secondary');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    $('#primary_subjects_holder').hide();
    


  })

  // all grades
  $('#all_grades').click(()=>{
    let text = "";
    $('#school-table tr td').remove();

    for (let i = 1; i < 13; i++) {
      text += "<tr> <td>" + i + "</td> <td> <input type='number' name='classes[]' id='primary'></td> </tr>";
    }

    $('#school-table').append(text)
    var inputs = document.querySelectorAll('#primary');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    var inputs = document.querySelectorAll('#secondary');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }

    var inputs = document.querySelectorAll('#primary_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }
    var inputs = document.querySelectorAll('#senior_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }
    var inputs = document.querySelectorAll('#fet_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = true;
    }
  })

  //
  $('.next').click(() => {
    $('#school-table').show();
    $('#form_I').css({'opacity': 0});

    
  })

  //school grades ad classes

  $('#individual_select_grade').click(() => {
    $('#grades_select').css({'visibility': 'visible' });
    $('.grades, .for').hide();
    $('.grades').checked = false;
    
    var inputs = document.querySelectorAll('#primary_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = false;
    }
    var inputs = document.querySelectorAll('#senior_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = false;
    }
    var inputs = document.querySelectorAll('#fet_subjects');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].checked = false;
      }

  })

  let grades = [];

  $(".check").click(function(){
   grades.push($(this).val());
   let text = "";
   $('#school-table tr td').remove();
   for (let i = 0; i < grades.length; i++) {
    text += "<tr> <td>" + grades[i] + "</td> <td> <input type='number' name='classes[]' id='primary'></td> </tr>";
  }
  $('#school-table').append(text);
  });

  // home and fal selection

  $('.languages_subjects').click(()=>{
    alert('Now Select FAL(s)')
    $('#languages_holder h5').text('FAL(s)');
  })

  // if primary && sec are selected i idividual selectio

  $('#primary').click(()=>  {$('#primary_subjects_holder').show(); $('#languages_holder').show()})
  $('#secondary').click(()=>  {$('#senior_subjects_holder').show(); $('#languages_holder').show()})
});


