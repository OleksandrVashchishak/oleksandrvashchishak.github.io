if (document.querySelector(".our-work__slider")) {
  $(".our-work__slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    centerMode: true,
    dots: false,
    arrows: true,
    responsive: [
      {
        breakpoint: 766,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: false,
        },
      },  
    ],
  });

document.querySelector('.our-work__btn-prev').addEventListener('click', () => {
document.querySelector('.our-work__slider .slick-prev.slick-arrow').click()
})
document.querySelector('.our-work__btn-next').addEventListener('click', () => {
document.querySelector('.our-work__slider .slick-next.slick-arrow').click()
})

}