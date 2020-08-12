  
$(document).ready(function() {
$('.burger-menu').click(function(event){
$('.burger-menu,.top-line,.center-line,.bot-line,.burger-menu-visible').toggleClass('active');   
      
});  
        
});


$(function(){
    $('.slider-inner').slick({
        nextArrow: '<button type="button" class="slick-next slick-btn"><p>v</p></button>',
        prevArrow: '<button type="button" class="slick-prev slick-btn"><p>v</p></button>'
    });  
});


$(document).ready(function() {
$('.stand-font').click(function(){
var el = $(this).attr('href');
el = el.replace(/[^\#]*/, '');
$('body,html').animate({
scrollTop: $(el).offset().top}, 1000);
return false;
});
});
