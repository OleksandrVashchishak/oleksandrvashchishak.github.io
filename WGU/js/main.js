// burger menu
let burgerIcon = document.querySelector('.header__burger-closed')
let burgerOpen = document.querySelector('.header__burger-open')
burgerIcon.addEventListener('click', function(){
  burgerIcon.classList.toggle('active')
  burgerOpen.classList.toggle('active')
});
burgerOpen.addEventListener('click', function(){
  burgerIcon.classList.toggle('active')
  burgerOpen.classList.toggle('active')
});


// change with scroll
function onScroll(event){
  var sections = document.querySelectorAll('.sticky__fixed-item');
  var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
  for( var i = 0; i < sections.length; i++ ){
    var currLink = sections[i]; 
    var val = currLink.getAttribute('href');
    var refElement = document.querySelector(val);
      if( refElement.offsetTop <= scrollPos && ( refElement.offsetTop + refElement.offsetHeight > scrollPos)){

       if(document.querySelector('.sticky__fixed-item').classList.contains('active')){
        document.querySelector('.sticky__fixed-item-seo').classList.remove('active')
        return
      }

        if(currLink.classList.contains('active')){
          return
        }
       
        document.querySelector('.sticky__fixed-item').classList.remove('active');
        currLink.classList.add('active');
        currLink.animate([
          { transform: 'translate3D(-400px, 0, 0)' }, 
          { transform: 'translate3D(0px, 0, 0)' }
        ], {
          duration: 1000,
        })
      }else{
         currLink.classList.remove('active');
       }
  }
};

window.document.addEventListener('scroll', onScroll );

let partnersBg = document.querySelector('.partners__bg')
let stickyBg = document.querySelector('.sticky__bg')
let footerBg = document.querySelector('.footer__bg')
// change bg
var element = document.querySelector('#changePartnersBg');

var Visible = function (target) {
  var targetPosition = {
      top: window.pageYOffset + target.getBoundingClientRect().top,
      left: window.pageXOffset + target.getBoundingClientRect().left,
      right: window.pageXOffset + target.getBoundingClientRect().right,
      bottom: window.pageYOffset + target.getBoundingClientRect().bottom
    },

    windowPosition = {
      top: window.pageYOffset,
      left: window.pageXOffset,
      right: window.pageXOffset + document.documentElement.clientWidth,
      bottom: window.pageYOffset + document.documentElement.clientHeight
    };

  if (targetPosition.bottom > windowPosition.top && 
    targetPosition.top < windowPosition.bottom && 
    targetPosition.right > windowPosition.left && 
    targetPosition.left < windowPosition.right) { 

    partnersBg.classList.add('active')
    stickyBg.classList.add('active')
    footerBg.classList.add('active')
  } else {
    partnersBg.classList.remove('active')
    stickyBg.classList.remove('active')
    footerBg.classList.remove('active')
  };
};

window.addEventListener('scroll', function() {
  Visible (element);
});

Visible (element);



