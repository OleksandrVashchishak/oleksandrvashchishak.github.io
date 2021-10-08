const burgerMenu = document.querySelector('.mobile-menu-toggle')
const closeBurgerMenu = document.querySelector('.hide-mobile-menu')
const body = document.querySelector('body')

burgerMenu.addEventListener('click', () => {
    body.classList.add('nav-active')
})

closeBurgerMenu.addEventListener('click', () => {
    body.classList.remove('nav-active')
})


