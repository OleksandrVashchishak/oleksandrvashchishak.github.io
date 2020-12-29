let taxa_7_day = document.querySelector('.price-7-day')
    taxa_14_day = document.querySelector('.price-14-day'),
    taxa_30_day = document.querySelector('.price-30-day'),
    taxa_30_day_old = document.querySelector('.price-30-day-old'),
    taxa_60_day = document.querySelector('.price-60-day'),
    taxa_60_day_old = document.querySelector('.price-60-day-old'),
    taxa_90_day = document.querySelector('.price-90-day'),
    taxa_90_day_old = document.querySelector('.price-90-day-old')   

 let radioTaxa_7 = document.querySelector('.radio-taxa-7'),
     radioTaxa_14 = document.querySelector('.radio-taxa-14'),
     radioTaxa_30 = document.querySelector('.radio-taxa-30'),
     radioTaxa_60 = document.querySelector('.radio-taxa-60'),
     radioTaxa_90 = document.querySelector('.radio-taxa-90')


const linkCheck = document.querySelector('.add-link-check')
const bannerCheck = document.querySelector('.personal__type-advert-bunner')
const descriptionCheck = document.querySelector('.personal__type-advert-desc')
const detailDescriptionCheck = document.querySelector('.personal__add-bunner-label')

    renderPriceTaxa()
    document.addEventListener('click', function () {
      renderPriceTaxa()
    })
    
function renderPriceTaxa(){
  // Selected only banner
  if(bannerCheck.classList.contains('active')){
    taxa_7_day.textContent = 50 + ' PLN'
    taxa_14_day.textContent = 100 + ' PLN' 
    taxa_30_day.textContent = 190 + ' PLN' 
    taxa_30_day_old.textContent = 200 + ' PLN' 
    taxa_60_day.textContent = 360 + ' PLN' 
    taxa_60_day_old.textContent = 400 + ' PLN' 
    taxa_90_day.textContent = 510 + ' PLN' 
    taxa_90_day_old.textContent = 600 + ' PLN' 
  }

  // Selected  banner and link
   if(bannerCheck.classList.contains('active') && linkCheck.classList.contains('active')){
    taxa_7_day.textContent = 75 + ' PLN'
    taxa_14_day.textContent = 120 + ' PLN'
    taxa_30_day.textContent = 285 + ' PLN'
    taxa_30_day_old.textContent = 300  + ' PLN'
    taxa_60_day.textContent = 540 + ' PLN'
    taxa_60_day_old.textContent = 600 + ' PLN'
    taxa_90_day.textContent = 765 + ' PLN'
    taxa_90_day_old.textContent = 900 + ' PLN'
  } 
  
// Selected  banner and detail description
 if(bannerCheck.classList.contains('active') && detailDescriptionCheck.classList.contains('active')){
  taxa_7_day.textContent = 50 * 2   + ' PLN'
  taxa_14_day.textContent = 100 * 2   + ' PLN'
  taxa_30_day.textContent = 190 * 2  + ' PLN'
  taxa_30_day_old.textContent = 200  * 2  + ' PLN'
  taxa_60_day.textContent = 360 * 2  + ' PLN'
  taxa_60_day_old.textContent = 400 * 2  + ' PLN'
  taxa_90_day.textContent = 510 * 2  + ' PLN'
  taxa_90_day_old.textContent = 600 * 2 + ' PLN'
} 

 // Selected banner, link and detail description
  if(bannerCheck.classList.contains('active') && linkCheck.classList.contains('active') && detailDescriptionCheck.classList.contains('active')){
    taxa_7_day.textContent = 125 + ' PLN'
    taxa_14_day.textContent = 250 + ' PLN'
    taxa_30_day.textContent = 475 + ' PLN'
    taxa_30_day_old.textContent = 500  + ' PLN'
    taxa_60_day.textContent = 900 + ' PLN'
    taxa_60_day_old.textContent = 1000 + ' PLN'
    taxa_90_day.textContent = 1275 + ' PLN'
    taxa_90_day_old.textContent = 1500 + ' PLN'
  }

  // Selected only description
  if(descriptionCheck.classList.contains('active')){
    taxa_7_day.textContent = 60 + ' PLN'
    taxa_14_day.textContent = 120 + ' PLN'
    taxa_30_day_old.textContent = 240  + ' PLN'
    taxa_30_day.textContent = 228 + ' PLN'
    taxa_60_day_old.textContent = 480 + ' PLN'
    taxa_60_day.textContent = 432 + ' PLN'
    taxa_90_day_old.textContent = 720 + ' PLN'
    taxa_90_day.textContent = 612 + ' PLN'
  }

   // Selected description and link
   if(descriptionCheck.classList.contains('active')  && linkCheck.classList.contains('active')){
    taxa_7_day.textContent = 80 + ' PLN'
    taxa_14_day.textContent = 160 + ' PLN'
    taxa_30_day_old.textContent = 304  + ' PLN'
    taxa_30_day.textContent = 320 + ' PLN'
    taxa_60_day_old.textContent = 640 + ' PLN'
    taxa_60_day.textContent = 576 + ' PLN'
    taxa_90_day_old.textContent = 816 + ' PLN'
    taxa_90_day.textContent = 960 + ' PLN'
  }

    // Selected  description and detail description
    if(descriptionCheck.classList.contains('active') && detailDescriptionCheck.classList.contains('active')){
      taxa_7_day.textContent = 100 + ' PLN'
      taxa_14_day.textContent = 200 + ' PLN'
      taxa_30_day_old.textContent = 400  + ' PLN'
      taxa_30_day.textContent = 380 + ' PLN'
      taxa_60_day_old.textContent = 800 + ' PLN'
      taxa_60_day.textContent = 720 + ' PLN'
      taxa_90_day_old.textContent = 1200 + ' PLN'
      taxa_90_day.textContent = 1020 + ' PLN'
     }

     // Selected description, link and detail description
     if(descriptionCheck.classList.contains('active') && linkCheck.classList.contains('active') && detailDescriptionCheck.classList.contains('active')){
      taxa_7_day.textContent = 120  + ' PLN'
      taxa_14_day.textContent = 240  + ' PLN'
      taxa_30_day_old.textContent = 480  + ' PLN'
      taxa_30_day.textContent = 456 + ' PLN'
      taxa_60_day_old.textContent = 960 + ' PLN'
      taxa_60_day.textContent = 864 + ' PLN'
      taxa_90_day_old.textContent = 1440 + ' PLN'
      taxa_90_day.textContent = 1224 + ' PLN'
     }

// generation input value
     radioTaxa_7.value ='7/' + parseInt(taxa_7_day.textContent)
     radioTaxa_14.value ='14/' + parseInt(taxa_14_day.textContent)
     radioTaxa_30.value ='30/' + parseInt(taxa_30_day.textContent)
     radioTaxa_60.value ='60/' + parseInt(taxa_60_day.textContent)
     radioTaxa_90.value ='90/' + parseInt(taxa_90_day.textContent)

}