function animateMarquee(el, duration) {
    const innerEl = el.querySelector('.marquee__inner');
    const innerWidth = innerEl.offsetWidth;
    const cloneEl = innerEl.cloneNode(true);
    el.appendChild(cloneEl);

    let start = performance.now();
    let progress;
    let translateX;

    requestAnimationFrame(function step(now) {
        progress = (now - start) / duration;

        if (progress > 1) {
            progress %= 1;
            start = now;
        }

        translateX = innerWidth * progress;

        innerEl.style.transform = `translate3d(-${translateX}px, 0 , 0)`;
        cloneEl.style.transform = `translate3d(-${translateX}px, 0 , 0)`;
        requestAnimationFrame(step);
    });
}

const marquee_flash_sale = document.querySelector('#marquee_flash_sale');
const marquee_games = document.querySelector('#marquee_games');
const marquee_office = document.querySelector('#marquee_office');
animateMarquee(marquee_flash_sale, 20000);
animateMarquee(marquee_office, 30000);
animateMarquee(marquee_games, 45000);

function getTimeRemaining(endtime) {
    let t = Date.parse(endtime) - Date.parse(new Date());
    let seconds = Math.floor((t / 1000) % 60);
    let minutes = Math.floor((t / 1000 / 60) % 60);
    let hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

function initializeClock(id, endtime) {
    let clock = document.getElementById(id);
    let daysSpan = clock.querySelector('.days');
    let hoursSpan = clock.querySelector('.hours');
    let minutesSpan = clock.querySelector('.minutes');
    let secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        let t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
}

//let deadline="January 01 2021 00:00:00 GMT+0300"; //for Ukraine
let deadline = new Date(Date.parse(new Date()) + 11 * 24 * 60 * 60 * 1000); // for endless timer
initializeClock('countdown', deadline);



//canwas text


let canvas, ctx;
let bPlay = true;
let iAngle = 0;
let sText = 'OFFICIAL DOWNLOAD ';

function clear() {
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}

function drawScene() {
    if (bPlay == 1) {
        clear();

        ctx.fillStyle = 'transparent';
        ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        iAngle += 0.005;
        draw3DTextCircle(sText, canvas.width / 2, canvas.height / 2, 80, Math.PI / 2 - iAngle);
    }
}

function draw3DTextCircle(s, x, y, radius, iSAngle) {
    let fRadPerLetter = 2 * Math.PI / s.length;
    ctx.save();
    ctx.translate(x, y);
    ctx.rotate(iSAngle);
    let iDepth = 4;
    ctx.fillStyle = '#000000';

    for (let i = 0; i < s.length; i++) {
        ctx.save();
        ctx.rotate(i * fRadPerLetter);

        for (let n = 0; n < iDepth; n++) {
            ctx.fillText(s[i], n, n - radius);
        }
        ctx.fillStyle = '#000000';
        ctx.shadowColor = 'black';
        ctx.shadowBlur = 10;
        ctx.shadowOffsetX = iDepth + 2;
        ctx.shadowOffsetY = iDepth + 2;
        ctx.fillText(s[i], 0, -radius);
        ctx.restore();
    }
    ctx.restore();
}
if (window.attachEvent) {
    window.attachEvent('onload', main_init);
} else {
    if (window.onload) {
        let curronload = window.onload;
        let newonload = function () {
            curronload();
            main_init();
        };
        window.onload = newonload;
    } else {
        window.onload = main_init;
    }
}

function main_init() {
            canvas = document.getElementById('panel');
            ctx = canvas.getContext('2d');
            ctx.font = '20px Verdana';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillStyle = '#000000';
            ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            draw3DTextCircle(sText, canvas.width / 2, canvas.height / 2, 200, Math.PI / 2 - iAngle);
            setInterval(drawScene, 10); 
        }


//modal window

let modal = document.getElementById("myModal");
let btn = document.getElementById("myBtn");
let span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// cart functions



        let d = document,
            itemBox = d.querySelectorAll('.item_box'),
            cartCont = d.getElementById('cart_content');

        function addEvent(elem, type, handler) {
            if (elem.addEventListener) {
                elem.addEventListener(type, handler, false);
            } else {
                elem.attachEvent('on' + type, function() {
                    handler.call(elem);
                });
            }
            return false;
        }

        function getCartData() {
            return JSON.parse(localStorage.getItem('cart'));
        }

        function setCartData(o) {
            localStorage.setItem('cart', JSON.stringify(o));
            return false;
        }

        function addToCart(e) {
            let cartData = getCartData() || {}, 
                parentBox = this.parentNode, 
                itemId = this.getAttribute('data-id'), // ID товара
                itemTitle = parentBox.querySelector('.item_title').innerHTML, 
                itemPrice = parentBox.querySelector('.item_price').innerHTML;
            if (cartData.hasOwnProperty(itemId)) { 
                cartData[itemId][2] += 1;
            } else { 
                cartData[itemId] = [itemTitle, itemPrice,  1];
            }
            if (!setCartData(cartData)) { 
            }
            return false;
        }
        for (var i = 0; i < itemBox.length; i++) {
            addEvent(itemBox[i].querySelector('.add_item'), 'click', addToCart);
        }
        function openCart(e) {
            var cartData = getCartData(), 
                totalItems = '';
            if (cartData !== null) {
                totalItems = '<div>';
                for (let items in cartData) {
                    totalItems += '<p>';
                        totalItems += '<p class="product-title default-font">' + cartData[items][0] + '</p>' +
                            '<div class="product-price new-price">' + cartData[items][1] + '</div>' +
                           '<div class="amount-margin default-font">' + '<span class="amount-product default-font">Amount: </span>' + cartData[items][2] + '</div>' ;
                    totalItems += '</p>';
                }
                totalItems += '</div>';
                cartCont.innerHTML = totalItems;
            } else {
                cartCont.innerHTML = '<span class="default-font">Cart empty!</span>';
            }
            return false;
        }
        /* Открыть корзину */
        addEvent(d.getElementById('checkout'), 'click', openCart);
        /* Очистить корзину */
        addEvent(d.getElementById('clear_cart'), 'click', function(e) {
            localStorage.removeItem('cart');
            cartCont.innerHTML = '<span class="default-font">Cart clear!</span>';
        });
