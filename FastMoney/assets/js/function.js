const sendForm = document.getElementById('sendForm');

sendForm.addEventListener('click', getN);


function getN() {

    var security = 0;
    if (numberCart.value.length < 19) {
        numberCartWarning.innerHTML = '* Малое кличество символов'
    } else {
        numberCartWarning.innerHTML = '<span id="imgInput"></span>'
        security++
    }

    const validateTerminCard = terminCart.value.split(' ')

    if (terminCart.value.length < 5) {
        terminCartWarning.innerHTML = '* Малое кличество символов'
    } else {
        terminCartWarning.innerHTML = ''
        security++
    }

    if (validateTerminCard[0] > '12') {
        terminCartWarning.innerHTML = '* Неверное значение'
    } else {
        security++
    }
    if (validateTerminCard[1] < '20') {
        terminCartWarning.innerHTML = '* Просроченая карта'
    } else {
        security++
    }

    if (cvvCart.value.length < 3) {
        svvCartWarning.innerHTML = '* Малое кличество символов'
    } else {
        svvCartWarning.innerHTML = ''
        security++
    }

   
    valid(numberCart.value.split(' ').join(''));

    function valid(number) {
        const splitNumber = number.toString().split("");
        let totalEvenValue = 0;
        let totalOddValue = 0;
        for (let i = 0; i < splitNumber.length; i++) {
            if (i % 2 === 0) {
                if (splitNumber[i] * 2 >= 10) {
                    totalEvenValue += splitNumber[i] * 2 - 9;
                } else {
                    totalEvenValue += splitNumber[i] * 2;
                }
            } else {
                totalOddValue += parseInt(splitNumber[i]);
            }
        }
        if (((totalEvenValue + totalOddValue) % 10 === 0) == true) {
            security++
        } else {
            numberCartWarning.innerHTML = '* Неверное значение'
        }

    }
    typeCard(numberCart.value.split(' ').join(''));

    function typeCard(number) {
        const visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
        const mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
        const amexpRegEx = /^(?:3[47][0-9]{13})$/;
        const discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
        let card = number

        if (number.match(visaRegEx) != null) {
            imgInput.innerHTML = "<img src='assets/js/visa.png'>"
        } else if (number.match(mastercardRegEx) != null) {

            imgInput.innerHTML = "<img src='assets/js/master.png'>"
        } else if (number.match(amexpRegEx) != null) {
            return console.log("Type card amex")
        } else if (number.match(discovRegEx) != null) {
            return console.log("Type card discov")
        }
    }

    loader.style.display = "inline"
    setTimeout(clearLoader, 1500);

    function clearLoader() {
        loader.style.display = "none";
    }

    if (security == 6) {
        alert('Поздравляем! Данные карты валидные!')
    }
}

numberCart.addEventListener('input', function () {
    if (this.value.match(/[^0-9 ]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});

terminCart.addEventListener('input', function () {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});

cvvCart.addEventListener('input', function () {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
numberCart.addEventListener('keyup', function () {
    let foo = this.value.split(" ").join("");
    if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    this.value = foo;
});

terminCart.addEventListener('keyup', function () {
    let foo = this.value.split(" ").join("");
    if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,2}', 'g')).join(" ");
    }
    this.value = foo;

});
