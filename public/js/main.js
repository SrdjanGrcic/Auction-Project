function checkWidth(init) {
    if ($(window).width() < 480) {
      $('#navigationId').remove().insertBefore($('header'));
      $('nav').removeClass('navResponsive');
      $('#navigationId').addClass('bg-light');
    } else {
      $('#navigationId').remove().insertAfter($('.info'));
      $('#navigationId').removeClass('bg-light');
      $('nav').addClass('navResponsive');
    }
  }

  $(document).ready(function() {
    checkWidth(true);
  
    $(window).resize(function() {
      checkWidth(true);
    });
  });
  
  document.getElementById("footerYear").innerHTML = new Date().getFullYear();

  function ConfirmDelete(){
    return confirm("Delete stamp?");
}