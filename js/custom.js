(function($){ 
  "use strict";


// ______________ MOBILE MENU

 $(function(){
       $('nav.mobile-menu').slicknav({
          closedSymbol: "&#8594;",
          openedSymbol: "&#8595;"
});
});  

// ______________ HOME PAGE WORDS ROTATOR
$("#js-rotating").Morphext({
    animation: "bounceInLeft",
    separator: ",",
    speed: 6000
}); 
$('#js-rotating').show();



// ______________ ANIMATE EFFECTS
var wow = new WOW(
  {
    boxClass:     'wow',
    animateClass: 'animated',
    offset:       0,
    mobile:       false 
  }
);
wow.init();

// ______________ DISCOUNT NUMBER - CALL TO ACTION ON HOME PAGE
jQuery(document).ready(function() {
$('.calltoactioninfo').waypoint(function() {

$('#discount')
  .prop('number', 0)
  .animateNumber(
    {
      number: 45
    },
    3000
  );

}, { offset: 800, triggerOnce: true });
});

// ______________ BONUS - CALL TO ACTION ON HOME PAGE
jQuery(document).ready(function() {
$('.calltoactioninfo').waypoint(function() {

$('#partners')
  .prop('number', 0)
  .animateNumber(
    {
      number: 15
    },
    3000
  );

}, { offset: 800, triggerOnce: true });
});


// ______________ LOVED BY DEVELOPERS NUMBER - CALL TO ACTION ON HOME PAGE
jQuery(document).ready(function() {
$('.testimonials .circle').waypoint(function() {

$('#lovedby')
  .prop('number', 0)
  .animateNumber(
    {
      number: 41169
    },
    3500
  );

}, { offset: 800, triggerOnce: true });
});

// TESTIMONIALS CAROUSEL_________________________ //   

$(document).ready(function() {
$("#testimonials-carousel").owlCarousel({ 
items : 1,
autoPlay: 7500,
transitionStyle : "backSlide",
itemsDesktop : [1199,1],
itemsDesktopSmall : [979,1],
itemsTablet: [768,1]});
});

$(document).ready(function() {
$("#blogslider").owlCarousel({
navigation : false,
slideSpeed : 300,
paginationSpeed : 400,
singleItem:true
});
});


// SMOOTH SCROLL________________________//

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

// ______________ BACK TO TOP BUTTON

$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('#back-to-top').fadeIn('slow');
    } else {
      $('#back-to-top').fadeOut('slow');
    }
  });
$('#back-to-top').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });


$(document).foundation();

})(jQuery);