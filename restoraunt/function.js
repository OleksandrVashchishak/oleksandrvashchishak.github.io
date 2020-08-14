$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      items: 4,
//      loop: false,
      autoHeight:true,
      navRewind: true,
      nav : true,
      navText : ["",""],
       margin:10,
    responsive:{
        0:{
            items:1,
            stagePadding: 70,
            margin:20,
            loop: true
        },
        360:{
            items:1,
            stagePadding: 80,
            margin:20,
            loop: true
        },
        405:{
            items:1,
            stagePadding: 100,
            margin: 20,
            loop: true
        },
        685:{
            items:2
        },
        940:{
            items:3
        },
        1250:{
            items:4
        }
    }
      
  });
   
});




//$(document).ready(function(){
//  $(".owl-carousel-one").owlCarousel({
//      items: 4,
//      loop: false,
//      autoHeight:true,
//      navRewind: true,
//      nav : true,
//      navText : ["",""],
//    responsive:{
//        0:{
//            items:1,
//            stagePadding: 70,
//        },
//        360:{
//            items:1,
//            stagePadding: 80,
//        },
//        405:{
//            items:1,
//            stagePadding: 100,
//        },
//        685:{
//            items:2,
//        },
//        940:{
//            items:3,
//        },
//        1250:{
//            items:4,
//        }
//    }
//      
//        });
//   
//});
