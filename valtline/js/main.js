$(document).ready(function(){
	$('.header__btn').click(function(event) {
    $('.header__btn,.list__item,.header__list').toggleClass('active');
    $('.header__btn').toggleClass('rotate');
    
  });

  $(".list__item").click(function() {
    $('.list__item').removeClass('active');
    $(this).toggleClass('active');
  });

    
    /* Slick slider */ 

  $('.slider-for').slick({
    arrows: false,
    autoplay: false,
    slidesToShow: 3,
    dots: false,
    responsive: [
        {
            breakpoint: 993,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
        }
    ]
  });
  $('.slider-for').on('afterChange', function(event, slick, currentSlide, nextSlide){
    if(currentSlide == 0) {
      $('.number__item').removeClass('current');
      $('.number__item--one').addClass('current');
    }
    else if(currentSlide == 1) {
      $('.number__item').removeClass('current');
      $('.number__item--two').addClass('current');
    }
    else {
      $('.number__item').removeClass('current');
      $('.number__item--three').addClass('current');
    }
  });

  $('.number__item--one').click(function(event){
    $('.slider-for').slick('goTo', 0);
  });

  $('.number__item--two').click(function(event){
    $('.slider-for').slick('goTo', 1);
  });

  $('.number__item--three').click(function(event){
    $('.slider-for').slick('goTo', 2);
  });

  /*** Button more  ***/

  $(".nextstep__gallery").click(function() {
    $('.card').show();
  });

  $(".nextstep__gallery").click(function() {
    $('.card').show();
  });

  $(".excursion__nextstep").click(function() {
    $('.excursion__text--first').toggleClass('text-shadow');
    $('.excursion__text--hide').fadeToggle();
  });

  /*** Category  ***/

  $("#alfabetico").click(function() {
    $('.category__item').hide();
    $('.category__first').show();
  });

  $("#top10").click(function() {
    $('.category__item').hide();
    $('.category__top').show();
  });

  $("#sports").click(function() {
    $('.category__item').hide();
    $('.category__sports').show();
  });

  $("#inverno").click(function() {
    $('.category__item').hide();
    $('.category__inverno').show();
  });

  $("#estate").click(function() {
    $('.category__item').hide();
    $('.category__estate').show();
  });

  $("#autunno").click(function() {
    $('.category__item').hide();
    $('.category__autunno').show();
  });

  $("#primavera").click(function() {
    $('.category__item').hide();
    $('.category__primavera').show();
  });

  /* hotels accordeon */
  


  function checkPosition() {
    if (window.matchMedia('(max-width: 993px)').matches) {
      $('.hotels__title').click(function(){
        $(this).next('.hotels__accordion').slideToggle(1000);
      });

      /*** Categories ***/
      $('.sort__item').click(function(){
        $('.sort__item').removeClass('current');
        $(this).toggleClass('current');
        $(this).next('.alphabet-mobile').slideToggle(500);
      });

    }

    if (window.matchMedia('(min-width: 993px)').matches) {
      $('.sort__item').click(function(){
        $('.sort__item').removeClass('current');
        $(this).toggleClass('current');
      });

      $('#alfabetico').click(function(){
        $('.sort__item').removeClass('current');
        $(this).toggleClass('current');
        $('.alphabet-pc').toggleClass('active');
      });
    }
  }

  checkPosition();


  $(window).scroll(function(){

    if ($(window).scrollTop() < 600) {
      $('.card__link').removeClass('hover');
    }
    if ($(window).scrollTop() > 700) {
      $('.card__link').removeClass('hover');
      $('.card:nth-child(1) .card__link').addClass('hover');
    }
    if ($(window).scrollTop() > 1000) {
        $('.card__link').removeClass('hover');
        $('.card:nth-child(2) .card__link').addClass('hover');       
    }
    if ($(window).scrollTop() > 1200) {
      $('.card__link').removeClass('hover');
      $('.card:nth-child(3) .card__link').addClass('hover'); 
    }
    if ($(window).scrollTop() > 1400) {
      $('.card__link').removeClass('hover');
      $('.card:nth-child(4) .card__link').addClass('hover'); 
    }
    if ($(window).scrollTop() > 1600) {
      $('.card__link').removeClass('hover');
      $('.card:nth-child(5) .card__link').addClass('hover'); 
    }
    if ($(window).scrollTop() > 1700) {
      $('.card__link').removeClass('hover');
      $('.card:nth-child(6) .card__link').addClass('hover'); 
    }
});


  


     

      


  

});