function checkWidth(init) {
    if ($(window).width() < 480) {
      $('#navigationId').remove().insertBefore($('header'));
      $('ul').addClass('navbar-nav');
      $('nav').removeClass('navResponsive');
    } else {
      $('#navigationId').remove().insertAfter($('header'));
      $('nav').addClass('navResponsive');
      $('ul').removeClass('navbar-nav');
    }
  }

  $(document).ready(function() {
    checkWidth(true);
  
    $(window).resize(function() {
      checkWidth(true);
    });
  });
  