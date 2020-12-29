// show\hide number
const hideNumber = document.querySelector('.hide-number')
const showNumber = document.querySelector('.show-number')

showNumber.addEventListener('click', function() {
  hideNumber.classList.add('active')
  showNumber.classList.add('active')
})


// load cv

let loadFileXml = document.querySelector('#loadFileXml');
loadFileXml.addEventListener('click', function(){
  setInterval(funct, 200)
  function funct(){
    let loadFileXml = document.querySelector('#loadFileXml');
    let loadFileOut = document.querySelector('.open-notice__cv-right');
    const fileInputUp = document.querySelector('#file');
    let str = fileInputUp.value
    const words = str.split('\\');
    let valueFile = words.length-1
    loadFileOut.textContent = words[valueFile]
    if(words[valueFile] == ''){
      loadFileOut.textContent = 'No file chosen'
    }
    if(loadFileOut.textContent != 'No file chosen'){
      loadFileXml.classList.add('done-select-file')
      buttonSaveFileIn.classList.add('done-select-file')
      buttonSaveFileIn.removeAttribute('disabled');
    }
  }
})