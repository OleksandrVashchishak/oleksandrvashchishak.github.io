// start load more js
if (document.querySelector('.btn-loadmore')) {

  jQuery(function ($) {
    $('.btn-loadmore').on('click', function () {
      let _this = $(this);
      _this.html('<span class="fas fa-redo fa-spin"></span> Loading...');

      let data = {
        'action': 'loadmore',
        'query': _this.attr('data-param-posts'),
        'page': this_page,
        'tpl': _this.attr('data-tpl')
      }

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: data,
        type: 'POST',
        success: function (data) {
          if (data) {
            _this.html('<span class="fas fa-redo"></span> Load more');
            document.querySelector('.blog__items').innerHTML += data;
            this_page++;
            if (this_page == _this.attr('data-max-pages')) {
              _this.remove();
            }
          } else {
            _this.remove();
          }
        }
      });
    });

  });
  // end load more js

  // start load category
  jQuery(function ($) {
    $('.blog__category li a').on('click', function (event) {
      let _this = $(this);
      const allCats = document.querySelectorAll('.blog__category li a')
      allCats.forEach(e => {
        e.classList.remove('active')
      })
      _this.addClass('active')

      let categoryName = _this.attr('href').split('/');
      event.stopPropagation();
      event.preventDefault();
      let data = {
        'action': 'loadcategory',
        'category_querry': categoryName[categoryName.length - 2],
      }

      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: data,
        type: 'POST',
        success: function (data) {
          if (data) {
            document.querySelector('.blog__items').innerHTML = data;
            document.querySelector('.blog__load-more').style.display = 'none'
          } else {
            _this.remove();
          }
        }
      });
    });

  });
  // end load category
}

//WOW js
var wow = new WOW({
  boxClass: 'wow',
  animateClass: 'animated',
  offset: 0,
  mobile: true,
  live: true,
});

wow.init();

jQuery(document).ready(function ($) {
  'use strict';

  if ( $('.home .second_image__wrapper').length ) {
    var controller = new ScrollMagic.Controller();
    if (window.matchMedia("(min-width: 600px)").matches) {
      var tween = TweenMax.to("img.warrior", 0.5, { y: '-90px' });
    } else if (window.matchMedia("(max-width: 600px)").matches) {
      var tween = TweenMax.to("img.warrior", 0.5, { y: '-58px' });
    }
    var scene = new ScrollMagic.Scene({ triggerElement: "img.warrior", duration: "100%", triggerHook: "onCenter" })
      .setTween(tween)
      .addTo(controller);
  }

  let scrollPrev = 0;
  window.addEventListener('scroll', () => {
    let scrolled = document.documentElement.scrollTop
    if (scrolled > 200) {
      document.querySelector('header').classList.add('active');
    } else {
      document.querySelector('header').classList.remove('active');
    }
    scrollPrev = scrolled;
  })

  //Heroes slider
  if ($('.slider-thumbnails').length) {
    $('.slider-character-items').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      asNavFor: '.slider-thumbnails'
    });

    $('.slider-thumbnails').slick({
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev slider-arrow-prev"><svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7078 1.29183C14.801 1.38473 14.8748 1.49508 14.9253 1.61657C14.9757 1.73806 15.0016 1.8683 15.0016 1.99983C15.0016 2.13137 14.9757 2.26161 14.9253 2.3831C14.8748 2.50459 14.801 2.61494 14.7078 2.70783L3.41383 13.9998L14.7078 25.2918C14.8956 25.4796 15.0011 25.7343 15.0011 25.9998C15.0011 26.2654 14.8956 26.5201 14.7078 26.7078C14.5201 26.8956 14.2654 27.0011 13.9998 27.0011C13.7343 27.0011 13.4796 26.8956 13.2918 26.7078L1.29183 14.7078C1.19871 14.6149 1.12482 14.5046 1.07441 14.3831C1.024 14.2616 0.998047 14.1314 0.998047 13.9998C0.998047 13.8683 1.024 13.7381 1.07441 13.6166C1.12482 13.4951 1.19871 13.3847 1.29183 13.2918L13.2918 1.29183C13.3847 1.19871 13.4951 1.12482 13.6166 1.07441C13.7381 1.024 13.8683 0.998047 13.9998 0.998047C14.1314 0.998047 14.2616 1.024 14.3831 1.07441C14.5046 1.12482 14.6149 1.19871 14.7078 1.29183Z" fill="url(#paint0_linear)"/><defs><linearGradient id="paint0_linear" x1="3.62741" y1="0.998047" x2="13.4499" y2="1.69143" gradientUnits="userSpaceOnUse"><stop stop-color="#1FA1FF"/><stop offset="1" stop-color="#1F5EFF"/></linearGradient></defs></svg></button>',
      nextArrow: '<button type="button" class="slick-next slider-arrow-next"><svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.29216 25.7082C1.19904 25.6153 1.12515 25.5049 1.07474 25.3834C1.02433 25.2619 0.998377 25.1317 0.998377 25.0002C0.998377 24.8686 1.02433 24.7384 1.07474 24.6169C1.12515 24.4954 1.19904 24.3851 1.29216 24.2922L12.5862 13.0002L1.29216 1.70817C1.10439 1.52039 0.998901 1.26572 0.998901 1.00017C0.998901 0.734615 1.10439 0.479939 1.29216 0.292166C1.47994 0.104393 1.73461 -0.00109673 2.00016 -0.00109673C2.26572 -0.00109673 2.52039 0.104393 2.70816 0.292166L14.7082 12.2922C14.8013 12.3851 14.8752 12.4954 14.9256 12.6169C14.976 12.7384 15.002 12.8686 15.002 13.0002C15.002 13.1317 14.976 13.2619 14.9256 13.3834C14.8752 13.5049 14.8013 13.6153 14.7082 13.7082L2.70816 25.7082C2.61527 25.8013 2.50492 25.8752 2.38343 25.9256C2.26194 25.976 2.1317 26.002 2.00016 26.002C1.86863 26.002 1.73839 25.976 1.6169 25.9256C1.49541 25.8752 1.38506 25.8013 1.29216 25.7082Z" fill="url(#paint0_linear)"/><defs><linearGradient id="paint0_linear" x1="12.3726" y1="26.002" x2="2.55013" y2="25.3086" gradientUnits="userSpaceOnUse"><stop stop-color="#1FA1FF"/><stop offset="1" stop-color="#1F5EFF"/></linearGradient></defs></svg></button>',
      asNavFor: '.slider-character-items',
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
          }
        }
      ]
    });

    // Remove active class from all thumbnail slides
    $('.slider-thumbnails .slick-slide').removeClass('slick-active');

    // Set active class to first thumbnail slides
    $('.slider-thumbnails .slick-slide').eq(0).addClass('slick-active');

    // On before slide change match active thumbnail to current slide
    $('.slider-character-items').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var mySlideNumber = nextSlide;
      $('.slider-thumbnails .slick-slide').removeClass('slick-active');
      $('.slider-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');

      //Active animation for slider
      //WOW js
      var wow_slide = new WOW({
        boxClass: 'slide-wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true,
      });

      wow_slide.init();
    });
  }

  //Add custom border for Characters carousel
  if ($('.slider-character-items').length) {
    //Get height for carousel
    var height_carousel = $('.slider-character-items').height();
    var total_height = height_carousel + 40;

    $('.slider-character-items').prepend(
      '<svg class="slider-character-items__border" preserveAspectRatio="none" width="1209" height="' + total_height + '" viewBox="0 0 1209 613" fill="none" xmlns="http://www.w3.org/2000/svg">' +
      '<path d="M1209 613H242.091L226.433 596.266H0V1.3751e-05H865.194L887.255 23.5718H1209V613ZM1.34268 1.4347V594.831H226.988L242.647 611.565H1207.66V25.0065H886.699L864.639 1.4347H1.34268Z" fill="url(#paint0_linear_119:738)"/>' +
      '<defs>' +
      '<linearGradient id="paint0_linear_119:738" x1="227.006" y1="613" x2="1025.86" y2="406.474" gradientUnits="userSpaceOnUse">' +
      '<stop stop-color="#1FA1FF"/>' +
      '<stop offset="1" stop-color="#1F5EFF"/>' +
      '</linearGradient>' +
      '</defs>' +
      '</svg>'
    );
  }


  $('.upgradeable_characters__slider').slick({
    arrows: false,
    infinite: true,
    centerMode: true,
    centerPadding: "32%",
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    focusOnSelect: true,
  });

  jQuery('.video-trailer span.fa-youtube').on("click", function () {
    jQuery('.popup-overlay').show(100);
    jQuery('.popup-video').slideToggle(300);
    jQuery('body').css('overflow-y', 'hidden');
  });

  jQuery('.popup-video span.fa-close').on("click", function () {
    jQuery('.popup-video').slideToggle(300);
    jQuery('.popup-overlay').hide(100);
    jQuery('body').css('overflow-y', 'auto');
  });

  jQuery('.popup-overlay').on("click", function () {
    jQuery('.popup-video').slideToggle(300);
    jQuery(this).hide(100);
    jQuery('body').css('overflow-y', 'auto');
  });

  jQuery('.menu-burger__header').on("click", function () {
    jQuery('.menu').toggleClass('opened-menu', 1000);
    jQuery('.menu-burger__header').toggleClass('open-menu', 1000);
    jQuery('nav>button.ethpress-metamask-login-button').toggleClass('ethpress-metamask-login-button-active', 1000);
    document.querySelector('header').classList.remove('active')
  })

  jQuery('.footer_newsletter').on("click", function () {
    jQuery('.newsletter-container').toggleClass('newsletter-container-active');
  });

  jQuery('.newsletter-inner span.fa-close ').on("click", function () {
    jQuery('.newsletter-container').toggleClass('newsletter-container-active');
  });

  if( $('.founder_popup').length ) {
    $('#founder_popup').on("click", function () {
      $('.founder_popup').toggleClass('founder_popup__active');
    });

    $('.founder_popup span.fa-close ').on("click", function () {
      $('.founder_popup').toggleClass('founder_popup__active');
    });
  }


  $(document).ready(function () {
    /* Check the location of each desired element */
    $('section.coming-soon .revenue-item').each(function (i) {

      var bottom_of_object = jQuery('section.coming-soon').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(1000, 1);

      }
    });
  });

  $(document).ready(function () {
    /* Check the location of each desired element */
    $('.info-box').each(function (i) {

      var bottom_of_object = jQuery('section.trailer-section').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(3000, 1);

      }
    });
  });

  $(document).ready(function () {
    /* Check the location of each desired element */
    $('.team-member-single').each(function (i) {

      var bottom_of_object = jQuery('section#about-us').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 500).fadeTo(1000, 1);

      }
    });
  });

  $(document).ready(function () {
    /* Check the location of each desired element */
    $('.investor-item').each(function (i) {

      var bottom_of_object = jQuery('section#about-us').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(1000, 1);

      }
    });
  });

  $(document).ready(function () {
    /* Check the location of each desired element */
    $('.partner-item').each(function (i) {

      var bottom_of_object = jQuery('section.investors_and_partners').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(1000, 1);

      }
    });
  });

  /* Check the location of each desired element */
  $(document).ready(function () {
    $('section.revenue .revenue-item').each(function (i) {

      var bottom_of_object = jQuery('section.revenue').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(1000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  $(document).ready(function () {

    /* Check the location of each desired element */
    $('.event-item').each(function (i) {

      var bottom_of_object = jQuery('section#roadmap').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 500).fadeTo(1000, 1);

      }
    });
  });



  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('.info-box').each(function (i) {

      var bottom_of_object = jQuery('section.trailer-section').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(3000, 1);

      }
    });
  });


  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('.event-item').each(function (i) {

      var bottom_of_object = jQuery('section#roadmap').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 500).fadeTo(1000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('.team-member-single').each(function (i) {

      var bottom_of_object = jQuery('section#about-us').position().top + 150;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 300).fadeTo(1000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('.investor-item').each(function (i) {

      var bottom_of_object = jQuery('section.investors_and_partners').position().top + 150;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 500).fadeTo(2000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('.partner-item').each(function (i) {

      var bottom_of_object = jQuery('section.investors_and_partners').position().top + 250;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 400).fadeTo(2000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('section.revenue .revenue-item').each(function (i) {

      var bottom_of_object = jQuery('section.revenue').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 200).fadeTo(1000, 1);

      }
    });
  });

  /* Every time the window is scrolled ... */
  jQuery(window).scroll(function () {

    /* Check the location of each desired element */
    $('section.coming-soon .revenue-item').each(function (i) {

      var bottom_of_object = jQuery('section.coming-soon').position().top;
      var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

      /* If the object is completely visible in the window, fade it it */
      if (bottom_of_window > bottom_of_object) {

        jQuery(this).delay((i++) * 500).fadeTo(1000, 1);

      }
    });
  });

  $(window).scroll(function (e) {
    var offsetRange = $(window).height() / 3,
      offsetTop = $(window).scrollTop() + offsetRange + $(".site-header").outerHeight(true),
      offsetBottom = offsetTop + offsetRange;

    if( $('.founder_section video.store-video').length ) {
      $(".founder_section video.store-video").each(function () {
        var y1 = $(this).offset().top;
        var y2 = offsetTop;
        if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
          this.pause();
        } else {
          this.play();
        }
      });
    }

    $("#wallpaper video.main-video").each(function () {
      var y1 = $(this).offset().top;
      var y2 = offsetTop;
      if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
        this.pause();
      } else {
        this.play();
      }
    });

    $(".coming-soon-video video").each(function () {
      var y1 = $(this).offset().top;
      var y2 = offsetTop;
      if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
        this.pause();
      } else {
        this.play();
      }
    });

    $(".unique-looking_img video").each(function () {
      var y1 = $(this).offset().top;
      var y2 = offsetTop;
      if (y1 + $(this).outerHeight(true) < y2 || y1 > offsetBottom) {
        this.pause();
      } else {
        this.play();
      }
    });
  });

  jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 500) {
      jQuery('#scrollUp').show();
    } else {
      jQuery('#scrollUp').hide();
    }
  });

  jQuery('#scrollUp').click(function (e) {
    e.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, 700);
  });
});

// Scrool to the next section
document.querySelectorAll("#primary-menu a").forEach(function (e) {
  e.addEventListener("click", function (event) {
    const locationArr = window.location.href.split('/')
    if (locationArr.length > 4 || !e.parentElement.classList.contains('menu_anchor')) {
      return
    }
    event.preventDefault();
    const hash = event.target.getAttribute("href");
    const hashArr = hash.split('/')
    let scrollTarget
    if (hashArr.length > 1) {
      scrollTarget = document.querySelector(hashArr[hashArr.length - 1]);
    } else {
      scrollTarget = document.querySelector(hash);
    }
    const headerHeight = 100;
    window.scrollTo(0, scrollTarget.offsetTop - headerHeight);

  });
});

// close mobile menu on click
if (document.querySelector('#primary-menu.menu li a')) {
  document.querySelectorAll('#primary-menu.menu li a').forEach(e => {
    e.addEventListener('click', () => {
      document.querySelector('#primary-menu.menu').classList.toggle('opened-menu')
      document.querySelector('.menu-burger__header').classList.toggle('open-menu')
    })
  })
}

//Play first video after page load
jQuery(window).on("load", function () {
  var video_jq = jQuery('#wallpaper video.main-video')
  var video_node = video_jq.get(0);

  if (video_jq.length) {
    video_jq.on("canplaythrough", function (e) {
      video_node.play();
    });

    video_node.load();
  }
});

/**
 * Browser function detect user agent
 */
var BrowserDetect = {
  init: function () {
    this.browser = this.searchString(this.dataBrowser) || "Other";
    this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
  },
  searchString: function (data) {
    for (var i = 0; i < data.length; i++) {
      var dataString = data[i].string;
      this.versionSearchString = data[i].subString;

      if (dataString.indexOf(data[i].subString) !== -1) {
        return data[i].identity;
      }
    }
  },
  searchVersion: function (dataString) {
    var index = dataString.indexOf(this.versionSearchString);
    if (index === -1) {
      return;
    }

    var rv = dataString.indexOf("rv:");
    if (this.versionSearchString === "Trident" && rv !== -1) {
      return parseFloat(dataString.substring(rv + 3));
    } else {
      return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
    }
  },

  dataBrowser: [{
      string: navigator.userAgent,
      subString: "Edge",
      identity: "MS Edge"
    },
    {
      string: navigator.userAgent,
      subString: "MSIE",
      identity: "Explorer"
    },
    {
      string: navigator.userAgent,
      subString: "Trident",
      identity: "Explorer"
    },
    {
      string: navigator.userAgent,
      subString: "Firefox",
      identity: "Firefox"
    },
    {
      string: navigator.userAgent,
      subString: "Opera",
      identity: "Opera"
    },
    {
      string: navigator.userAgent,
      subString: "OPR",
      identity: "Opera"
    },

    {
      string: navigator.userAgent,
      subString: "Chrome",
      identity: "Chrome"
    },
    {
      string: navigator.userAgent,
      subString: "Safari",
      identity: "Safari"
    }
  ]
};

BrowserDetect.init();

var bv = BrowserDetect.browser;
if (bv == "Chrome") {
  jQuery("body").addClass("chrome");
} else if (bv == "MS Edge") {
  jQuery("body").addClass("edge");
} else if (bv == "Explorer") {
  jQuery("body").addClass("ie");
} else if (bv == "Firefox") {
  jQuery("body").addClass("firefox");
} else if (bv == "Safari") {
  jQuery("body").addClass("safari");
}