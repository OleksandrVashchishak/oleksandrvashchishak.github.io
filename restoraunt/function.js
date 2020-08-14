$(document).ready(function(){
   
    
    
  $(".owl-carousel").owlCarousel({
      items: 4,
      loop: false,
      autoHeight:true,
      navRewind: true,
      nav : true,
      navText : ["",""],
    responsive:{
        0:{
            items:1,
            stagePadding: 70,
        },
        360:{
            items:1,
            stagePadding: 80,
        },
        405:{
            items:1,
            stagePadding: 100,
        },
        685:{
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
const activeEls = $('.owl-item.active');

$('#arrow-lef').click(function(){
   slider.trigger('next.owl.carousel');
});

$('#arrow-righ').click(function(){
   slider.trigger('prev.owl.carousel');
});





//owl.on('changed.owl.carousel', function() {
//
//    activeEls = $('.owl-item.active');
//    console.log("adsd");
//    setCarouselCaption( activeEls[1] ); 
//
//});

// console.log(activeEls);