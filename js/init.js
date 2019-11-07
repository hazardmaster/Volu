(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.tabs').tabs();
    $('select').formSelect();
    $('.parallax').parallax();
     $('.carousel').carousel();
     $('.dropdown-trigger').dropdown();
     $('.carousel.carousel-slider').carousel({
  
    fullWidth: true,
    indicators: true,
    
  });
  autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
      

  }); // end of document ready
})(jQuery); // end of jQuery name space
