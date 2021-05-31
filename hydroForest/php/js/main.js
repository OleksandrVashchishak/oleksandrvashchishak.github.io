// start common variables
let header = document.querySelector(".header");
let body = document.querySelector("body");
let nav = document.querySelector(".nav");
let navHeight = document.querySelector(".nav__main");
let menuItemProd = document.querySelector(".header__menu-item-prod");
let mobileMenu = document.querySelector(".mobile-menu");
let navClose = document.querySelector(".nav__close");
// end common variables

// start height nav
navHeight.style.height = navHeight.scrollHeight / 2 + 200 + "px";
// end height nav

// start hide header
scrollPrev = 0;
window.addEventListener("scroll", () => {
  let scrolled = document.documentElement.scrollTop;

  if (scrolled > 60 && scrolled > scrollPrev) {
    header.classList.add("active");
    nav.classList.add("active");
    mobileMenu.classList.add("active");
    if (document.querySelector(".products__filter")) {
      document.querySelector(".products__filter").classList.add("long-header");
    }
  } else if (scrolled < 60) {
    header.classList.remove("active");
    nav.classList.remove("active");
    mobileMenu.classList.remove("active");
    if (document.querySelector(".products__filter")) {
      document
        .querySelector(".products__filter")
        .classList.remove("long-header");
    }
  }
  scrollPrev = scrolled;
});
// end hide header

// start burger menu
if (document.querySelector(".header__burger-cont")) {
  let burgerContainer = document.querySelector(".header__burger-cont");
  let burgerTextOpen = document.querySelector(".header__burger-text-open");
  let burgerTextClosed = document.querySelector(".header__burger-text-closed");
  let burgerIconOpen = document.querySelector(".header__burger-menu-closed");
  let burgerIconClosed = document.querySelector(".header__burger-menu-open");

  burgerContainer.addEventListener("click", () => {
    burgerTextClosed.classList.toggle("hidden");
    burgerTextOpen.classList.toggle("hidden");
    burgerIconOpen.classList.toggle("hidden");
    burgerIconClosed.classList.toggle("hidden");
    mobileMenu.classList.toggle("hidden");
  });
}
// end burger menu

// start close nav menu
if (document.querySelector(".nav__close")) {
  navClose.addEventListener("click", () => {
    nav.classList.remove("visible");
  });
}
// end close nav menu

//  start move nav menu
menuItemProd.addEventListener("mouseenter", () => {
  nav.classList.add("visible");
  body.classList.add("scroll");
});
menuItemProd.addEventListener("mouseleave", () => {
  nav.addEventListener("mouseenter", () => {
    nav.classList.add("visible");
    body.classList.add("scroll");
  });
  nav.addEventListener("mouseleave", () => {
    nav.classList.remove("visible");
    body.classList.remove("scroll");
  });
  nav.classList.remove("visible");
  body.classList.remove("scroll");
});
// end move nav menu

// start first letter text js
if (document.querySelector(".fl-text")) {
  const FlText = document.querySelectorAll(".fl-text");
  let FlLetter = document.querySelectorAll(".st-letter");
  for (let i = 0; i < FlText.length; i++) {
    FlLetter[i].innerHTML = FlText[i].innerHTML.trim().split("")[0];
    let arrFlText = FlText[i].innerHTML.trim().split("");
    let text = "";
    let itemCount = 0;
    for (let i of arrFlText) {
      if (itemCount == 0) {
        itemCount++;
        continue;
      }
      text += String(i);
    }
    FlText[i].innerHTML = text;
  }
}
// end first letter text js

// start tabs functions
if (document.querySelector(".tabs-sliders-index")) {
  let tabsItemBtn = document.querySelectorAll(".tabs-sliders__tabs-item");
  let tabsItem = document.querySelectorAll(".tabs-sliders__tab");
  let tabsISlider = document.querySelector(".tabs-sliders");
  for (let i = 0; i < tabsItem.length; i++) {
    tabsISlider.style.opacity = "0";
    setTimeout(() => {
      tabsISlider.style.opacity = "1";
      tabsItem[i].style.display = "none";
    }, 2000);

    tabsItemBtn[i].addEventListener("click", () => {
      for (let i = 0; i < tabsItem.length; i++) {
        tabsItemBtn[i].classList.remove("active");
        tabsItem[i].classList.remove("active");
      }
      tabsItemBtn[i].classList.add("active");
      tabsItem[i].classList.add("active");
    });
  }
}
// end tabs functions

// start video function
if (document.querySelector(".video-home__for-video")) {
  let videoFor = document.querySelectorAll(".video-home__for-video");
  let videoForWrapper = document.querySelectorAll(
    ".video-home__for-video-wpap"
  );
  let iconPlayVideoFor = document.querySelectorAll(
    ".video-home__for-icon-play"
  );
  for (let i = 0; i < videoForWrapper.length; i++) {
    iconPlayVideoFor[i].addEventListener("click", () => {
      videoFor[i].play();
      videoFor[i].setAttribute("controls", "controls");
      videoFor[i].parentElement
        .querySelector(".video-home__for-icon-play")
        .classList.add("hidden");
    });
  }
}
// end video function

// start accordion
if (document.querySelector(".accordion")) {
  let acc = document.querySelectorAll(".accordion");

  for (let i of acc) {
    i.addEventListener("click", function () {
      this.classList.toggle("active");
      let panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
}
// end accordion

// start filter product hide/visible
let getOpenProductFilter;
if (document.querySelector(".products__filter")) {
  getOpenProductFilter = () => {
    let filterClose = document.querySelector(".products__filter-icon-close");
    let filterOpen = document.querySelector(".products__filter-icon-open");
    let filterMain = document.querySelector(".products__filter");
    let htmlTag = document.querySelector("html");
    filterClose.addEventListener("click", () => {
      filterMain.classList.toggle("active");
      htmlTag.style.overflowY = "hidden";
    });
    filterOpen.addEventListener("click", () => {
      filterMain.classList.toggle("active");
      htmlTag.style.overflowY = "visible";
    });
  };
  getOpenProductFilter();
}
// end filter product hide/visible

// start sort hide/visible
let getOpenprodSort;
if (document.querySelector(".cat-prod__sort")) {
  getOpenprodSort = () => {
    let filterClose = document.querySelector(".products__sort-icon-close");
    let filterOpen = document.querySelector(".products__sort-icon-open");
    let filterMain = document.querySelector(".cat-prod__sort");
    let htmlTag = document.querySelector("html");
    filterClose.addEventListener("click", () => {
      filterMain.classList.toggle("active");
      htmlTag.style.overflowY = "hidden";
    });
    filterOpen.addEventListener("click", () => {
      filterMain.classList.toggle("active");
      htmlTag.style.overflowY = "visible";
    });
  };
  getOpenprodSort();
}
// end sort hide/visible

// start single-product video function
if (document.querySelector(".product-top__for")) {
  let videoFor = document.querySelectorAll(".product-top__for-video");
  let iconPlayVideoFor = document.querySelectorAll(".product-top__icon-play");
  for (let i = 0; i < videoFor.length; i++) {
    iconPlayVideoFor[i].addEventListener("click", () => {
      videoFor[i].play();
      videoFor[i].setAttribute("controls", "controls");
      videoFor[i].parentElement
        .querySelector(".product-top__icon-play")
        .classList.add("hidden");
    });
  }
}
// end single-product  video function

// start contact page height
if (document.querySelector(".contacts__item-items-wrap")) {
  let contactHeight = document.querySelector(".contacts__item-items-wrap");
  contactHeight.style.height = contactHeight.scrollHeight / 1.6 + 200 + "px";
}
// end contact page height

// start auto open accordion
if (document.querySelector(".cat-prod")) {
  let prodAcc = document.querySelectorAll(".products__accordion-btn");
  for (let i of prodAcc) {
    i.click();
  }
}
// end auto open accordion

// start single product input counter
if (document.querySelector(".product-top__number-wrap")) {
  let qtyMainCont = document.querySelector(
    ".product-top__number-wrap .quantity"
  );
  let numberBtnPlus = document.createElement("span");
  let numberBtnMinus = document.createElement("span");
  numberBtnPlus.classList.add("product-top__number-btn");
  numberBtnMinus.classList.add("product-top__number-btn");
  numberBtnPlus.classList.add("product-top__number-btn--plus");
  numberBtnMinus.classList.add("product-top__number-btn--minus");
  qtyMainCont.appendChild(numberBtnPlus);
  qtyMainCont.appendChild(numberBtnMinus);
  let numberBtn = document.querySelectorAll(".product-top__number-btn");
  let numberInput = document.querySelector(
    ".product-top__number-wrap .input-text.qty"
  );
  numberInput.addEventListener("mouseenter", () => {
    for (let i of numberBtn) {
      i.classList.add("active");
    }
  });

  numberInput.addEventListener("mouseleave", () => {
    for (let i of numberBtn) {
      i.classList.remove("active");
      i.addEventListener("mouseenter", () => {
        for (let j of numberBtn) {
          j.classList.add("active");
        }
      });
    }
  });

  numberBtnPlus.addEventListener("click", () => {
    numberInput.value++;
  });

  numberBtnMinus.addEventListener("click", () => {
    if (numberInput.value == 1) {
      return;
    }
    numberInput.value--;
  });
}
// end product input counter

// start replace category product btn
let getReplaceBtnCat;
if (document.querySelector(".card-product__buy")) {
  getReplaceBtnCat = (buttonsSelector) => {
    let buttons = document.querySelectorAll(buttonsSelector);
    for (let item of buttons) {
      item.addEventListener("DOMSubtreeModified", () => {
        if (
          item.querySelector(".card-product__buy").classList.contains("added")
        ) {
          item.querySelector(".card-product__buy-text").textContent = document.querySelector(".product-added-text-my").textContent;  
          item.querySelector(".card-product__buy").href = document
            .querySelector(".cart-uri-js")
            .textContent.trim();
          console.log(
            document.querySelector(".cart-uri-js").textContent.trim()
          );
          item 
            .querySelector(".card-product__buy")
            .classList.add("card-product__buy-in-cart");
          item
            .querySelector(".card-product__buy")
            .classList.remove("ajax_add_to_cart");
          getUpdateMiniCart();
        }
      });
    }
  };
  getReplaceBtnCat(".card-product__buttons");
  getReplaceBtnCat(".cat-prod__top-btn");
  getReplaceBtnCat(".card-product__stock-wrap");
}
// end replace  category product btn

// start select active sorting
let addActiveForSorting;
if (document.querySelector(".active-sorting-get")) {
  addActiveForSorting = () => {
    let getQuerryResult = document.querySelector(".active-sorting-get");
    console.log(getQuerryResult.textContent.trim());
    if (getQuerryResult.textContent.trim() == "price-desc") {
      document
        .querySelector("#sort_desc")
        .nextElementSibling.classList.add("active");
    } else if (getQuerryResult.textContent.trim() == "price") {
      document
        .querySelector("#sort_asc")
        .nextElementSibling.classList.add("active");
    } else if (getQuerryResult.textContent.trim() == "popularity") {
      document
        .querySelector("#sort_pop")
        .nextElementSibling.classList.add("active");
    }
  };
  addActiveForSorting();
}
// start select active sorting

// start ajax reload
let ter = 0;
if (document.querySelector(".cat-prod__items.products ")) {
  document
    .querySelector(".wpf-search-container")
    .addEventListener("DOMSubtreeModified", () => {
      let wpfForm = document.querySelectorAll(".wpf_form input");
      for (let item of wpfForm) {
        item.removeAttribute("readonly");
      }
      if (ter == 0) {
        if (
          document
            .querySelector(".wpf-search-container")
            .classList.contains("wpf-container-wait")
        ) {
          ter = 1;

          for (let i = 0; i < 800; i = i + 100) {
            setTimeout(() => {
              document.querySelector("html").style.overflowY = "visible";
              document
                .querySelector(".slider-bunner__left")
                .classList.add("ter");
              document
                .querySelector(".slider-bunner__right")
                .classList.add("ter");
              addActiveForSorting();
            }, i);
          }

          setTimeout(() => {
            document
              .querySelector(".slider-bunner__left")
              .classList.remove("ter");
            document
              .querySelector(".slider-bunner__right")
              .classList.remove("ter");
            $(".slider-bunner__right-slider").slick({
              arrows: false,
              dots: true,
              autoplay: true,
              autoplaySpeed: 5500,
            });
            $(".slider-bunner__left-slider").slick({
              arrows: false,
              dots: true,
              autoplay: true,
              autoplaySpeed: 5500,
            });

            getOpenprodSort();
            getOpenProductFilter();
            addActiveForSorting();
            getReplaceBtnCat(".card-product__buttons");
            getReplaceBtnCat(".cat-prod__top-btn");
            getReplaceBtnCat(".card-product__stock-wrap");
            autoCloseAccFilter();
            document.querySelector("html").style.overflowY = "visible";
            ter = 0;
          }, 800);
        }
      }
    });
}
// end ajax reload

// start ajax reload cart counter
if (document.querySelector(".quantity-counter")) {
  let custonCounterCart = () => {
    let minus = document.querySelectorAll(".quantity-counter-minus");
    let plus = document.querySelectorAll(".quantity-counter-plus");
    let minusAjax = document.querySelectorAll(".wac-qty-button.wac-btn-sub");
    let plusAjax = document.querySelectorAll(".wac-qty-button.wac-btn-inc");
    for (let i = 0; i < minus.length; i++) {
      minus[i].addEventListener("click", () => {
        minusAjax[i].click();
      });
      plus[i].addEventListener("click", () => {
        plusAjax[i].click();
      });
    }
  };
  custonCounterCart();

  let countCart = 0;
  document
    .querySelector(".cart-collaterals")
    .addEventListener("DOMSubtreeModified", () => {
      if (countCart == 0) {
        countCart = 1;
        setTimeout(() => {
          custonCounterCart();
          countCart = 0;
        }, 1000);
      }
    });
}
// end ajax reload cart counter

// start add to header current page class
if (document.querySelector(".tax-product_cat")) {
  if (document.querySelector("body").classList.contains("tax-product_cat")) {
    for (let i of document.querySelectorAll(".header__menu-item-prod")) {
      i.classList.add("current_page_item");
    }
  }
}
if (document.querySelector(".single-product")) {
  if (document.querySelector("body").classList.contains("single-product")) {
    for (let i of document.querySelectorAll(".header__menu-item-prod")) {
      i.classList.add("current_page_item");
    }
  }
}
// end add to header current page class

// start ajax querry for mini cart
let getUpdateMiniCart = () => {
  $.post(
    woocommerce_params.ajax_url,
    { action: "mode_theme_update_mini_cart" },
    function (response) {
      $(".header-cart").html(response);
      delateItemFromMiniCart();
    }
  );
};
// end ajax querry for mini cart

// start delete item from mini cart
let delateItemFromMiniCart;
if (document.querySelector(".header-cart")) {
  delateItemFromMiniCart = () => {
    let delateBtn = document.querySelectorAll(
      ".woocommerce-mini-cart-item .remove_from_cart_button"
    );
    for (let i of delateBtn) {
      i.addEventListener("click", () => {
        setTimeout(() => {
          getUpdateMiniCart();
        }, 300);
      });
    }
  };
  delateItemFromMiniCart();
}
// end delete item from mini cart

// start open mobile cart on hover
if (
  document.querySelector(".header__cart-cont") &&
  !document.querySelector(".my-cart-steps")
) {
  let button = document.querySelector(".header__cart-cont");
  let headerCart = document.querySelector(".header-cart");

  button.addEventListener("mouseenter", (e) => {
    headerCart.classList.add("active");
  });

  button.addEventListener("mouseleave", (e) => {
    headerCart.classList.remove("active");
  });

  headerCart.addEventListener("mouseenter", (e) => {
    headerCart.classList.add("active");
  });

  headerCart.addEventListener("mouseleave", (e) => {
    headerCart.classList.remove("active");
  });
}
// end open mobile cart on hover

// start don't close accordion filter
let autoCloseAccFilter = () => {
  setTimeout(() => {
    let filterAccordion = document.querySelectorAll(".wpf_grouped_label");
    for (let i of filterAccordion) {
      i.addEventListener("click", function () {
        i.nextElementSibling.classList.toggle("visible");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  }, 700);
};
if (document.querySelector(".cat-prod__items")) {
  autoCloseAccFilter();
}
// end don't close accordion filter

// start preloader
if (document.querySelector(".preloader-custom")) {
  let preloaderCounter = 5;
  let loader = document.querySelector(".loader");
  let progressBar = document.querySelector(".progress-bar");
  let progressLine = document.querySelector(".line-progress");
  var progress = setInterval(() => {
    if (loader.classList.contains("loadComplete")) {
      clearInterval(progress);
    } else {
      preloaderCounter++;
      progressBar.textContent = preloaderCounter + "%";
      progressLine.style.paddingLeft = preloaderCounter  + '%'
    
    }
  }, 50);

  document.onreadystatechange = () => {
    var state = document.readyState;
    if (state === "complete") {
      if(document.querySelector('.video-home__slider-for .slick-next')){
      document.querySelector('.video-home__slider-for .slick-next').click()
    }
      setTimeout(function () {
        if(document.querySelector('.video-home__slider-for .slick-prev')){
      document.querySelector('.video-home__slider-for .slick-prev').click()
        }
        progressBar.textContent = "100%";
        progressLine.style.paddingRight =  '100%'
        loader.classList.add("loadComplete");
      }, 1000);
    }
  };
}
// end preloader

