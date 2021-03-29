var controller = new ScrollMagic.Controller();
// start slick slider - welcome block
$(".welcome__slider-left").slick({
  slidesToShow: 3,
  autoplay: true,
  autoplaySpeed: 0,
  speed: 7000,
  cssEase: "linear",
  infinite: true,
  vertical: true,
  arrows: false,
});
$(".welcome__slider-right").slick({
  slidesToShow: 3,
  autoplay: true,
  autoplaySpeed: 0,
  speed: 7000,
  cssEase: "linear",
  infinite: true,
  vertical: true,
  arrows: false,
});

$(".welcome__slider-left, .welcome__slider-right").on("mouseover", function () {
  $(".welcome__slider-right").slick("pause");
  $(".welcome__slider-left").slick("pause");
});
$(".welcome__slider-left, .welcome__slider-right").on("mouseout", function () {
  $(".welcome__slider-right").slick("play");
  $(".welcome__slider-left").slick("play");
});
// end slick slider - welcome block

// start slick slider - two-blocks
if (document.querySelector(".two-block__slider")) {
  $(".two-block__slider").slick({
    slidesToShow: 1,
    speed: 1000,
    infinite: true,
    arrows: true,
    focusOnSelect: false,
    prevArrow: '<div class="slick-prev slick-arrow">Prev</div>',
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".two-block__slider-current-slide").text("0" + currentSlide + ".");
  };

  $(".two-block__slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });

  $(".two-block__slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
// end slick slider - two-block

// start slick slider - blog
$(".slider-blog__slider").slick({
  slidesToShow: 1,
  speed: 1000,
  infinite: true,
  arrows: true,
  focusOnSelect: false,
  prevArrow: '<div class="slick-prev slick-arrow">Prev</div>',
});
// end slick slider - blog

// start slick slider - about
$(".about-main__slider").slick({
  slidesToShow: 1,
  speed: 1000,
  infinite: true,
  arrows: true,
  focusOnSelect: false,
  prevArrow: '<div class="slick-prev slick-arrow">Prev</div>',
  nextArrow: '<div class="slick-next slick-arrow">Next</div>',
  vertical: true,
  autoplay: true,
});
// end slick slider - about

//start slick slider - services
if (document.querySelector(".services-slider__slider")) {
  // start slick slider - services
  $(".services-slider__slider").slick({
    slidesToShow: 1,
    speed: 1000,
    infinite: true,
    arrows: true,
    focusOnSelect: false,
    prevArrow: '<div class="slick-prev slick-arrow">Prev</div>',
    nextArrow: '<div class="slick-next slick-arrow">Next</div>',
  });

  let currentSlide;
  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    $(".services-slider__conter").text("0" + currentSlide + ".");
  };

  $(".services-slider__slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });

  $(".services-slider__slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter(slick, currentSlide);
    }
  );
}
//end slick slider - services

// start services animation
if (document.querySelector(".anim-services__anim-container")) {
  const getEnterText = () => {
    function setupTypewriter(t) {
      var HTML = t.innerHTML;
      t.innerHTML = "";
      var cursorPosition = 0,
        typeSpeed = 100,
        tempTypeSpeed = 0;

      var type = function () {
        tempTypeSpeed = Math.random() * typeSpeed + 50;
        t.innerHTML += HTML[cursorPosition];
        cursorPosition += 1;
        if (cursorPosition < HTML.length) {
          setTimeout(type, tempTypeSpeed);
        }
        if (cursorPosition == HTML.length) {
          document.querySelector(".anim-services__bot").classList.add("active");
          setTimeout(() => {
            document
              .querySelector(".anim-services__bottom-cvg")
              .classList.add("active");
          }, 500);
        }
      };

      return {
        type: type,
      };
    }

    var typewriter = document.getElementById("typewriter");
    typewriter = setupTypewriter(typewriter);
    typewriter.type();
  };

  const getResetText = () => {
    document
      .querySelector(".anim-services__bottom-cvg")
      .classList.remove("active");
    document.querySelector(".anim-services__bot").classList.remove("active");
  };

  new ScrollMagic.Scene({
    triggerElement: ".anim-services__anim-container",
    triggerHook: "onEnter",
  })
    .setTween(
      ".anim-services__anim-container",
      0.8,
      { opacity: "1", transform: "translateX(40px)" },
      { duration: 500 }
    )
    .addTo(controller)
    .on("enter", () => {
      getEnterText();
    })
    .on("leave", () => {
      getResetText();
    });
}
// end services animation

// start fade anim for two scroll
if (window.matchMedia("(max-height: 1280px)").matches) {
  var tween1 = new TimelineMax().to(
    ".two-pre-scroll-fp .pre-scroll__right",
    1.5,
    {
      opacity: 0,
    }
  );

  new ScrollMagic.Scene({
    triggerElement: ".two-sections-scroll",
    triggerHook: "onEnter",
    duration: "100%",
    offset: 290,
  })
    .setTween(tween1)
    .addTo(controller);

  var tween2 = new TimelineMax().to(
    ".two-pre-scroll-fp .pre-scroll__img-two",
    1.5,
    {
      opacity: 0,
    }
  );

  new ScrollMagic.Scene({
    triggerElement: ".two-sections-scroll",
    triggerHook: "onEnter",
    duration: "100%",
    offset: 290,
  })
    .setTween(tween2)
    .addTo(controller);

  // // end fade anim for two scroll

  var tween3 = new TimelineMax().to(".contact-section ", 1.5, {
    opacity: 1,
  });

  new ScrollMagic.Scene({
    triggerElement: ".contact-section .our-concept__title",
    triggerHook: "onEnter",
    duration: "100%",
    // offset: 290,
  })
    .setTween(tween3)
    .addTo(controller);
}
if (window.matchMedia("(min-height: 1280px)").matches) {
  var tween1 = new TimelineMax().to(".our-concept", 1.5, { opacity: 0 });

  new ScrollMagic.Scene({
    triggerElement: ".two-sections-scroll",
    triggerHook: "onEnter",
    duration: "100%",
    offset: -390,
  })
    .setTween(tween1)
    .addTo(controller);

  var tween3 = new TimelineMax().to(".contact-section ", 1.5, {
    opacity: 1,
  });

  new ScrollMagic.Scene({
    triggerElement: ".contact-section .our-concept__title",
    triggerHook: "onEnter",
    duration: "100%",
  })
    .setTween(tween3)
    .addTo(controller);
}

if (document.querySelector(".horizontal-block-about")) {
  var aboutFadeHorizontal = new TimelineMax().to(
    ".horizontal-block-about",
    1.5,
    {
      opacity: 0,
    }
  );
  new ScrollMagic.Scene({
    triggerElement: ".horizontal-block-about",
    triggerHook: "onLeave",
    duration: "300px",
  })
    .setTween(aboutFadeHorizontal)
    .addTo(controller);

  var fadeOurClients = new TimelineMax().to(".client ", 1.5, {
    opacity: 1,
  });

  new ScrollMagic.Scene({
    triggerElement: ".client",
    triggerHook: "onEnter",
    duration: "100%",
  })
    .setTween(fadeOurClients)
    .addTo(controller);
}
if (document.querySelector(".two-sections-scroll-services")) {
  var aboutFadeHorizontal = new TimelineMax().to(".pre-scroll-fp-services", 1, {
    opacity: 0,
  });
  new ScrollMagic.Scene({
    triggerElement: ".sup-scroll__text",
    triggerHook: "onLeave",
    duration: "100%",
  })
    .setTween(aboutFadeHorizontal)
    .addTo(controller);

  var fadeOurClients = new TimelineMax().to(".pre-scroll-anim", 1.5, {
    opacity: 1,
  });

  new ScrollMagic.Scene({
    triggerElement: ".pre-scroll-anim",
    triggerHook: "onEnter",
    duration: "100%",
  })
    .setTween(fadeOurClients)
    .addTo(controller);
}
// end fade anim for two scroll

// start scroll animation - two
if (window.matchMedia("(min-height: 1280px)").matches) {
  let marg;
  let margBottom
  if (document.querySelector(".our-concept")) {
    marg = document.querySelector(".our-concept");
  } else if (document.querySelector(".horizontal-block-about")) {
    marg = document.querySelector(".horizontal-block-about");
  }
  if (!document.querySelector(".two-sections-scroll-services")) {
  margBottom = parseInt(
  window.getComputedStyle(marg, null).getPropertyValue("margin-bottom")
  );
  }
  // start two pre scroll
  if (document.querySelector(".two-pre-scroll.pre-scroll-smoll")) {
    var pre = new TimelineMax().to(".two-sections-scroll", 1, {
      x: "-10%",
      ease: Linear.easeNone,
    });
    new ScrollMagic.Scene({
      triggerElement: ".our-concept",
      triggerHook: "onLeave",
      duration: margBottom + "px",
      offset: marg.clientHeight + "px",
    })
      .setTween(pre)
      .addTo(controller);
  }
  if (document.querySelector(".pre-scroll-smoll-about")) {
    var pre = new TimelineMax().to(".two-sections-scroll", 1, {
      x: "-10%",
      ease: Linear.easeNone,
    });
    new ScrollMagic.Scene({
      triggerElement: ".horizontal-block-about",
      triggerHook: "onLeave",
      duration: margBottom + marg.clientHeight + "px",
    })
      .setTween(pre)
      .addTo(controller);
  }
  // end two pre scroll
  // start scroll animation - two
  if (document.querySelector(".two-sections-scroll")) {
    if (
      window.matchMedia("(min-width: 700px)").matches &&
      document.querySelector(".our-concept ")
    ) {
      var horizontalSlide = new TimelineMax()
        .to(".two-sections-scroll", 1, {
          x: "-20%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-30%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-40%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-50%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-60%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-70%",
          ease: Linear.easeNone,
        })
        .to(".two-wrapper-scroll", 1, {
          x: "-10%",
          y: "-37%",
          opacity: ".5",
          ease: Linear.easeNone,
        })

        .to(".two-wrapper-scroll", 1, {
          opacity: "0",
        });
    } else if (
      window.matchMedia("(min-width: 700px)").matches &&
      document.querySelector(".horizontal-block-about")
    ) {
      var horizontalSlide = new TimelineMax()
        .to(".two-sections-scroll", 1, {
          x: "-20%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-30%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-40%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-50%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-60%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-70%",
          ease: Linear.easeNone,
        })
        .to(".two-wrapper-scroll", 1, {
          x: "-10%",
          y: "-25",
          opacity: ".5",
          ease: Linear.easeNone,
        })
        .to(".two-wrapper-scroll", 1, {
          opacity: "0",
        });
    } else if (
      window.matchMedia("(min-width: 700px)").matches &&
      document.querySelector(".two-sections-scroll-services")
    ) {
      var horizontalSlide = new TimelineMax()
        .to(".two-sections-scroll", 1, {
          x: "-10%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-20%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-30%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-40%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-50%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-60%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-70%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-80%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-90%",
          y: "-35%",
          opacity: ".5",
          ease: Linear.easeNone,
        })
        .to(".two-wrapper-scroll", 1, {
          opacity: "0",
        });
    } else if (window.matchMedia("(max-width: 700px)").matches) {
      var horizontalSlide = new TimelineMax().to(".two-sections-scroll", 1, {
        x: "-90%",
      });
    } else if (window.matchMedia("(max-width: 450px)").matches) {
      var horizontalSlide = new TimelineMax().to(".two-sections-scroll", 1, {
        x: "-100%",
      });
    }

    new ScrollMagic.Scene({
      triggerElement: ".two-wrapper-scroll",
      triggerHook: "onLeave",
      duration: "300%",
    })
      .setPin(".two-wrapper-scroll")
      .setTween(horizontalSlide)
      .addTo(controller);

    let sections = document.querySelector(".two-sections-scroll");
    let section = document.querySelectorAll(".section-scroll-two");
    if (window.matchMedia("(min-width: 1000px)").matches) {
      sections.style.width =
        section[0].offsetWidth * section.length - 600 + "px";
    } else if (window.matchMedia("(max-width: 1000px)").matches) {
      sections.style.width = section[0].offsetWidth * section.length + "px";
    }

    if (document.querySelector(".about-croll-wrapper")) {
      if (window.matchMedia("(min-width: 1000px)").matches) {
        sections.style.width =
          section[0].offsetWidth * section.length - 100 + "px";
      } else if (window.matchMedia("(max-width: 400px)").matches) {
        sections.style.width =
          section[0].offsetWidth * section.length + 100 + "px";
      }
    }
  }
  // end scroll animation - two
}

if (window.matchMedia("(max-height: 1280px)").matches) {
  // start two pre scroll
  if (document.querySelector(".two-pre-scroll.pre-scroll-smoll")) {
    let hup = document.querySelector(".two-pre-scroll.pre-scroll-smoll");
    var pre = new TimelineMax().to(".two-sections-scroll", 1, {
      x: "-5%",
      ease: Linear.easeNone,
    });
    new ScrollMagic.Scene({
      triggerElement: ".two-pre-scroll.pre-scroll-smoll",
      triggerHook: "onLeave",
      duration: hup.clientHeight + "px",
    })
      .setTween(pre)
      .addTo(controller);
  }
  // end two pre scroll

  // start scroll animation - two
  if (document.querySelector(".two-sections-scroll")) {
    if (window.matchMedia("(min-width: 700px)").matches) {
      var horizontalSlide = new TimelineMax()
        .to(".two-sections-scroll", 1, {
          x: "-10%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-20%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-30%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-40%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-50%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-60%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-70%",
          ease: Linear.easeNone,
        })
        .to(".two-sections-scroll", 1, {
          x: "-80%",
          y: "-17%",
          ease: Linear.easeNone,
        });
    } else if (window.matchMedia("(max-width: 700px)").matches) {
      var horizontalSlide = new TimelineMax().to(".two-sections-scroll", 1, {
        x: "-90%",
      });
    } else if (window.matchMedia("(max-width: 450px)").matches) {
      var horizontalSlide = new TimelineMax().to(".two-sections-scroll", 1, {
        x: "-100%",
      });
    }

    new ScrollMagic.Scene({
      triggerElement: ".two-wrapper-scroll",
      triggerHook: "onLeave",
      duration: "300%",
    })
      .setPin(".two-wrapper-scroll")
      .setTween(horizontalSlide)
      .addTo(controller);

    let sections = document.querySelector(".two-sections-scroll");
    let section = document.querySelectorAll(".section-scroll-two");
    if (window.matchMedia("(min-width: 1000px)").matches) {
      sections.style.width =
        section[0].offsetWidth * section.length - 600 + "px";
    } else if (window.matchMedia("(max-width: 1000px)").matches) {
      sections.style.width = section[0].offsetWidth * section.length + "px";
    }

    if (document.querySelector(".about-croll-wrapper")) {
      if (window.matchMedia("(min-width: 1000px)").matches) {
        sections.style.width =
          section[0].offsetWidth * section.length - 100 + "px";
      } else if (window.matchMedia("(max-width: 400px)").matches) {
        sections.style.width =
          section[0].offsetWidth * section.length + 100 + "px";
      }
    }
  }
  // end scroll animation - two
}
// end scroll animation - two

// start fade anim for first scroll
if (window.matchMedia("(max-height: 1280px)").matches) {
  var tween1 = new TimelineMax().to(".pre-scroll-fp .pre-scroll__right", 1.5, {
    opacity: 0,
  });

  new ScrollMagic.Scene({
    triggerElement: ".first-sections-scroll",
    triggerHook: "onEnter",
    duration: "100%",
    offset: 290,
  })
    .setTween(tween1)
    .addTo(controller);

  var tween2 = new TimelineMax().to(
    ".pre-scroll-fp .pre-scroll__left-first",
    1.5,
    {
      opacity: 0,
    }
  );

  new ScrollMagic.Scene({
    triggerElement: ".first-sections-scroll",
    triggerHook: "onEnter",
    duration: "100%",
    offset: 290,
  })
    .setTween(tween2)
    .addTo(controller);

  var tween3 = new TimelineMax().to(".our-concept-fp ", 1.5, {
    opacity: 1,
  });

  new ScrollMagic.Scene({
    triggerElement: ".our-concept-fp",
    triggerHook: "onEnter",
    duration: "100%",
    // offset: 290,
  })
    .setTween(tween3)
    .addTo(controller);
}
// end fade anim for first scroll

// start scroll animation - first
if (window.matchMedia("(min-height: 1280px)").matches) {
  if (document.querySelector(".first-sections-scroll")) {
    // start first pre scroll
    if (document.querySelector(".pre-scroll.pre-scroll-smoll")) {
      let hupFirst = document.querySelector(".three-block");
      let margBottomFirst = parseInt(
        window
          .getComputedStyle(hupFirst, null)
          .getPropertyValue("margin-bottom")
      );
      var pre = new TimelineMax().to(".first-sections-scroll", 1, {
        x: "-5%",
        ease: Linear.easeNone,
      });
      new ScrollMagic.Scene({
        triggerElement: ".three-block",
        triggerHook: "onLeave",
        duration: hupFirst.clientHeight + margBottomFirst + "px",
      })
        .setTween(pre)
        .addTo(controller);
    }
    // end two pre scroll

    var horizontalSlide = new TimelineMax()
      .to(".first-sections-scroll", 1, {
        x: "-10%",
        ease: Linear.easeNone,
      })
      .to(".first-sections-scroll", 1, {
        x: "-15%",
        ease: Linear.easeNone,
      })
      .to(".first-sections-scroll", 1, {
        x: "-20%",
        ease: Linear.easeNone,
      })
      .to(".first-sections-scroll", 1, {
        x: "-25%",
        ease: Linear.easeNone,
      })
      .to(".first-sections-scroll", 1, {
        x: "-30%",
        ease: Linear.easeNone,
      })
      .to(".first-sections-scroll", 1, {
        x: "-35%",
        ease: Linear.easeNone,
      })
      .to(".first-wrapper-scroll", 1, {
        x: "-5%",
        y: "-15%",
        opacity: ".5",
        ease: Linear.easeNone,
      });

    new ScrollMagic.Scene({
      triggerElement: ".first-wrapper-scroll",
      triggerHook: "onLeave",
      duration: "100%",
    })
      .setPin(".first-wrapper-scroll")
      .setTween(horizontalSlide)
      .addTo(controller);

    let sections = document.querySelector(".first-sections-scroll");
    let section = document.querySelectorAll(".section-scroll");
    sections.style.width = section[0].offsetWidth * section.length + "px";

    //show more text
    let sectionScrollContainer = document.querySelectorAll(
      ".section-scroll__bot-cont"
    );
    for (let i = 0; i < sectionScrollContainer.length; i++) {
      let button = sectionScrollContainer[i].querySelector(
        ".section-scroll__view-more-btn"
      );
      let text = sectionScrollContainer[i].querySelector(
        ".section-scroll__text.hidden"
      );
      let btnCont = sectionScrollContainer[i].querySelector(
        ".section-scroll__btn-cont"
      );

      button.addEventListener("click", () => {
        text.classList.remove("hidden");
        text.classList.add("visible");
        button.classList.add("hidden");
        btnCont.classList.add("hidden");
      });
    }
  }
}

if (window.matchMedia("(max-height: 1280px)").matches) {
  if (document.querySelector(".first-sections-scroll")) {
    // start first pre scroll
    if (document.querySelector(".pre-scroll.pre-scroll-smoll")) {
      let hupFirst = document.querySelector(".pre-scroll.pre-scroll-smoll");
      var pre = new TimelineMax().to(".first-sections-scroll", 1, {
        x: "-5%",
        ease: Linear.easeNone,
      });
      console.log(document.querySelector(".pre-scroll.pre-scroll-smoll"));
      new ScrollMagic.Scene({
        triggerElement: ".pre-scroll.pre-scroll-smoll",
        triggerHook: "onLeave",
        duration: hupFirst.clientHeight + "px",
      })
        .setTween(pre)
        .addTo(controller);
    }
    // end two pre scroll

    if (window.matchMedia("(min-width: 1780px)").matches) {
      var horizontalSlide = new TimelineMax()
        .to(".first-sections-scroll", 1, {
          x: "-10%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-15%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-20%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-25%",
          y: "-17%",
          ease: Linear.easeNone,
        });
    } else if (window.matchMedia("(max-width: 1360px)").matches) {
      var horizontalSlide = new TimelineMax().to(".first-sections-scroll", 1, {
        x: "-60%",
      });
    } else if (window.matchMedia("(max-width: 1780px)").matches) {
      var horizontalSlide = new TimelineMax()
        .to(".first-sections-scroll", 1, {
          x: "-10%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-15%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-25%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-30%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-35%",
          ease: Linear.easeNone,
        })
        .to(".first-sections-scroll", 1, {
          x: "-40%",
          y: "-17%",
          ease: Linear.easeNone,
        });
    }

    new ScrollMagic.Scene({
      triggerElement: ".first-wrapper-scroll",
      triggerHook: "onLeave",
      duration: "100%",
    })
      .setPin(".first-wrapper-scroll")
      .setTween(horizontalSlide)
      .addTo(controller);

    let sections = document.querySelector(".first-sections-scroll");
    let section = document.querySelectorAll(".section-scroll");
    sections.style.width = section[0].offsetWidth * section.length + "px";

    //show more text
    let sectionScrollContainer = document.querySelectorAll(
      ".section-scroll__bot-cont"
    );
    for (let i = 0; i < sectionScrollContainer.length; i++) {
      let button = sectionScrollContainer[i].querySelector(
        ".section-scroll__view-more-btn"
      );
      let text = sectionScrollContainer[i].querySelector(
        ".section-scroll__text.hidden"
      );
      let btnCont = sectionScrollContainer[i].querySelector(
        ".section-scroll__btn-cont"
      );

      button.addEventListener("click", () => {
        text.classList.remove("hidden");
        text.classList.add("visible");
        button.classList.add("hidden");
        btnCont.classList.add("hidden");
      });
    }
  }
}
// end scroll animation - first
