const personalChangeAva = document.querySelector('.personal__change-ava');
const mandatoryOverlay = document.querySelector('.mandatory-registration-popup');
let personalAvatar = document.querySelector('.personal__avatar')
personalAvatar.addEventListener('click', function(){
  mandatoryOverlay.classList.remove('visually-hidden');
})
personalChangeAva.addEventListener('click', function(){
  mandatoryOverlay.classList.remove('visually-hidden');
})

const buttonSaveFileIn = document.querySelector('.button-save-file-in');
buttonSaveFileIn.addEventListener('click', function(){
  mandatoryOverlay.classList.add('visually-hidden');
})


// 

let loadFileXml = document.querySelector('#loadFileXml');
loadFileXml.addEventListener('click', function(){
  setInterval(funct, 200)
  function funct(){
    let loadFileXml = document.querySelector('#loadFileXml');
    const fileInputUp = document.querySelector('#file');
    let str = fileInputUp.value
    const words = str.split('\\');
    let valueFile = words.length-1
    loadFileXml.value = words[valueFile]
    if(words[valueFile] == ''){
      loadFileXml.value = 'Выбрать файл'
    }
    if(loadFileXml.value != 'Выбрать файл'){
      loadFileXml.classList.add('done-select-file')
      buttonSaveFileIn.classList.add('done-select-file')
      buttonSaveFileIn.removeAttribute('disabled');
    }
  }
})
