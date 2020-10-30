let toScrollBtn = document.getElementById('toScrollBtn')
let toScrollBtnRight = document.getElementById('toScrollBtnRight')


let scrollElem = document.getElementById('scrollElem')
toScrollBtn.addEventListener('click', getScroll)
toScrollBtnRight.addEventListener('click', getScrollRight)
toScrollBtn.addEventListener('click', hideScroll)
function getScroll(){
  scrollElem.scrollLeft += 200
  if(scrollElem.scrollLeft >= 10){
    toScrollBtnRight.style.display = 'block'
    
  }
  console.log(scrollElem.scrollLeft);
}
function getScrollRight(){
  scrollElem.scrollLeft -= 200
  if(scrollElem.scrollLeft <= 210){
    toScrollBtnRight.style.display = 'none'
  }
  console.log(scrollElem.scrollLeft);
}
function hideScroll(){
  toScrollBtnRight.style.display = 'block'
}
if(scrollElem.scrollLeft <= 10){
  toScrollBtnRight.style.display = 'none'
}
if(scrollElem.scrollLeft >= 10){
  toScrollBtnRight.style.display = 'block'
}