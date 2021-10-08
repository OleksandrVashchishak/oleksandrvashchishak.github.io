$(function () {
  /***  First-Slide ***/

  let currentSlide;
  let slidesCount;

  const updateSliderCounter = function (slick, currentIndex) {
    currentSlide = slick.slickCurrentSlide() + 1;
    slidesCount = slick.slideCount;
    $(".first-slider__counter--left").text("0" + currentSlide);
    $(".first-slider__counter--right").text("0" + slidesCount);
  };

  $(".first-slider").on("init", function (event, slick) {
    updateSliderCounter(slick);
  });

  $(".first-slider").on("afterChange", function (event, slick, currentSlide) {
    updateSliderCounter(slick, currentSlide);
  });

  $(".first-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: true,
    autoplay: true,
    speed: 1000,
    asNavFor: ".first-slider__nav",
    responsive: [
      {
        breakpoint: 992,
        settings: {
          dots: true,
        },
      },
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          dots: true,
        },
      },
    ],
  });

  $(".first-slider__nav").slick({
    slidesToShow: 3,
    asNavFor: ".first-slider",
    arrows: false,
    infinite: false,
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1140,
        settings: {
          infinite: true,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  $(".first-slider").on("afterChange", function (event, slick) {
    $(".first-slider__nav .slick-slide")
      .removeClass("slick-current")
      .filter("[data-slick-index=" + slick.currentSlide + "]")
      .addClass("slick-current");
  });

  /***  About-slide ***/

  $(".about-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    vertical: true,
    dots: false,
    verticalScrolling: true,
    verticalSwiping: true,
    infinite: true,
    autoplay: true,
    speed: 1000,
    infinite: false,
  });

  let currentSlide2;
  let slidesCount2;

  let changeSliderCounter = function (slick, currentIndex) {
    currentSlide2 = slick.slickCurrentSlide() + 1;
    slidesCount2 = slick.slideCount;
    $(".about-slider__counter--left").text("0" + currentSlide2);
    $(".about-slider__counter--right").text("0" + slidesCount2);
  };

  $(".about-slider").on("init", function (event, slick) {
    changeSliderCounter(slick);
  });

  $(".about-slider").on("afterChange", function (event, slick, currentSlide) {
    changeSliderCounter(slick, currentSlide);
  });

  // change img

  if (document.querySelector(".photo-slider")) {
    $(".about-pictures__item").first().addClass("active");
  }

  $(".about-slider").on("afterChange", function (event, slick, currentSlide) {
    changeImg2(slick, currentSlide);
  });

  let j = 0;
  $(".about-pictures__item").each(function (j, elem) {
    $(this).attr("data-img", j++);
  });

  let changeImg2 = function (slick, currentSlide) {
    $(".about-pictures__item").each(function (j, elem) {
      $(elem).removeClass("active");
      if ($(elem).data("img") == currentSlide) {
        $(elem).addClass("active");
      }
    });
  };

  /***  Blog-slider ***/

  $(".blog-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: true,
    arrows: true,
    dots: false,
    infinite: true,
    autoplay: true,
    speed: 1000,
    responsive: [
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          variableWidth: false,
          arrows: false,
        },
      },
    ],
  });

  let blogPictures = $(".blog-slider__nav-item");

  function showPicture(elem) {
    $(blogPictures).removeClass("active");
    $(elem).addClass("active");
  }

  let i = 0;
  setInterval(function () {
    let elem = blogPictures[i++];
    showPicture(elem);
    if (i >= blogPictures.length) i = 0;
  }, 2000);

  let currentSlide3;
  let slidesCount3;

  let changeSliderCounter3 = function (slick, currentIndex) {
    currentSlide3 = slick.slickCurrentSlide() + 1;
    slidesCount3 = slick.slideCount;
    $(".blog-slider__counter--left").text("0" + currentSlide3);
    $(".blog-slider__counter--right").text("0" + slidesCount3);
  };

  $(".blog-slider").on("init", function (event, slick) {
    changeSliderCounter3(slick);
  });

  $(".blog-slider").on("afterChange", function (event, slick, currentSlide) {
    changeSliderCounter3(slick, currentSlide);
  });

  /***  Photo-slide ***/

  $(".photo-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    variableWidth: true,
    initialSlide: 1,
    arrows: false,
    infinite: false,
    responsive: [
      {
        breakpoint: 768,
        settings: "unslick",
      },
    ],
  });

  /*** change slide position after click ***/

  $(".photo-slider").on("click", ".slick-slide", function (e) {
    e.stopPropagation();
    var index = $(this).index();
    if ($(".photo-slider").slick("slickCurrentSlide") !== index) {
      $(".photo-slider").slick("slickGoTo", index);
    }
  });

  let photo1 = $(".vent-slider__item");
  let photo2 = $(".pump-slider__item");
  let photo3 = $(".other-slider__item");
  let all1 = photo1.length;
  let all2 = photo2.length;
  let all3 = photo3.length;

  if (document.querySelector(".photo-slider")) {
    $(photo1).first().addClass("active");
    $(photo2).first().addClass("active");
    $(photo3).first().addClass("active");
  }

  $(".vent-slider__counter--right").text("0" + all1);
  $(".pump-slider__counter--right").text("0" + all2);
  $(".other-slider__counter--right").text("0" + all3);

  let u1 = 0;
  let u2 = 0;
  let u3 = 0;

  $(".vent-slider__down").click(function () {
    u1--;
    if (u1 < 0) u1 = all1 - 1;
    $(photo1).removeClass("active");
    $(photo1[u1]).toggleClass("active");
  });

  $(".pump-slider__down").click(function () {
    u2--;
    if (u2 < 0) u2 = all2 - 1;
    $(photo2).removeClass("active");
    $(photo2[u2]).toggleClass("active");
  });

  $(".other-slider__down").click(function () {
    u3--;
    if (u3 < 0) u3 = all3 - 1;
    $(photo3).removeClass("active");
    $(photo3[u3]).toggleClass("active");
  });

  $(".vent-slider__up").click(function () {
    u1++;
    if (u1 >= all1) u1 = 0;
    $(photo1).removeClass("active");
    $(photo1[u1]).toggleClass("active");
  });

  $(".pump-slider__up").click(function () {
    u2++;
    if (u2 >= all2) u2 = 0;
    $(photo2).removeClass("active");
    $(photo2[u2]).toggleClass("active");
  });

  $(".other-slider__up").click(function () {
    u3++;
    if (u3 >= all3) u3 = 0;
    $(photo3).removeClass("active");
    $(photo3[u3]).toggleClass("active");
  });

  $(".vent-slider__up").click(function () {
    ventChangeSlide(u1 + 1, all1);
  });

  $(".vent-slider__down").click(function () {
    ventChangeSlide(u1 + 1, all1);
  });

  $(".pump-slider__up").click(function () {
    pumpChangeSlide(u2 + 1, all2);
  });

  $(".pump-slider__down").click(function () {
    pumpChangeSlide(u2 + 1, all2);
  });

  $(".other-slider__up").click(function () {
    otherChangeSlide(u3 + 1, all3);
  });

  $(".other-slider__down").click(function () {
    otherChangeSlide(u3 + 1, all3);
  });

  let ventChangeSlide = function (u1, all1) {
    $(".vent-slider__counter--left").text("0" + u1);
    $(".vent-slider__counter--right").text("0" + all1);
  };

  let pumpChangeSlide = function (u2, all2) {
    $(".pump-slider__counter--left").text("0" + u2);
    $(".pump-slider__counter--right").text("0" + all2);
  };

  let otherChangeSlide = function (u3, all3) {
    $(".other-slider__counter--left").text("0" + u3);
    $(".other-slider__counter--right").text("0" + all3);
  };

  /* Header Burger */

  $(".burger__wrap").click(function () {
    $(".header-menu").toggleClass("active");
    $(".burger").toggleClass("active");
    $(".header-bottom__title").toggleClass("hidden");
    $(".header").toggleClass("active");
    $("body").toggleClass("lock");
  });

  // $('.wp-menu__item').click(function () {
  //    console.log(this);
  //    $(this).next('.sub-menu').addClass('active');
  // });

  /* Card Tile */

  $(".icons__btn").click(function () {
    $(".icons__btn").removeClass("active");
    $(this).toggleClass("active");
    if ($(this).attr("data-columns") == 1) {
      $(".products-right__list").addClass("columns-1");
    } else {
      $(".products-right__list").removeClass("columns-1");
    }
  });

  /* Card product */

  $(".card__more").click(function () {
    $(this).toggleClass("active");
    if ($(this).prev(".card-list").hasClass("active")) {
      $(this).prev(".card-list").removeClass("active");
    } else {
      setTimeout(() => {
        $(this).prev(".card-list").addClass("active");
      }, 300);
    }
    $(this).closest(".card").toggleClass("open");
  });

  /*  Page Category */

  let currentSlide5;
  let slidesCount5;

  const updateSliderCounter5 = function (slick, currentIndex) {
    currentSlide5 = slick.slickCurrentSlide() + 1;
    slidesCount5 = slick.slideCount;
    $(".category-mini__counter--left").text("0" + currentSlide5);
    $(".category-mini__counter--right").text("0" + slidesCount5);
  };

  $(".category-mini").on("init", function (event, slick) {
    updateSliderCounter5(slick);
  });

  $(".category-mini").on("afterChange", function (event, slick, currentSlide) {
    updateSliderCounter5(slick, currentSlide);
  });

  $(".category-mini").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    autoplay: true,
    speed: 1000,
    dots: false,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".products-filter__top").click(function () {
    $(this).next(".products-filter__bottom").slideToggle();
    $(this).closest(".products-filter").toggleClass("products-filter--open");
  });

  $("#woocommerce_price_filter-2").addClass("products-filter--open");
  $("#woocommerce_price_filter-3").addClass("products-filter--open");

  $(".products-price__top").click(function () {
    $(this).next(".products-filter__bottom").slideToggle();
    $(this).closest(".products-price").toggleClass("products-filter--open");
  });

  /* tabs cabinet */

  $(".tabs__item").click(function () {
    $(".tabs__item").removeClass("active");
    $(this).addClass("active");
    var href = $(this).attr("href");
    $(".tab-pane").removeClass("active").removeClass("in");
    $(href).addClass("active");
    setTimeout(function () {
      $(href).addClass("in");
    }, 100);
    return false;
  });

  /* ordering radio */

  $(".woocommerce-input-wrapper .radio").click(function () {
    if ($('.input-radio[name="radio"][value="1"]').is(":checked")) {
      $(".woocommerce-additional-fields__field-wrapper").addClass("active");
    } else {
      $(".woocommerce-additional-fields__field-wrapper").removeClass("active");
    }
  });

  /* Ordering goods*/
  let count = $(".goods").length;
  $(".goods-remove").click(function () {
    $(this).closest(".goods").slideUp(500);
    count--;
    $(".ordering-right__count").text(count);
  });

  /* Ordering delivery*/
  $(".delivery-group__town").click(function () {
    var text = $(this).text();
    $("#town").val(text);
  });

  /* Cart hover */

  $(".ordering-right__close").click(function () {
    $(".cart-hidden").slideUp();
    setTimeout(function () {
      $(".cart-hidden").removeAttr("style");
    }, 500);
  });

  /* About-us slider */
  $(".about-us__slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: true,
    autoplay: true,
    speed: 1000,
    responsive: [
      {
        breakpoint: 576,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  let currentSlide6;
  let slidesCount6;

  const updateSliderCounter6 = function (slick, currentIndex) {
    currentSlide6 = slick.slickCurrentSlide() + 1;
    slidesCount6 = slick.slideCount;
    $(".about-us__slider-counter--left").text("0" + currentSlide6);
    $(".about-us__slider-counter--right").text("0" + slidesCount6);
  };

  $(".about-us__slider").on("init", function (event, slick) {
    updateSliderCounter6(slick);
  });

  $(".about-us__slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter6(slick, currentSlide);
    }
  );

  /* Portfolio slider */

  let currentSlide7;
  let slidesCount7;

  const updateSliderCounter7 = function (slick, currentIndex) {
    currentSlide7 = slick.slickCurrentSlide() + 1;
    slidesCount7 = slick.slideCount;
    $(".portfolio-slider__counter--left").text("0" + currentSlide7);
    $(".portfolio-slider__counter--right").text("0" + slidesCount7);
  };

  $(".portfolio-slider").on("init", function (event, slick) {
    updateSliderCounter7(slick);
  });

  $(".portfolio-slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      updateSliderCounter7(slick, currentSlide);
    }
  );

  $(".portfolio-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    dots: false,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  /* about-us sticky */

  window.addEventListener("scroll", () => {
    let scrollDistance = window.scrollY - 800;

    if (window.innerWidth > 768) {
      document.querySelectorAll(".about__section").forEach((el, i) => {
        if (
          el.offsetTop - document.querySelector(".sticky-list").clientHeight <=
          scrollDistance
        ) {
          document.querySelectorAll(".sticky-list__item").forEach((el) => {
            if (el.classList.contains("active")) {
              el.classList.remove("active");
            }
          });

          document
            .querySelectorAll(".sticky-list__item")
            [i].classList.add("active");
        }
      });
    }
  });

  /* Modal window */

  const btns = document.querySelectorAll(".modal__btn");
  const modalOverlay = document.querySelector(".modal-overlay ");
  const modals = document.querySelectorAll(".modal");
  const close = document.querySelector(".modal--close");

  btns.forEach((el) => {
    el.addEventListener("click", (e) => {
      let path = e.currentTarget.getAttribute("data-path");

      modals.forEach((el) => {
        el.classList.remove("modal--visible");
      });

      document
        .querySelector(`[data-target="${path}"]`)
        .classList.add("modal--visible");
      modalOverlay.classList.add("modal-overlay--visible");
    });
  });

  modalOverlay.addEventListener("click", (e) => {
    if (e.target == modalOverlay) {
      modalOverlay.classList.remove("modal-overlay--visible");
      modals.forEach((el) => {
        el.classList.remove("modal--visible");
      });
    }
  });

  close.addEventListener("click", (e) => {
    modalOverlay.classList.remove("modal-overlay--visible");
    modals.forEach((el) => {
      el.classList.remove("modal--visible");
    });
  });

  // related-slider

  let currentSlide8;
  let slidesCount8;

  const updateSliderCounter8 = function (slick, currentIndex) {
    currentSlide8 = slick.slickCurrentSlide() + 1;
    slidesCount8 = slick.slideCount;
    $(".related-slider__counter--left").text("0" + currentSlide8);
    $(".related-slider__counter--right").text("0" + slidesCount8);
  };

  $(".related-slider").on("init", function (event, slick) {
    updateSliderCounter8(slick);
  });

  $(".related-slider").on("afterChange", function (event, slick, currentSlide) {
    updateSliderCounter8(slick, currentSlide);
  });

  $(".related-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    autoplay: true,
    speed: 1000,
    dots: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  });

  // Artical-menu

  $(".article-menu li").click(function (e) {
    e.preventDefault();
    $(".article-menu li").removeClass("active");
    $(this).addClass("active");
  });

  // Change sorting products
  let sortSelected = $(".orderby option:selected").val();
  if (sortSelected == "popularity") {
    $("#radio-1").prop("checked", true);
  } else if (sortSelected == "rating") {
    $("#radio-2").prop("checked", true);
  } else if (sortSelected == "price") {
    $("#radio-3").prop("checked", true);
  } else if (sortSelected == "price-desc") {
    $("#radio-4").prop("checked", true);
  }

  $("#radio-1").click(function () {
    $(".orderby").children("option").val("popularity").change();
  });
  $(".orderby option:selected").val();

  $("#radio-2").click(function () {
    $(".orderby").children("option").val("rating").change();
  });

  $("#radio-3").click(function () {
    $(".orderby").children("option").val("price").change();
  });

  $("#radio-4").click(function () {
    $(".orderby").children("option").val("price-desc").change();
  });

  /************  details    ******/
  $(".details__link").click(function () {
    $(".details__container").toggleClass("more");
    $(this).toggleClass("active");
  });
  /************  technical   ******/
  $(".technical__link").click(function () {
    $(".technical__table").toggleClass("more");
    $(this).toggleClass("active");
  });

  /* Ordering comment */

  let textarea = "Додати коментар до замовлення";

  $(".js-btn").before(
    $('<span class="ordering-left__link">' + textarea + "</span>")
  );

  $(".ordering-left__link").click(function () {
    $(this).next(".thwcfd-field-textarea").slideToggle();
  });

  /* Calc attribute */

  $(".power-filter").click(function () {
    let res = $("#text-result-3").text();
    let res_min = +res - res / 10;
    let res_max = +res + res / 10;
    let li = $("#wpfBlock_5 [data-term-slug]");
    let link = $(location).attr("href");
    let count = 0;
    link += "?filter_power=";
    $(li).each(function (index) {
      $(this).attr("data-term-slug");

      let checkbox = $('.wpfCheckbox input[type="checkbox"]');
      if (
        $(li[index]).attr("data-term-slug") >= res_min &&
        $(li[index]).attr("data-term-slug") <= res_max
      ) {
        link += $(li[index]).attr("data-term-slug") + "%7C";
        $(li[index]).find(checkbox).prop("checked", true);
        count++;
      }
    });
    console.log(link);
    if (count == 0) {
      $(".power-filter").attr("href", function (i, v) {
        return v + link + 1;
      });
    } else {
      $(".power-filter").attr("href", function (i, v) {
        return v + link;
      });
    }
  });

  $(".power-filter").click(function () {
    $.cookie("calcCookie", $area.val(), {
      expires: 1,
    });
  });
  var $area = $(".wow-forms-number.field_1").val($.cookie("calcCookie"));

  var selected = $.cookie("radioButton");
  $('input[name="wow-forms-radio-2"][value="' + selected + '"]').attr(
    "checked",
    true
  );
  $('input[name="wow-forms-radio-2"]').click(function () {
    $.cookie("radioButton", $(this).val(), { expires: 1 });
  });

  /* Calc attribute ukr */

  $(".power-filter-uk").click(function () {
    let res = $("#text-result-3").text();
    let res_min = +res - res / 10;
    let res_max = +res + res / 10;
    let li = $("#wpfBlock_5 [data-term-slug]");
    let link = $(location).attr("href");

    let count = 0;
    link = "?filter_power=";
    $(li).each(function (index) {
      $(this).attr("data-term-slug");

      let checkbox = $('.wpfCheckbox input[type="checkbox"]');
      if (
        $(li[index]).attr("data-term-slug") >= res_min &&
        $(li[index]).attr("data-term-slug") <= res_max
      ) {
        link += $(li[index]).attr("data-term-slug") + "%7C";
        $(li[index]).find(checkbox).prop("checked", true);
        count++;
      }
    });
    if (count == 0) {
      $(".power-filter-uk").attr("href", function (i, v) {
        return v + link + 1;
      });
    } else {
      $(".power-filter-uk").attr("href", function (i, v) {
        return v + link;
      });
    }
  });

  $(".power-filter").click(function () {
    $.cookie("calcCookie", $area.val(), {
      expires: 1,
    });
  });
  var $area = $(".wow-forms-number.field_1").val($.cookie("calcCookie"));

  var selected = $.cookie("radioButton");
  $('input[name="wow-forms-radio-2"][value="' + selected + '"]').attr(
    "checked",
    true
  );
  $('input[name="wow-forms-radio-2"]').click(function () {
    $.cookie("radioButton", $(this).val(), { expires: 1 });
  });

  $(".products__left-btn").click(function () {
    $(".products__left").toggleClass("active");
    $(this).toggleClass("active");
    $("body").toggleClass("lock");
    $("html,body").animate({ scrollTop: 0 });
    $(".svg-filter__close").toggleClass("active");
    $(".svg-filter").toggleClass("active");
  });

  /* product type external */

  if (document.querySelector(".product-type-external")) {
    let extEl = $(".product-type-external");

    $.each(extEl, function (i, value) {
      let link = $(this).find(".product_type_external").attr("href");
      let extFind = $(this)
        .find(".woocommerce-LoopProduct-link")
        .attr("href", link);
    });
  }

  /* close product filter click */

  $(".wpfFilterVerScroll li").click(function () {
    $(".products__left").removeClass("active");
    $(".products__left-btn").removeClass("active");
    $(".svg-filter__close").removeClass("active");
    $(".svg-filter").addClass("active");
  });

  $(".tm-woocompare-button").click(function () {
    let text = $(".cabinet__compare .cart__quantity").text();

    if ($(this).hasClass("in_compare")) {
      $(".cabinet__compare .cart__quantity").text(+text - 1);
    } else {
      $(".cabinet__compare .cart__quantity").text(+text + 1);
    }
  });
  $(".dashicons-dismiss").click(function () {
    let text2 = $(".cabinet__compare .cart__quantity").text();
    $(".cabinet__compare .cart__quantity").text(+text2 - 1);
  });

  $(".remove_from_cart_button").click(function () {
    $(this).closest(".woocommerce-mini-cart-item").css("display", "none");
  });

  if (document.querySelector(".remove_from_cart_button")) {
    let removeBtnt = document.querySelectorAll(".remove_from_cart_button");
    let goodsCount = document.querySelectorAll(
      ".woocommerce-mini-cart .quantity.goods-count"
    );
    let cartQuantity = document.querySelectorAll(".cart-top .cart__quantity");
    for (let i = 0; i < removeBtnt.length; i++) {
      removeBtnt[i].addEventListener("click", () => {
        // START //
        //-------//
        let newCountAfter = 0;
        let newPriceAllAfter = 0;
        removeBtnt[i].parentNode.parentNode.querySelector(
          ".quantity.goods-count"
        ).textContent = 0;
        let priceAll = document.querySelectorAll(
          ".cart-hidden .mini_cart_item .woocommerce-Price-amount bdi"
        );
        let priceTotal = document.querySelector(
          ".woocommerce-mini-cart__total .woocommerce-Price-amount"
        );
        for (let i of priceAll) {
          newPriceAllAfter += parseInt(i.textContent.replace(/\s/g, ""));
        }
        console.log(priceTotal);
        priceTotal.textContent = newPriceAllAfter + "$";
        console.log(priceTotal);
        for (let i of goodsCount) {
          newCountAfter += parseInt(i.textContent.split("")[0]);
        }
        cartQuantity[1].textContent = newCountAfter;
        //-------//

        // END //
      });
    }
  }

  if (document.querySelector(".woocommerce-cart-form.page-cart__left")) {
    let cartQuantity = document.querySelectorAll(".cart-top .cart__quantity");
    // let cartForm   = document.querySelector(
    //   ".woocommerce-cart-form.page-cart__left"
    // );
    let cartForm   = document.querySelector(
      ".page-cart__wrap"
    );
   
    cartForm.addEventListener("DOMSubtreeModified", function () {
      if(document.querySelector('.page-cart__right .cart-subtotal th')){
        let cartSubtotal = document.querySelector(
          ".page-cart__right .cart-subtotal th"
        );
        console.log(parseInt(cartSubtotal.textContent));
        cartQuantity[1].textContent = parseInt(cartSubtotal.textContent)

      }
    });
  }
});
