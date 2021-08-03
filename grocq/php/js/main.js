// start burger menu
let header = document.querySelector('.header')
let burgerContainer = document.querySelector('.header__burger')
let headerMenu = document.querySelector('.header__main-container')
let html = document.querySelector('html')

burgerContainer.addEventListener('click', () => {
    burgerContainer.classList.toggle('active')
    headerMenu.classList.toggle('active')
    header.classList.remove('active')
    if (burgerContainer.classList.contains('active')) {
        html.style.overflowY = 'hidden'
    } else {
        html.style.overflowY = 'auto'
    }
})

// end burger menu

// start change header
if (window.matchMedia("(min-width: 767px)").matches) {
    let scrollStart = 60
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
}
// end change header

// start tabs
if (document.querySelector('.tabs')) {
    let tabBtns = document.querySelectorAll('.tabs__nav-item')
    let tabImg = document.querySelectorAll('.tabs__img ')
    let tabText = document.querySelectorAll('.tabs__text')

    tabBtns.forEach((e, i) => {
        e.addEventListener('click', () => {
            tabImg.forEach(img => img.classList.remove('active'))
            tabText.forEach(text => text.classList.remove('active'))
            tabBtns.forEach(btn => btn.classList.remove('active'))
            tabImg[i].classList.add('active')
            tabText[i].classList.add('active')
            e.classList.add('active')
        })
    })

}
// end tabs

// start custom lighbox
if (document.querySelector('.custom-box')) {
    let linksImg = document.querySelectorAll('.grid__img')
    let imgs = document.querySelectorAll('.grid__img-box')
    let prevArrow = document.querySelector('.custom-box__nav--prev')
    let nextArrow = document.querySelector('.custom-box__nav--next')
    let lighClose = document.querySelector('.custom-box__close')
    let customBox = document.querySelector('.custom-box')

    for (let i = 0; i < linksImg.length; i++) {
        linksImg[i].addEventListener('click', () => {
            imgs[i].classList.add('active')
            customBox.classList.add('active')
            html.style.overflowY = 'hidden'
        })
    }

    nextArrow.addEventListener('click', () => {
        if (document.querySelector('.grid__img-box.active') && document.querySelector('.grid__img-box.active').nextElementSibling) {
            let element = document.querySelector('.grid__img-box.active')
            element.nextElementSibling.classList.add('active')
            element.classList.remove('active')
            customBox.classList.add('active')
            html.style.overflowY = 'hidden'
        }
    })

    prevArrow.addEventListener('click', () => {
        if (document.querySelector('.grid__img-box.active') &&
            document.querySelector('.grid__img-box.active').previousElementSibling &&
            document.querySelector('.grid__img-box.active').previousElementSibling.classList.contains('grid__img-box')) {
            let element = document.querySelector('.grid__img-box.active')
            element.previousElementSibling.classList.add('active')
            element.classList.remove('active')
            customBox.classList.add('active')
            html.style.overflowY = 'hidden'
        }
    })

    lighClose.addEventListener('click', () => {
        let element = document.querySelector('.grid__img-box.active')
        element.classList.remove('active')
        customBox.classList.remove('active')
        html.style.overflowY = 'auto'
    })
}
// end custom lighbox

// start accordion-tabs
if (document.querySelector('.twenty-slider__acc-btn')) {
    let acc = document.querySelectorAll(".twenty-slider__acc-btn");
    let tabImg = document.querySelectorAll('.twenty-slider__img-item ')
    let btn = document.querySelectorAll('.twenty-slider__btn ')

    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            tabImg.forEach(img => img.classList.remove('active'))
            btn.forEach(btnItem => btnItem.classList.remove('active'))
            acc.forEach(e => {
                e.nextElementSibling.removeAttribute('style');
                e.classList.remove('active')
            })
            tabImg[i].classList.add('active')
            btn[i].classList.add('active')
            this.classList.toggle("active");


            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

    acc[0].click()

}
// end accordion-tabs

// start twenty twenty init
if (document.querySelector('.twentytwenty-container')) {
    setTimeout(() => {
        $(".twentytwenty-container").twentytwenty({
            default_offset_pct: 0.5,
            no_overlay: true,
        });

        document.querySelectorAll('.twenty-slider__img-item ').forEach(e => {
            e.classList.add('default')
        })
        document.querySelectorAll('.twenty-slider__img-item img').forEach(e => {
            e.classList.add('hight')
        })
    }, 500)
}
// start twenty twenty init

// start slider tabs
if (document.querySelector('.tab-slider__slider')) {
    let btns = document.querySelectorAll('.tab-slider__title')
    let sliders = document.querySelectorAll('.tab-slider__slider')
    let counts = document.querySelectorAll('.tab-slider__slider-count')
    btns.forEach((btn, i) => {
        btn.addEventListener('click', () => {
            btns.forEach(e => e.classList.remove('active'))
            sliders.forEach(e => e.classList.remove('active'))
            counts.forEach(e => e.classList.remove('active'))
            btn.classList.add('active')
            sliders[i].classList.add('active')
            counts[i].classList.add('active')
        })
    })


}
// end slider tabs

// start maps change
if (document.querySelector('.map__map-img-wrap')) {
    let imgWrapper = document.querySelector('.map__map-img-wrap')
    let imgWrapperPlan = document.querySelector('.map__map-img-plan')
    imgWrapper.addEventListener('click', () => {
        imgWrapper.classList.add('active')
        imgWrapperPlan.classList.add('active')
    })
    imgWrapperPlan.addEventListener('click', () => {
        imgWrapper.classList.remove('active')
        imgWrapperPlan.classList.remove('active')
    })
}
// end map change

// start form focus
if (document.querySelector('.contact__input')) {
    let input = document.querySelectorAll('.contact__input')
    input.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.parentElement.querySelector('.contact__input-place').classList.add('active')
        })
        input.addEventListener('blur', () => {
            input.parentElement.parentElement.querySelector('.contact__input-place').classList.remove('active')
        })
    })
}
// end form focus

// start tab slider video popup
if (document.querySelector('.tab-slider__video ')) {
    let sliderItems = document.querySelectorAll('.tab-slider__video .tab-slider__item')
    let popup = document.querySelector('.video-popup')
    let popupIframe = document.querySelector('.video-popup iframe')
    let close = document.querySelector('.video-popup__close')

    close.addEventListener('click', () => {
        popup.classList.remove('active')
        popupIframe.setAttribute('src', '');
    })


    sliderItems.forEach(e => (
        e.addEventListener('click', () => {
            popupIframe.setAttribute('src', e.getAttribute('video-link'));
            popup.classList.add('active')
        })
    ))
}
// end tab slider video popup

// start prelouder

if (document.querySelector('.prelouder')) {

    document.querySelector('html').style.overflow = 'hidden'
    setTimeout(() => {
        document.querySelector('.prelouder').classList.add('visible')
        document.querySelector('html').style.overflow = 'auto'
    }, 4000)
}

// end prelouder

// start drobdown for header
if (document.querySelector('.header__dropdown-wrapper')) {
    let drobdown = document.querySelector('.header__dropdown-wrapper')
    drobdown.addEventListener('click', () => {
        drobdown.classList.toggle('active')
    })

    document.addEventListener('click', e => {
        if (e.path.includes(drobdown)) {
            return
        }
        drobdown.classList.remove('active')
    })
}
// end drobdown for header