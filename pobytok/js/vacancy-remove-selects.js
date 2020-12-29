'use strict';

(function () {

  let selectHeaders = document.querySelectorAll('.select__header');
  let selectHeaderInputs = document.querySelectorAll('.select__header input');
  let selectHeaderSpans = document.querySelectorAll('.select__header span');
  let selectWraps = document.querySelectorAll('.select-wrap');

  document.addEventListener('click', function (e) {
    for (let i = 0; i < selectHeaders.length; i++) {
      if (e.target !== selectHeaders[i] && e.target !== selectHeaderInputs[i] && e.target !== selectHeaderSpans[i]) {
        selectWraps[i].classList.remove('is-active');
        selectHeaderSpans[i].classList.remove('arrow-up');
      }
    }
  })
})();


// custom tooltipe vacancy
if(document.querySelector('.offers-block__filter-vacancy')){

  const salerOrigin = document.querySelector('#employer-type')
  const stateOrigin = document.querySelector('#offer-type')
  const scoreOrigin = document.querySelector('#worktime')
  const deliveryOrigin = document.querySelector('#property-from-work')
  
  window.addEventListener('load', function () { 
      let O = document.getElementById('custom-tooltipe'),
          Y = 0
  salerOrigin.parentNode.parentNode.children[2].addEventListener('click', function () {
          Y = salerOrigin.getBoundingClientRect().top + pageYOffset + (salerOrigin.clientHeight/2); 
          setTimeout(getOpacity, 1500);
          function getOpacity() { 
            O.style.opacity = 1
          }
      });
  
      stateOrigin.parentNode.parentNode.children[2].addEventListener('click', function () {
          Y = stateOrigin.getBoundingClientRect().top + pageYOffset + (stateOrigin.clientHeight/2); 
          setTimeout(getOpacity, 1500);
          function getOpacity() { 
            O.style.opacity = 1
          }
      });
  
      scoreOrigin.parentNode.parentNode.children[2].addEventListener('click', function () {
          Y = scoreOrigin.getBoundingClientRect().top + pageYOffset + (scoreOrigin.clientHeight/2); 
          setTimeout(getOpacity, 1500);
          function getOpacity() { 
            O.style.opacity = 1
          }
      });
      
      deliveryOrigin.parentNode.parentNode.children[2].addEventListener('click', function () {
          Y = deliveryOrigin.getBoundingClientRect().top + pageYOffset + (deliveryOrigin.clientHeight/2); 
          setTimeout(getOpacity, 1500);
          function getOpacity() { 
            O.style.opacity = 1
          }
      });
  
      function move() { 
      
          let p = 'px';
          O.style.top = Y + p;
          setTimeout(move, 100);
      }
      move();
  
  });



}
