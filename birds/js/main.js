// start burger menu
let headerMenu = document.querySelector('.header__menu')
let burger = document.querySelector('.burger__container')
let header = document.querySelector('.header')
burger.addEventListener('click', () => {
  burger.classList.toggle('active')
  headerMenu.classList.toggle('active')
  header.classList.toggle('active')
})

let headerMenuItem = document.querySelectorAll('.header__menu li a')
for (let i of headerMenuItem) {
  i.addEventListener('click', () => {
    burger.classList.remove('active')
    headerMenu.classList.remove('active')
    header.classList.remove('active')
  })
}
// end burger menu

// start view more text in main page
// if (document.querySelector('.three-block__text')) {
//   let viewMoreBtn = document.querySelector('.three-block__view-more')
//   let viewMoreText = document.querySelector('.three-block__text.hidden')
//   viewMoreBtn.addEventListener('click', () => {
//     viewMoreBtn.classList.add('hidden')
//     viewMoreText.classList.remove('hidden')
//     viewMoreText.classList.add('visible')

//   })
// }
// end more text in main page

// start custom slect 
if (document.querySelector('.contact__form-select')) {
  let select = document.querySelector('.contact__form-select')
  let selectSvg = document.querySelector('.contact__svg')
  let selectSvg_ = document.querySelector('.contact__svg svg')
  let selectSvg__ = document.querySelector('.contact__svg path')
  let optionsCont = document.querySelector('.contact__select-options')


  //open select
  select.addEventListener('click', () => {
    optionsCont.classList.toggle('active')
    selectSvg.classList.toggle('active')
  })

  selectSvg.addEventListener('click', () => {
    optionsCont.classList.toggle('active')
    selectSvg.classList.toggle('active')
  })

  let option = document.querySelectorAll('.contact__select-option')
  for (let i of option) {
    i.addEventListener('click', e => {
      select.value = e.target.textContent
      optionsCont.classList.remove('active')
      selectSvg.classList.remove('active')
    })
  }
  document.addEventListener('click', e => {
    let target = e.target
    if (!target.classList.contains('contact__select-option') &&
      !target.classList.contains('contact__form-select') &&
      !target.classList.contains('contact__svg') &&
      target != selectSvg_ &&
      target != selectSvg__) {
      optionsCont.classList.remove('active')
      selectSvg.classList.remove('active')
    }
  })

}
// end custom slect 

// start move tooltipe
if (document.querySelector('.tooltipLink')) {
  $('.tooltipLink').hover(function () {
    var title = $(this).attr('data-tooltip');
    $(this).data('tipText', title);
    if (title == '') { }
    else {
      $('<p class="tooltip"></p>').fadeIn(200).text(title).appendTo('body');
    }
  }, function () {
    $(this).attr('data-tooltip', $(this).data('tipText'));
    $('.tooltip').fadeOut(200);
  }).mousemove(function (e) {
    var mousex = e.pageX;
    var mousey = e.pageY;
    $('.tooltip').css({
      top: mousey,
      left: mousex,
      dispaly: 'flex'
    })
  });
}
// end move tooltipe

// start more text about us
if (document.querySelector('.two-block__about-more')) {
  let moreBtn = document.querySelector('.two-block__about-more')
  let textHidden = document.querySelectorAll('.two-block__about-text-hidden')
  moreBtn.addEventListener('click', () => {
    moreBtn.classList.add('hidden')
    for (let i of textHidden) {
      i.classList.remove('hidden')
    }
  })
}
// end more text about us

// start config range
if (document.querySelector('.contact__range')) {
  let rangePriceOutput = document.querySelector('.contact__range-price-js')
  let range = document.querySelector('.contact__range')
  let rangeMin = document.querySelector('.contact_range-min')
  let rangeMax = document.querySelector('.contact_range-max')
  let rangeValue = document.querySelector('.contact_range-value')
  range.min = rangeMin.textContent
  range.max = rangeMax.textContent
  range.value = rangeValue.textContent
  rangePriceOutput.textContent = range.value
  // for desktop
  document.addEventListener('mousemove', () => {
    rangePriceOutput.textContent = range.value
  })
  //for mobiel
  document.addEventListener('change', () => {
    rangePriceOutput.textContent = range.value
  })
}
// end config range

// start view more items in about page
if (document.querySelector('.about-scroll__skill-block')) {
  const skillBlock = document.querySelectorAll('.about-scroll__skill-block')
  for (let containerItem of skillBlock) {
    let skillItem = containerItem.querySelectorAll('.about-scroll__skill')

    for (let item of skillItem) {
      item.classList.add('hidden')
    }
    for (let i = 0; i < 4; i++) {
      skillItem[i].classList.remove('hidden')
    }

    // view more items on click
    let btnViewMore = containerItem.querySelector('.about-scroll__skill-more')

    if(skillItem.length < 5){
      btnViewMore.classList.add('hidden')
    }

    btnViewMore.addEventListener('click', () => {
      btnViewMore.classList.add('hidden')
      let skillItem = containerItem.querySelectorAll('.about-scroll__skill')
      for (let item of skillItem) {
        if (item.classList.remove('hidden')) {
          item.classList.contains('hidden')
        }
      }
    })

  }

}
// end view more items in about page




