if (document.querySelector(".home-slider__slider")) {
  $(".home-slider__slider").slick({
    slidesToShow: 1,
    infinite: true,
    arrows: false,
    dots: false,
    asNavFor: '.home-slider__dots'
  });


  $(".home-slider__dots").slick({
    slidesToShow: 3,
    infinite: true,
    arrows: false,
    dots: false,
    asNavFor: '.home-slider__slider',
    focusOnSelect: true
  });


  let dotsInner = document.querySelectorAll(".home-slider__dots-item");
  let dotsHome = document.querySelectorAll(".home-slider .slick-dots button");
  for (let i = 0; i < dotsHome.length; i++) {
    dotsHome[i].innerHTML = dotsInner[i].innerHTML;
  }
}
if (document.querySelector(".customslider")) {
  var $status = $('.customslider .pagingInfo span.cp1');
  var $status1 = $('.customslider .pagingInfo  span.cp2');
  var $slickElement = $('.customslider .slider-centermode');

  $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
      if (slick.slideCount < 10) {
          var i = (currentSlide ? currentSlide : 0) + 1;
          $status.text('0' + i);
      } else {
          var i = (currentSlide ? currentSlide : 0) + 1;
          $status.text(i);
      }

      if (slick.slideCount < 10) {
          var i = (currentSlide ? currentSlide : 0) + 1;
          $status1.text(' 0' + slick.slideCount);
      } else {
          var i = (currentSlide ? currentSlide : 0) + 1;
          $status1.text(slick.slideCount);
      }

  });

  $slickElement.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      focusOnSelect: true,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
      speed: 1000,
      centerPadding: '20%',
      responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              centerPadding: 0,
          }
      }]
  });
}
