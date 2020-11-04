let curencyAccaunt = document.querySelector('.finance-open__currency-block')
let iconFinance = document.querySelector('.select__icon-finance')
console.log(curencyAccaunt);

curencyAccaunt.addEventListener('click', openCurrency)
function openCurrency(){
  curencyAccaunt.classList.toggle('active')
  iconFinance.classList.toggle('active')
}