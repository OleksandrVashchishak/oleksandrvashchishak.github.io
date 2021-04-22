// start bunners sliders
if (document.querySelector(".slider-bunner")) {
  $(".slider-bunner__left-slider").slick({
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5500,
  });

  $(".slider-bunner__right-slider").slick({
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5500,
  });
}
// end bunners sliders

// start welcome slider
if (document.querySelector(".welcome__slider-js")) {
  $(".welcome__slider").slick({
    dots: false,
    autoplay: true,
    autoplaySpeed: 5500,
    prevArrow: '<div class="slick-prev slick-arrow"></div>',
    nextArrow: '<div class="slick-next slick-arrow"></div>',
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".welcome__slider-current-slide").text(currentSlide);
  };

  $(".welcome__slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });
  let countClonedSlide = 0;
  let CountSlide = document.querySelectorAll(".welcome__slider-item");
  for (let i of CountSlide) {
    if (i.classList.contains("slick-cloned")) {
      countClonedSlide++;
    }
  }

  let allCountSlide = CountSlide.length - countClonedSlide;
  $(".welcome__slider-all-slide").text(allCountSlide);

  $(".welcome__slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end welcome slider

// start about first slider
if (document.querySelector(".about__first-slider")) {
  $(".about__first-slider").slick({
    dots: false,
    autoplay: true,
    autoplaySpeed: 5500,
    prevArrow: '<div class="slick-prev slick-arrow"></div>',
    nextArrow: '<div class="slick-next slick-arrow"></div>',
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".about__first-slider-current-slide").text(currentSlide);
  };

  $(".about__first-slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });
  let countClonedSlide = 0;
  let CountSlide = document.querySelectorAll(".about__first-slider-item");
  for (let i of CountSlide) {
    if (i.classList.contains("slick-cloned")) {
      countClonedSlide++;
    }
  }

  let allCountSlide = CountSlide.length - countClonedSlide;
  $(".about__first-slider-all-slide").text(allCountSlide);

  $(".about__first-slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end about first slider

// start about two slider
if (document.querySelector(".about__two-slider")) {
  $(".about__two-slider").slick({
    dots: false,
    autoplay: true,
    autoplaySpeed: 5500,
    prevArrow: '<div class="slick-prev slick-arrow"></div>',
    nextArrow: '<div class="slick-next slick-arrow"></div>',
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".about__two-slider-current-slide").text(currentSlide);
  };

  $(".about__two-slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });
  let countClonedSlide = 0;
  let CountSlide = document.querySelectorAll(".about__two-slider-item");
  for (let i of CountSlide) {
    if (i.classList.contains("slick-cloned")) {
      countClonedSlide++;
    }
  }

  let allCountSlide = CountSlide.length - countClonedSlide;
  $(".about__two-slider-all-slide").text(allCountSlide);

  $(".about__two-slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end about two slider

// start tabs slider
if (document.querySelector(".tabs-sliders")) {
  let mediaSlidesToShow = 4;
  if (window.matchMedia("(max-width: 460px)").matches) {
    mediaSlidesToShow = 1;
  } else if (window.matchMedia("(max-width: 766px)").matches) {
    mediaSlidesToShow = 2;
  } else if (window.matchMedia("(max-width: 1098px)").matches) {
    mediaSlidesToShow = 3;
  }
  for (let i = 1; i <= 5; i++) {
    $(".tabs-sliders__slider-" + String(i)).slick({
      slidesToShow: mediaSlidesToShow,
      slidesToScroll: mediaSlidesToShow,
      dots: false,
      arrows: true,
      infinite: false,
      prevArrow: '<div class="slick-prev slick-arrow"></div>',
      nextArrow: '<div class="slick-next slick-arrow"></div>',
    });

    let currentSlide;
    const updateSliderCounter = (slick) => {
      currentSlide = slick.slickCurrentSlide() + 1;
      $(".tabs-sliders__slider-current-slide-" + String(i)).text(
        Math.ceil(currentSlide / mediaSlidesToShow)
      );
    };

    $(".tabs-sliders__slider-" + String(i)).on("init", (slick) => {
      updateSliderCounter(slick);
    });
    let countClonedSlide = 0;
    let countSlide = document.querySelectorAll(
      ".tabs-sliders__slider-" + String(i) + " .tabs-sliders__slider-item"
    );
    for (let i of countSlide) {
      if (i.classList.contains("slick-cloned")) {
        countClonedSlide++;
      }
    }
    let allCountSlide = Math.ceil(
      (countSlide.length - countClonedSlide) / mediaSlidesToShow
    );
    $(".tabs-sliders__slider-all-slide-" + String(i)).text(allCountSlide);

    $(".tabs-sliders__slider-" + String(i)).on(
      "afterChange",
      function (event, slick, currentSlide) {
        updateSliderCounter(slick, currentSlide);
      }
    );
  }
}
// end tabs slider

// start home blog slider
if (document.querySelector(".home-blog__slider")) {
  $(".home-blog__slider").slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    centerMode: true,
    dots: false,
    arrows: true,
    prevArrow: '<div class="slick-prev slick-arrow"></div>',
    nextArrow: '<div class="slick-next slick-arrow"></div>',
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

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".home-blog__slider-current-slide").text(currentSlide);
  };

  $(".home-blog__slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });
  let countClonedSlide = 0;
  let CountSlide = document.querySelectorAll(".home-blog__slider-item");
  for (let i of CountSlide) {
    if (i.classList.contains("slick-cloned")) {
      countClonedSlide++;
    }
  }

  let allCountSlide = CountSlide.length - countClonedSlide;
  $(".home-blog__slider-all-slide").text(allCountSlide);

  $(".home-blog__slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end home blog slider

// start video blog slider
if (document.querySelector(".video-home")) {
  let itemFor = document.querySelectorAll(".video-home__for-item");
  $(".video-home__slider-for")
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      asNavFor: ".video-home__slider-nav",
      prevArrow: '<div class="slick-prev slick-arrow"></div>',
      nextArrow: '<div class="slick-next slick-arrow"></div>',
    })
    .on("beforeChange", () => {
      for (let i = 0; i < itemFor.length; i++) {
        if (itemFor[i].classList.contains("slick-active")) {
          itemFor[i].querySelector(".video-home__for-video").pause();
        }
      }
    });
  $(".video-home__slider-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".video-home__slider-for",
    vertical: true,
    arrows: false,
    dots: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1098,
        settings: {
          slidesToShow: 2,
          vertical: false,
        },
      },
    ],
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".video-home__slider-current-slide").text(currentSlide);
  };

  $(".video-home_slider-for").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });
  let countClonedSlide = 0;
  let CountSlide = document.querySelectorAll(".video-home__for-item");
  for (let i of CountSlide) {
    if (i.classList.contains("slick-cloned")) {
      countClonedSlide++;
    }
  }

  let allCountSlide = CountSlide.length - countClonedSlide;
  $(".video-home__slider-all-slide").text(allCountSlide);

  $(".video-home__slider-for").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end video blog slider

// start single page slider
if (document.querySelector(".single-bot__slider")) {
  $(".single-bot__slider").slick({
    dots: false,
    autoplay: true,
    // autoplaySpeed: 5500,
    prevArrow: '<div class="slick-prev slick-arrow">PREV</div>',
    nextArrow: '<div class="slick-next slick-arrow">NEXT</div>',
  });
}
// end single page slider

// start single-product slider
if (document.querySelector(".product-top__for")) {
  let navItems = document.querySelectorAll(".product-top__nav-item");
  let forItems = document.querySelectorAll(".product-top__for-item");
  let video = document.querySelectorAll(".product-top__for-video");

  $(".product-top__for")
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      asNavFor: ".product-top__nav",
    })
    .on("beforeChange", () => {
      for (let i = 0; i < video.length; i++) {
        video[i].pause();
      }
    })
    .on("afterChange", () => {
      for (let i = 0; i < forItems.length; i++) {
        forItems[i].classList.remove("active-label");
        navItems[i].classList.remove("active-label");
        if (forItems[i].classList.contains("slick-current")) {
          navItems[i].classList.add("active-label");
        }
      }
    });

  for (let i = 0; i < forItems.length; i++) {
    if (forItems[i].classList.contains("slick-current")) {
      navItems[i].classList.add("active-label");
    }
  }

  $(".product-top__nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".product-top__for",
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 766,
        settings: {
          slidesToShow: 2,
          // centerMode: true,
        },
      },
      {
        breakpoint: 420,
        settings: {
          slidesToShow: 2,
          // centerMode: true,
        },
      },
    ],
  });
}
// end single-product slider
