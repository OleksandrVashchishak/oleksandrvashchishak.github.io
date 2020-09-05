// burger menu, and show hide text

$(document).ready(function () {
    $('.hideContent').click(function (event) {
        $('.hide-block, .hideContent').toggleClass('active');

    });

});

$(document).ready(function () {
        $('.burger-menu').click(function (event) {
        $('.burger-menu, .top-line-burger, .center-line-burger, .bot-line-burger, .burger-menu-visible, .burger-menu-visible-nav').toggleClass('active-burger');

    });
    
    });
//inner text show/hide

function innerTextHide() {
    let showHideText = document.getElementById("innerTextId");
    if (showHideText.innerHTML === "Hide Contents <span></span>") {
        showHideText.innerHTML = "Show Contents <span></span>";
    } else {
        showHideText.innerHTML = "Hide Contents <span></span>";
    }
}


// FAQ section
let acc = document.getElementsByClassName("accordion");
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
