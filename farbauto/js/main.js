let headerMenu = document.querySelector('.header__menu')
let burger = document.querySelector('.burger__container')
burger.addEventListener('click', () => {
  burger.classList.toggle('active')
  headerMenu.classList.toggle('active')
})

if (window.matchMedia("(max-width: 1050px)")) {
  console.log(document.querySelector('.header__phone a'));
  document.querySelector('.header__btn').addEventListener('click', () => {
    console.log('12');
    console.log(2);
    burger.classList.remove('active')
    headerMenu.classList.remove('active')
  })
  console.log('1');
}



if (document.querySelector('.work-tab__btn')) {
  const tabBtn = document.querySelectorAll('.work-tab__btn')
  const tabItem = document.querySelectorAll('.work-tab__page')
  tabBtn.forEach((element, index) => {


    element.addEventListener('click', () => {
      window.matchMedia("(max-width: 600px)").matches ? window.location.href = '#work-pages' : ''
      tabBtn.forEach((e, i) => {
        e.classList.remove('active')
        tabItem[i].classList.remove('active')
      })

      element.classList.add('active')
      tabItem[index].classList.add('active')
    })
  })
}



document.querySelectorAll(".btn_").forEach(function (a) {
  a.addEventListener("click", function (event) {
    event.preventDefault();
    const hash = event.target.getAttribute("href");
    const scrollTarget = document.querySelector(hash);
    const headerHeight = 100;
    window.scrollTo(0, scrollTarget.offsetTop - headerHeight);
  });
});