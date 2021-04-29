// start burger menu
let burger = document.querySelector(".header__burger");
let headerMenu = document.querySelector(".header__menu");
let header = document.querySelector(".header");
burger.addEventListener("click", () => {
  burger.classList.toggle("active");
  headerMenu.classList.toggle("active");
});
// end burger menu

if (document.querySelector(".main-black-bg")) {
  header.classList.add("main-black-bg-head");
}
// start hide header
let firstBlockScroll;
if (document.querySelector(".main-black-bg")) {
  firstBlockScroll = document.querySelector(".home-slider").offsetHeight;
  console.log(firstBlockScroll);
} else {
  firstBlockScroll = 600;
}
scrollPrev = 0;

window.addEventListener("scroll", () => {
  let scrolled = document.documentElement.scrollTop;
  if (scrolled > firstBlockScroll && scrolled > scrollPrev) {
    if (window.matchMedia("(min-width: 1023px)").matches) {
      header.classList.add("active");
    }
    if (document.querySelector(".main-black-bg")) {
      header.classList.add("active-dark");
    }
  } else if (scrolled < firstBlockScroll) {
    header.classList.remove("active");
    header.classList.remove("active-dark");
  }
  scrollPrev = scrolled;
});
// end hide header

// start mobile header dropdown

// if (window.matchMedia("(max-width: 1023px)").matches) {
//   let dropdownCont = document.querySelector(".header__drop-cont");
//   let dropdown = document.querySelector(".header__dropdown");
//   dropdownCont.addEventListener('click', () => {
//     dropdown.classList.toggle('active')
//   })
// }

// end mobile header dropdown

// start hover for slider
$(".two-slider__inner").mouseenter(function () {
  this.parentNode
    .querySelector(".two-slider__item-img")
    .classList.add("hoverpic");
});

$(".two-slider__inner").mouseleave(function () {
  $(".two-slider__item-img").removeClass("hoverpic");
});
// end hover for slider
