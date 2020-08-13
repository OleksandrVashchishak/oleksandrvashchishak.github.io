$(document).ready(function(){
   
    
    
  $(".owl-carousel").owlCarousel({
      items: 4,
      loop: false,
      
      navRewind: true,
      nav : true,
      navText : ["",""],
    responsive:{
        0:{
            items:2,
        },
        940:{
            items:3,
        },
        1250:{
            items:4,
        }
    }
      
  });
   
});
const slider = $('#slider');


$('#arrow-lef').click(function(){
   slider.trigger('next.owl.carousel');
});

$('#arrow-righ').click(function(){
   slider.trigger('prev.owl.carousel');
});