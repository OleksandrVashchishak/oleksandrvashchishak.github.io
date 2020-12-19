// configs
const config = {
    infinite: true,
    autoplay: false,
    autoplayTime: 5000,
    dots: true,
    swipe: true,
    nextArrow: true,
    nextArrow_inner: 'Next',
    prevArrow: true,
    prevArrow_inner: 'Back',
    animation: true,
}


// Declared variavle
const wrapper = document.querySelector('.wrapper')
const slider = wrapper.children[0]
const item = slider.children


// add default classes
slider.classList.add('slider')
for (let i of item) {
    i.classList.add('slider-item')
}

// Create prev arrow
const prev = document.createElement('div')
prev.classList.add('prev-item')
prev.innerHTML = config.prevArrow_inner
wrapper.insertBefore(prev, slider);

if (!config.prevArrow) {
    prev.style.display = 'none'
}

// Create next arrow
const next = document.createElement('div')
next.classList.add('next-item')
next.innerHTML = config.nextArrow_inner
wrapper.appendChild(next);

if (!config.nextArrow) {
    next.style.display = 'none'
}


// start config dots
let dots
if (config.dots) {

    // Create dots container
    const dotsContainer = document.createElement('div')
    dotsContainer.classList.add('dots-container')
    wrapper.after(dotsContainer)

    // Create dots
    let count = 0
    for (let i of item) {
        const dots = document.createElement('div')
        dots.classList.add('dots')
        dots.textContent = count++
        dotsContainer.appendChild(dots)
    }

    dots = document.querySelectorAll('.dots')
    dots[0].classList.add('active')

    // Dots navigation
    for (let i = 0; i < item.length; i++) {
        dots[i].addEventListener('click', function (e) {
            for (let i = 0; i < item.length; i++) {
                dots[i].classList.remove('active')
                item[i].classList.remove('active')
            }
            e.target.classList.add('active')
            item[e.target.textContent].classList.add('active')
        })
    }

    // end if config dots
}
// Add active class first element
item[0].classList.add('active')

// Function next arrow
next.addEventListener('click', getNext)
function getNext() {
    for (let i = 0; i < item.length; i++) {
        prev.classList.remove('active')
        if (!config.infinite) {
            if (i == (item.length - 2)) {
                next.classList.add('active')
            }
        }
        if (i == (item.length - 1)) {
            if (!config.infinite) {
                return
            }
            if (config.infinite) {
                item[i].classList.remove('active')
                item[0].classList.add('active')
                if (config.animation) {
                    item[i].animate([
                        { transform: 'translateX(0)' },
                        { transform: 'translateX(-200px)' }
                    ], {
                        duration: 1000,
                    })
                }

                if (config.dots) {
                    dots[0].classList.add('active')
                    dots[i].classList.remove('active')
                }
            }
        }
        if (item[i].classList.contains('active')) {
            item[i].nextElementSibling.classList.add('active')
            item[i].classList.remove('active')

            if (config.animation) {
                item[i].animate([
                    { transform: 'translateX(0)' },
                    { transform: 'translateX(200px)' }
                ], {
                    duration: 1000,
                })
            }

            if (config.dots) {
                dots[i].classList.remove('active')
                dots[i].nextElementSibling.classList.add('active')
            }
            break
        }
    }
}


// Function prev arrow 
prev.addEventListener('click', getPrev)
function getPrev() {
    for (let i = 0; i < item.length; i++) {

        if (item[i].classList.contains('active')) {
            next.classList.remove('active')

            if (!config.infinite) {
                if (item[i] == item[1]) {
                    prev.classList.add('active')
                }
            }
            if (item[i] == item[0]) {
                if (!config.infinite) {
                    return
                }
                if (config.infinite) {
                    item[i].classList.remove('active')
                    item[item.length - 1].classList.add('active')

                    if (config.animation) {
                        item[i].animate([
                            { transform: 'translateX(0)' },
                            { transform: 'translateX(200px)' }
                        ], {
                            duration: 1000,
                        })
                    }

                    if (config.dots) {
                        dots[i].classList.remove('active')
                        dots[item.length - 1].classList.add('active')
                    }
                    return
                }
            }
            item[i].previousElementSibling.classList.add('active')
            item[i].classList.remove('active')
            if (config.animation) {
                item[i].animate([
                    { transform: 'translateX(0)' },
                    { transform: 'translateX(-200px)' }
                ], {
                    duration: 1000,
                })
            }

            if (config.dots) {
                dots[i].previousElementSibling.classList.add('active')
                dots[i].classList.remove('active')
            }
            return
        }
    }
}


// auto autoplay config
if (config.autoplay) {
    setInterval(getNext, config.autoplayTime);
}

// swipes config
if (config.swipe) {
    let start
    let end
    slider.addEventListener('touchstart', function (e) {
        start = e.changedTouches[0].clientX
    })
    slider.addEventListener('touchend', function (e) {
        end = e.changedTouches[0].clientX

        if (start < end) {
            getPrev()
        } else {
            getNext()
        }
    })
}


