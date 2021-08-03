// start burger menu
let burgerContainer = document.querySelector('.header__burger')
let headerMenu = document.querySelector('.header__menu')
burgerContainer.addEventListener('click', () => {
    burgerContainer.classList.toggle('active')
    headerMenu.classList.toggle('active')
    if (burgerContainer.classList.contains('active')) {
        document.querySelector('html').style.overflowY = 'hidden'
    } else {
        document.querySelector('html').style.overflowY = 'auto'
    }
})

// end burger menu

// start change header
let scrollStart = 60
if (document.querySelector('.home-fb')) {
    scrollStart = document.querySelector('.home-fb').scrollHeight - 70
}
let header = document.querySelector('.header')
let scrollPrev = 0;
window.addEventListener("scroll", () => {
    let scrolled = document.documentElement.scrollTop;
    if (scrolled > scrollStart && scrolled > scrollPrev) {
        header.classList.add("active");
    } else if (scrolled < scrollStart) {
        header.classList.remove("active");
    }
    scrollPrev = scrolled;
});
// end change header

// start accordion
if (document.querySelector('.acc-product__btn')) {
    let acc = document.querySelectorAll(".acc-product__btn");
    let i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
}
// end accordion

// start get popup

const getPopup = (btnSelector, popupSelector, closeSelector) => {
    let btnsGetPopup = document.querySelectorAll(btnSelector)
    let popup = document.querySelector(popupSelector)
    let popupClose = document.querySelector(closeSelector)

    btnsGetPopup.forEach(e => {
        e.addEventListener('click', () => {
            popup.classList.add('visible')
            document.querySelector('html').style.overflow = 'hidden'
        })
    })

    popupClose.addEventListener('click', () => {
        popup.classList.remove('visible')
        document.querySelector('html').style.overflow = 'auto'
    })
}
if (document.querySelector('.demo-touch-popup')) {
    getPopup('.get-demo-popup', '.demo-touch-popup', '.demo-touch-popup__close')
}
if (document.querySelector('.join-team-popup')) {
    getPopup('.get-join-popup', '.join-team-popup', '.join-team-popup__close')
}

// end get popup

// start add black color for header
if (document.querySelector('.blog-main') ||
    document.querySelector('.single-post') ||
    document.querySelector('.legal-preview') ||
    document.querySelector('.suite-fb')) {
    header.classList.add('black-color')
}
// end add black color for header

// start add prevent default for header menu
document.querySelector('.header__menu > ul li:first-child > a').addEventListener('click', (e) => {
    e.preventDefault()
})
document.querySelector('.header__menu > ul .get-demo-popup a').addEventListener('click', (e) => {
    e.preventDefault()
})
// end add prevent default for header menu

// start add bg for services page
if (document.querySelector('.health-first')) {
    document.querySelector('body').classList.add('bg-for-services')
}
// end add bg for services page

// start add active for service item
if (document.querySelector('.health-first') && !document.querySelector('.team')) {
    console.log('huy');
    let mainTitle = document.querySelector('.health-first__title')
    let itemsTitle = document.querySelectorAll('.block-services__title')
    itemsTitle.forEach(e => {
        if (mainTitle.textContent.trim() == e.textContent.trim()) {
            e.parentElement.parentElement.classList.add('active')
        }
    })
}
// end add active for service item

// start hide btn "load more" if post < 5
if (document.querySelector('.blog-main__archive')) {
    let items = document.querySelectorAll('.blog-main__archive .blog__item')
    if (items.length < 4 || items.length == 4) {
        document.querySelector('.btn-loadmore.blog__load-more').style.display = 'none'
    }
}
// end hide btn "load more" if post < 5