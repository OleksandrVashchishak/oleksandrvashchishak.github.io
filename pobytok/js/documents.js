const documentsOnlineLink = document.querySelectorAll('.legalization-documents-online .legalization-documents__link')

for(let i of documentsOnlineLink){
  i.addEventListener('click', () => {
  
    for(let j of documentsOnlineLink){
       j.nextElementSibling.classList.remove('active')
    }
    i.nextElementSibling.classList.add('active')

 
  })
}


