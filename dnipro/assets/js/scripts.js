jQuery(document).ready(function ($) {
  "use strict";

  //Slick slider
  if ($('.slider_elem').length) {
    $('.slider_elem .slider_wrapper').slick({
      arrows: false,
      dots: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 600,
      autoplay: true,
      autoplaySpeed: 5000,
    });
  }

  //Slick slider for document
  if ($('.single_document__carousel').length) {
    $('.single_document__carousel').slick({
      arrows: true,
      dots: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 600,
      autoplay: false,
      autoplaySpeed: 4000,
      //adaptiveHeight: true,
      nextArrow: '<i class="fas fa-chevron-right slick-next"></i>',
      prevArrow: '<i class="fas fa-chevron-left slick-prev"></i>',
    });
  }

  //Open contact with button
  if ($('.single_contact .single_contact__btn_elem').length) {
    $('.single_contact .single_contact__btn_elem').on('click', function () {
      $('.single_contact .single_contact__content').slideToggle('slow', function () {
        $('.single_contact .single_contact__btn_elem').toggleClass('active', $(this).is(':visible'));
      });
    });
  }

  //Magnific popup
  if ($('.popup_form').length) {
    $('.popup_form').magnificPopup({
      type: 'inline',
      delegate: 'a',
      midClick: true,
      preloader: false,
      mainClass: 'popup_form_wrap',
      removalDelay: 300,
      closeOnContentClick: false,
      closeOnBgClick: false
    });
  }

  //Scrool to the next section
  // if ($('.home_hero .next_section_btn').length) {
  //   $(function () {
  //     $('.home_hero .next_section_btn').on('click', function (e) {
  //       e.preventDefault();
  //       $('html, body').animate({
  //         scrollTop: $($('#home_hiw')).offset().top - 80
  //       }, 500, 'linear');
  //       return false;
  //     });
  //   });
  // }

  //Burger menu
  if ($('.burger_menu').length) {
    $('.burger_menu__elem').on('click', function (e) {
      $('.dspdmr_header__sm .menu-main-menu-container ul').slideToggle(400);
      $(this).toggleClass('active');
      e.preventDefault();
    });
  }

});

//Events when CF7 forms sent
document.addEventListener('wpcf7mailsent', function (event) {
  setTimeout(function () {
    jQuery.magnificPopup.close();
    jQuery('.wpcf7 form.sent .wpcf7-response-output').hide();
  }, 5000)
}, false);




if (document.querySelector('.availability-panel')) {
  // --- buttons---
  const btnFontSizeMinus = document.querySelector('.font-size-click-minus')
  const btnFontSizePlus = document.querySelector('.font-size-click-plus')
  const btnFletterSpacNormal = document.querySelector('.letter-spacing-click-normal')
  const btnFletterSpacLarge = document.querySelector('.letter-spacing-click-large')
  const btnHiddenImg = document.querySelector('.hidden-img-click')
  const btnVisibleImg = document.querySelector('.visible-img-click')
  const btnNormalTheme = document.querySelector('.normal-theme-click')
  const btnDarkTheme = document.querySelector('.dark-theme-click')
  const btnBlueTheme = document.querySelector('.blue-theme-click')
  // ---elements---
  const availabilityPanel = document.querySelector('.availability-panel')
  const openPanel = document.querySelector('.open-availability-panel')
  const closePanel = document.querySelector('.close-availability-panel')
  // ---all tags-- 
  const allTags = document.querySelectorAll('html *')

  // ---panel navigation---
  openPanel.addEventListener('click', () => availabilityPanel.classList.add('active'))
  closePanel.addEventListener('click', () => availabilityPanel.classList.remove('active'))


  // ---scale font size---
  const textElementsSelector = '.service_heading, .service_btn, .footer_copyright, .menu-header-menu-container a, .entry-title, .slide_heading, .slide_subheading, .slide_btn, .single_hero__heading, .single_content *, .single_contact__btn_elem'
  btnFontSizeMinus.addEventListener('click', () => normalFontSize())
  btnFontSizePlus.addEventListener('click', () => scaleFontSize150())

  const scaleFontSize150 = () => {
    if (btnFontSizePlus.classList.contains('active')) {
      return
    }
    getChangeBtns(btnFontSizePlus, btnFontSizeMinus)
    document.querySelectorAll(textElementsSelector).forEach(e => {
      e.style.fontSize = (parseInt(window.getComputedStyle(e).fontSize) * 1.5) + 'px'
    })
  }


  const normalFontSize = () => {
    if (btnFontSizeMinus.classList.contains('active')) {
      return
    }
    getChangeBtns(btnFontSizeMinus, btnFontSizePlus)
    document.querySelectorAll(textElementsSelector).forEach(e => {
      e.style.removeProperty("font-size");
    })
  }



  // ---scale latter spacing---
  btnFletterSpacNormal.addEventListener('click', () => normalLatterSpacing())
  btnFletterSpacLarge.addEventListener('click', () => largeLatterSpacing())

  const normalLatterSpacing = () => {
    getChangeBtns(btnFletterSpacNormal, btnFletterSpacLarge)
    allTags.forEach(e => {
      e.style.letterSpacing = 'normal'
    })
  }

  const largeLatterSpacing = () => {
    getChangeBtns(btnFletterSpacLarge, btnFletterSpacNormal)
    allTags.forEach(e => {
      e.style.letterSpacing = '2px'
    })
  }

  // ---hidden img---
  btnHiddenImg.addEventListener('click', () => hiddenImgClick())
  const hiddenImgClick = () => {
    getChangeBtns(btnHiddenImg, btnVisibleImg)
    document.querySelectorAll('body img').forEach(e => {
      e.style.visibility = 'hidden'
    })
    document.querySelectorAll('.slide_item').forEach(e => {
      e.classList.add('background-image-none')
    })
    document.querySelectorAll('.single_hero').forEach(e => {
      e.classList.add('background-image-none')
    })
  }

  // ---visible img---
  btnVisibleImg.addEventListener('click', () => visibleImgClick())
  const visibleImgClick = () => {
    getChangeBtns(btnVisibleImg, btnHiddenImg)
    document.querySelectorAll('body img').forEach(e => {
      e.style.visibility = 'visible'
    })
    document.querySelectorAll('.slide_item').forEach(e => {
      e.classList.remove('background-image-none')
    })
    document.querySelectorAll('.single_hero').forEach(e => {
      e.classList.remove('background-image-none')
    })
  }

  // normal theme
  btnNormalTheme.addEventListener('click', () => normalThemeColor())
  const normalThemeColor = () => {
    getChangeBtns(btnNormalTheme, btnDarkTheme, btnBlueTheme)
    document.querySelectorAll('html *').forEach(e => {
      e.classList.remove('dark-theme-style')
      e.classList.remove('blue-theme-style')
    })
  }

  //  ---theme styles---
  btnDarkTheme.addEventListener('click', () => changeSiteTheme('dark-theme-style'))
  btnBlueTheme.addEventListener('click', () => changeSiteTheme('blue-theme-style'))

  const changeSiteTheme = (themeStyle) => {
    normalThemeColor()
    allTags.forEach(e => {
      e.classList.add(themeStyle)
    })
    if (themeStyle == 'dark-theme-style') {
      getChangeBtns(btnDarkTheme, btnNormalTheme, btnBlueTheme)
    } else {
      getChangeBtns(btnBlueTheme, btnDarkTheme, btnNormalTheme)
    }
  }

  // ---normal site version ---
  document.querySelector('.normal-version-click').addEventListener('click', () => {
    normalThemeColor()
    visibleImgClick()
    normalLatterSpacing()
    normalFontSize()
  })

  // ---change buttons---
  const getChangeBtns = (additem, removeitem, removeitemTwo) => {
    if (additem) {
      additem.classList.add('active')
      localStorage.setItem(additem.getAttribute('name'), true);
    }
    if (removeitem) {
      removeitem.classList.remove('active')
      localStorage.setItem(removeitem.getAttribute('name'), false);
    }
    if (removeitemTwo) {
      removeitemTwo.classList.remove('active')
      localStorage.setItem(removeitemTwo.getAttribute('name'), false);
    }
  }

  const getStorangeDate = () => {
    if (localStorage.getItem('spacing-large') == 'true') {
      largeLatterSpacing()
    }

    if (localStorage.getItem('img-off') == 'true') {
      hiddenImgClick()
    }

    if (localStorage.getItem('theme-dark') == 'true') {
      changeSiteTheme('dark-theme-style')
    }

    if (localStorage.getItem('theme-blue') == 'true') {
      changeSiteTheme('blue-theme-style')
    }
    
    if (localStorage.getItem('large-font-size') == 'true') {
      scaleFontSize150()
    }


  }
  getStorangeDate()
}



// prevent default if menu has child
if (document.querySelector('.menu-header-menu-container .menu-item-has-children > a')) {
  document.querySelectorAll('.menu-header-menu-container .menu-item-has-children > a').forEach(e => {
    e.addEventListener('click', (event) => {
      e.classList.toggle("active");
      const panel = e.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }


      event.preventDefault()
      return false
    })
  })
}

// header burger
let burgerContainer = document.querySelector('.header__burger')
let headerMenu = document.querySelector('.dspdmr_header__content')
let html = document.querySelector('html')

burgerContainer.addEventListener('click', () => {
  burgerContainer.classList.toggle('active')
  headerMenu.classList.toggle('active')
  if (burgerContainer.classList.contains('active')) {
    html.style.overflowY = 'hidden'
  } else {
    html.style.overflowY = 'auto'
  }
})

// header menu drobdown

