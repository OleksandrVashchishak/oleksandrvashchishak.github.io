let shipptingPrice = 0

$(document).ready(function () {
    var subject = document.querySelectorAll(".before-and-after");

    [].forEach.call(subject, function (subj) {
        if (subj) {

            var distance = (window.innerWidth - subj.clientWidth) / 2;
            window.onresize = recalculateDistance(subj);

            var px = 0;
            var touches = [];
            function recalculateDistance(subj) {
                distance = (window.innerWidth - subj.clientWidth) / 2;
            }
            subj.addEventListener("mousemove", function (event) {
                dragScraper(event, subj, distance, px, touches)
            }, false);
            subj.addEventListener("touchmove", function (event) {
                dragScraper(event, subj, distance, px, touches)
            }, false);
        }
    });
    $('.single-programme .item span, .wrapper-renseignez .tarif .item span').click(function () {
        $(this).toggleClass('active');
    });
    $('input, textarea').focus(function () {
        $('.contact label:not(.checkbox)').each(function () {
            if ($(this).next().next().children().val().length < 1) {
                console.log($(this).val().length);
                $(this).removeClass('focus');
            }
        });
        $(this).parent().prev().prev().addClass('focus');
    });
    function dragScraper(event, doc, distance, px, touches) {
        console.log(doc);
        px = event.clientX - distance;

        if (px == null) {
            touches = event.touches;
            px = touches[0].clientX - distance;
        }

        if (px < 0) {
            px = 0;
        }

        for (var i = 0; i < doc.childNodes.length; i++) {
            if (doc.childNodes[i].className == "cursor") {
                doc.childNodes[i].classList.add("hover");
            }
            if (doc.childNodes[i].className == "subject-scraper") {
                doc.childNodes[i].style.transform = "translate(" + px + "px, 0) skewX(-8deg)";
                doc.childNodes[i].childNodes[1].style.transform = "translate(-" + px + "px, 0) skewX(8deg)";
            }
        }
    }

    $('.top-slider').slick({
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        padding: 20,
        fade: true,
        centerMode: false,
        autoplay: true,
        pauseOnHover: false,
        autoplaySpeed: 3000,
        speed: 1000,
        dots: true,
    });
    $('.slider-cliniques').slick({
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        padding: 20,
        fade: false,
        centerMode: false,
        autoplay: false,
        pauseOnHover: false,
        autoplaySpeed: 3000,
        speed: 1000,
        dots: true,
        loop: true
    });
    $('.slider-two').slick({
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        padding: 20,
        fade: false,
        centerMode: false,
        autoplay: false,
        pauseOnHover: false,
        autoplaySpeed: 3000,
        speed: 1000,
        dots: true,
        loop: true
    });

    if (document.querySelector('.wrapper-btn .btn-link')) {
        const toggleBtns = document.querySelectorAll('.wrapper-btn .btn-link')
        toggleBtns.forEach(btn => {
            const tarif = document.querySelector(`[data-date='${btn.getAttribute('data-value')}'].tarif`)
            const countsTicket = tarif.querySelectorAll('.product_numpers_top')
            let allTicket = 0
            countsTicket.forEach(count => {
                allTicket += Number(count.getAttribute('max'))
            })
            if (allTicket == 0) {
                const btnTextNode = btn.parentElement.querySelector('span span')
                btnTextNode.textContent = 'Complet'
                btn.addEventListener('click', e => {
                    e.preventDefault()
                })
            }
        })
    }



    $('input[type=radio].btn-link').change(function () {
        $('.validez, .wrapper-renseignez .tarif').removeClass('this').find('input.product_numpers_top').attr('name', function () { return $(this).attr('name').replace(/_this/g, "") });
        $eleme = $('.validez[data-date="' + $(this).attr('data-value') + '"], .tarif[data-date="' + $(this).attr('data-value') + '"]').addClass('this').find('input.product_numpers_top').attr('name', function () { return $(this).attr('name') + '_this' });
        if ($(this).hasClass('active')) {
            $(this).prop('checked', false).removeClass('active').parents('.item').removeClass('active').children('.wrapper-renseignez').slideUp();
            $('.checkout-page').removeClass('active');
        }
        $checked_input = $(this).parents('.item').find('input[type=radio].btn-link.active').attr('data-cycle');
        $(this).parents('.wrapper-btn').find('input[type=radio].btn-link').prop('checked', false).removeClass('active');
        $(this).prop('checked', true);
        if ($checked_input == $(this).attr('data-cycle')) {
            $('.checkout-page .item.active').removeClass('active').children('.wrapper-renseignez').slideDown();
        } else {
            $('.checkout-page .item.active input[type=radio].btn-link').prop('checked', false).removeClass('active');
            $('.checkout-page .item.active').removeClass('active').children('.wrapper-renseignez').slideUp();
            $('.row-checkbox input').prop('checked', false);
        }
        $(this).addClass('active').parents('.item').addClass('active').children('.wrapper-renseignez').slideDown();
        $('.checkout-page').addClass('active');
    });
    $('.checkout-page .wrapper-renseignez .tarif .item .btn-hidden, .checkout-page .validez p:first-child').click(function () {
        console.log('12');
        if ($(this).next().children('input').val() == 0) {
            $(this).next().children('.quantity-arrow-plus')[1].click();
        }
        if (document.querySelector('form.item.active .tarif.this .item-groupe-inscrip') && document.querySelector('form.item.active .tarif.this .item-groupe-inscrip').classList.contains('check')) {
            document.querySelector('form.item.active .tarif.this .btn-hidden-groupe').click()
        }
    });
    $('.clinique-page .teeth .btn-link').click(function () {
        $('.clinique-page .teeth .item').css('display', 'flex');
        $('.clinique-page .teeth .btn-link').remove()
        return false;
    });
    $('.single-programme .btn-link').change(function () {
        console.log($(this).attr('value'));
        $('.last-block .tarif .item').css('display', 'none');
        $('.last-block .tarif .item[data-date="' + $(this).attr('value') + '"]').css('display', 'flex')
    });
    $('header .burger').click(function () {
        $('.wrap').slideToggle()
    });


    const nameArray = ['prenom-partic-', 'nom-partic-', 'email-partic-', 'telehone-partic-']
    const labelArray = ['Prénom', 'Nom', 'Email *', 'Téléphone *']

    const setNewPatric = (groupeCase) => {
        let formAddCounter
        if (groupeCase) {
            formAddCounter = groupeCase
        } else {
            formAddCounter = getCountInscript(0)
        }
        const wrapper = document.createElement("div");
        const title = document.createElement("h3");
        wrapper.classList.add('wrapper-form-add')
        title.classList.add('bottom-sub-title')
        title.textContent = `Participants ${formAddCounter}`
        wrapper.appendChild(title);
        nameArray.forEach((name, i) => {
            const row = document.createElement("div");
            const label = document.createElement("label");
            const input = document.createElement("input");
            row.classList.add('row-lable')
            label.textContent = labelArray[i]
            label.setAttribute('for', name + formAddCounter)
            input.setAttribute('name', name + formAddCounter)
            input.setAttribute('id', name + formAddCounter)
            input.setAttribute('type', 'text')
            input.setAttribute('required', 'required')
            row.appendChild(label);
            row.appendChild(input);
            wrapper.appendChild(row);
        })

        const parentEl = document.querySelector('form.item.active .wrap-ren .practic-add-btn')
        parentEl.parentNode.querySelector('.practic-form').appendChild(wrapper);
        localStorage.setItem('participantsCount', formAddCounter);
    }

    const delateNewPatric = () => {
        const lastForm = document.querySelector('form.item.active .wrap-ren .wrapper-form-add')
        lastForm.remove()
    }

    const getCountInscript = (actionNumber) => {
        const parentEl = document.querySelectorAll('form.item.active .validez.this .product_numpers')
        let count = actionNumber;
        parentEl.forEach(e => {
            count = count + Number(e.value)
        })
        return count
    }

    if (document.querySelector('.btn-hidden-groupe')) {
        const btnGroupe = document.querySelectorAll('.btn-hidden-groupe')
        btnGroupe.forEach(btn => {
            btn.addEventListener('click', () => getGroupeInscript(btn))
        })
    }

    const getGroupeInscript = (btn) => {
        const btnParent = btn.parentNode
        const activeItem = document.querySelector('form.item.active')
        const allTypes = activeItem.querySelectorAll(' .validez.this .type')
        const priceField = activeItem.querySelector('.validez.this .total-price span')
        const priceValue = activeItem.querySelector('.validez.this input.total_price')
        const tarifInput = activeItem.querySelectorAll('.tarif.this .product_numpers_top')
        const tarifCheck = activeItem.querySelectorAll('.tarif.this .item')
        const addedForm = activeItem.querySelectorAll('.wrapper-form-add')
        const counters = activeItem.querySelectorAll('.tarif.this p')
        if (!btnParent.classList.contains('check')) {
            const groupePrice = activeItem.querySelector('.validez.this .type-groupe-validez .product_numpers').getAttribute('data-price')
            btnParent.classList.add('check')
            priceValue.value = groupePrice
            priceField.textContent = groupePrice
            allTypes.forEach(type => {
                if (!type.classList.contains('type-groupe-validez')) {
                    type.classList.add('type-validez-hidden')
                } else {
                    type.classList.remove('type-validez-hidden')
                    type.classList.add('check')
                }
            })

            tarifCheck.forEach(check => {
                if (!check.classList.contains('item-groupe-inscrip')) {
                    check.classList.remove('check')
                }
            })

            allTypes.forEach(type => {
                if (!type.classList.contains('type-groupe-validez')) {
                    const typeInput = type.querySelector('.product_numpers')
                    typeInput.value = 0
                }
            })

            for (let i = 0; i < 4; i++)  setNewPatric(i + 2)
            tarifInput.forEach(input => input.value = 0)
            addedForm.forEach(form => form.remove())
            counters.forEach(el => el.style.display = 'none')
        } else {
            addedForm.forEach(form => form.remove())
            activeItem.querySelector('.validez.this .type-groupe-validez ').classList.add('type-validez-hidden')
            btnParent.classList.remove('check')
            allTypes.forEach(type => {
                if (type.classList.contains('type-groupe-validez')) {
                    type.classList.add('type-validez-hidden')
                    type.classList.remove('check')
                } else {
                    type.classList.remove('type-validez-hidden')
                }
            })
            counters.forEach(el => el.style.display = 'block')
        }
    }

    function total_price() {
        $('.validez.this .product_numpers').each(function () {
            if (!this.classList.contains('product_numpers-groupe')) {
                $totalchange = $totalchange + $(this).val() * $(this).attr('data-price');
            }
        });


        if (shipptingPrice) {
            $('input.total_price').val($totalchange + Number(shipptingPrice));
            $('.total-price span').html(Number($totalchange) + Number(shipptingPrice));
        } else {
            $('input.total_price').val($totalchange);
            $('.total-price span').html($totalchange.toString().replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 '));
        }
    }
    $(function () {
        (function quantityProducts() {
            var $quantityArrowPlus = $(".quantity-arrow-plus");
            $quantityArrowPlus.click(quantityPlus);

            function quantityPlus() {
                $element = $(this).attr('date-id');
                if ($(this).attr('date-min') != 'min') {
                    $thismomentcount = Number($($element).val()) + 1;
                    if (document.querySelector('.practic-form-iscription') && getCountInscript(1) !== 2) {
                        setNewPatric()
                    }
                } else {
                    $thismomentcount = Number($($element).val()) - 1;
                    if (document.querySelector('.practic-form-iscription') && getCountInscript(-1) !== 0) {
                        delateNewPatric()
                    }
                }
                $totalchange = 0;
                if ($thismomentcount <= $($element).attr('max') && ($thismomentcount >= 0)) {
                    $($element).val($thismomentcount);
                    $('input[date-id="' + $element + '"]').val($thismomentcount);
                    total_price()
                }
                $('.product_numpers_top, .product_numpers').each(function () {
                    if ($(this).val() > 0) {
                        $(this).parents('.item, .type').addClass('check')
                    } else {
                        $(this).parents('.item, .type').removeClass('check')
                    }
                });
            }
        })();
    });

    $(document).on('submit', '.validez.this', function (e) {
        if ($('.row-checkbox input').prop('checked', false)) {
            $('.row-checkbox').addClass('false');
        }
    });

    function updateSigninStatus_cal(isSignedIn, element) {
        if (isSignedIn) {
            console.log(element);
            var event = {
                'summary': element.attr('data-title'),
                'location': element.attr('data-location'),
                'description': element.attr('data-title'),
                'start': {
                    'dateTime': element.attr('data-start'),
                    'timeZone': 'Europe/Paris'
                },
                'end': {
                    'dateTime': element.attr('data-end'),
                    'timeZone': 'Europe/Paris'
                },
                'reminders': {
                    'useDefault': false,
                    'overrides': [
                        { 'method': 'email', 'minutes': 24 * 60 },
                        { 'method': 'popup', 'minutes': 10 }
                    ]
                }
            };

            var request = gapi.client.calendar.events.insert({
                'calendarId': 'primary',
                'resource': event
            });
            request.execute(function (event) {
                appendPre('Event created: ' + event.htmlLink);
                window.open(event.htmlLink);
            });
        } else {
            gapi.auth2.getAuthInstance().signIn();
        }
    }

    function appendPre(message) {
        console.log(message);
    }

    $('.cycle .item .calendar').click(function () {
        var CLIENT_ID = '388417836060-be0hqemj53o8n876matoullo7te8bia9.apps.googleusercontent.com';
        var API_KEY = 'AIzaSyBK-8tf4yQQeH7W9rwIqdLy3YmXvwrVaZw';

        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
        var self = $(this);
        var SCOPES = "https://www.googleapis.com/auth/calendar.events";
        gapi.client.init({
            apiKey: API_KEY,
            clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES
        }).then(function () {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus_cal);

            // Handle the initial sign-in state.
            updateSigninStatus_cal(gapi.auth2.getAuthInstance().isSignedIn.get(), self);
        }, function (error) {
            appendPre(JSON.stringify(error, null, 2));
        });
    });

    $(".product_numpers, .product_numpers_top").change(function () {
        $totalchange = 0;
        $(this).val(Number($(this).val()));
        if ($(this).val() > 0) {
            $(this).parents('.item,.type').addClass('check');

        } else {
            $(this).parents('.item, .type').removeClass('check')
        }
        if ($(this).val() <= parseInt($(this).attr('max'))) {
            $('input[date-id="#' + $(this).attr('id') + '"]').val(Number($(this).val()));
            $($(this).attr('date-id')).val(Number($(this).val()));
            total_price();
        } else {
            $(this).val($(this).attr('max'));
            $('input[date-id="#' + $(this).attr('id') + '"]').val(Number($(this).val()));
            $($(this).attr('date-id')).val(Number($(this).val()));
            total_price();
        }
    });

    $('.type_payment input[name="type_pay"]').click(function () {
        $('.payment_box').slideUp();
        $(this).parent().next().slideDown();
        $('.payment_box span').html($('.total-price span').html());
    });

    jQuery.fn.serializeObject = function () {
        var formData = {};
        var formArray = this.serializeArray();
        for (var i = 0, n = formArray.length; i < n; ++i)
            formData[formArray[i].name] = formArray[i].value;
        return formData;
    };


    $(document).on('submit', '.checkout-page .item.active', function (e) {
        if (document.querySelector('.row-lable-box')) {
            const pass = document.querySelector('.presonal-account__pass-inp')
            const confPass = document.querySelector('.presonal-account__pass-inp-1')
            if (pass.value != confPass.value) {
                alert('Mot de passe confirmé différent de celui d\'origine vous ne pouvez pas continuer')
                e.preventDefault();
            }
        }

        if ($(this).find('.total-price span').html() == 0) {
            e.preventDefault();
        }
    });



    $(document).on('submit', ".checkout-page .wrapper-payment", function (e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', true);
        console.log($('.checkout-page .wrapper-payment').serializeObject());
        var form = $('.checkout-page .wrapper-payment');
        var data = {
            'action': 'order_reservation',
            'form': $(form).serializeObject(),
        };

        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                $('#bank-form').html(data);
                if (data == 'success') {
                    console.log(data);
                    window.location.href = window.location.origin + "/merci/";
                } else if (data == 'error') {
                    console.log(data);
                    window.location.href = window.location.origin + "/error-payment/";
                }
            }
        });
        return false;
    });

    if (document.querySelector('.presonal-account__form')) {
        $(document).on('submit', '.presonal-account__form', function (e) {
            e.preventDefault();
            const pass = this.querySelector('[name="user_password"]').value;
            const passConf = this.querySelector('[name="user_confirmed_password"]').value;
            console.log(2);
            if (pass == '' || passConf == '') {
                return
            }
            console.log(1);
            const checkoutPass = pass === passConf ? true : false;

            let form = new FormData(this);

            form.append("action", "update_user_password");

            let userId = this.querySelector('[name="user_id"]').value;
            form.append("user_id", userId);
            let userUpdatedInfo = {};

            for (let pair of form.entries()) {
                userUpdatedInfo[pair[0]] = pair[1];
            }
            if (pass.length > 6) {
                if (!checkoutPass) {
                    alert(
                        "Mot de passe confirmé différent de celui d'origine vous ne pouvez pas continuer"
                    );
                } else {
                    $.ajax({
                        method: "POST",
                        url: '/wp-admin/admin-ajax.php',
                        data: userUpdatedInfo,
                        success: function (data) {
                            setTimeout(() => {
                                // window.location.replace("/mediweb");
                            }, 2500);

                        },
                        error: function (request, status, error) {
                            console.log('error');
                        },
                    });
                }
            } else {
                alert("Le mot de passe que vous avez entré est court et ne peut pas être renouvelé");
            }
        })

        $(document).on('submit', '.presonal-account__form', function (e) {
            e.preventDefault();
            let form = new FormData(this);
            form.append("action", "update_user_info");

            let userId = this.querySelector('[name="user_id"]').value;
            let userEmail = this.querySelector('[name="user_email"]').value;
            let userName = this.querySelector('[name="user_name"]').value;
            let userSurname = this.querySelector('[name="user_surname"]').value;
            let userPhone = this.querySelector('[name="user_phone"]').value;
            let address = this.querySelector('[name="address"]').value;

            form.append("user_id", userId);
            form.append("user_email", userEmail);
            form.append("user_name", userName);
            form.append("user_surname", userSurname);
            form.append("user_phone", userPhone);
            form.append("address", address);


            let userUpdatedInfo = {};

            for (let pair of form.entries()) {
                userUpdatedInfo[pair[0]] = pair[1];
            }

            $.ajax({
                method: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: userUpdatedInfo,
                success: function (data) {
                    console.log(data);
                }

            });
        })
    }
    if (document.querySelector('.presonal-account__pass-inp')) {
        const passFirst = document.querySelector('.presonal-account__pass-inp')
        const passVisibleShow = document.querySelector('.presonal-account__visible-pass-show')
        const passVisibleHide = document.querySelector('.presonal-account__visible-pass-hidden')
        passVisibleShow.addEventListener('click', () => {
            passFirst.setAttribute('type', 'password')
            passVisibleShow.classList.toggle('active')
            passVisibleHide.classList.toggle('active')
        })

        passVisibleHide.addEventListener('click', () => {
            passFirst.setAttribute('type', 'text')
            passVisibleShow.classList.toggle('active')
            passVisibleHide.classList.toggle('active')
        })

        const passFirst1 = document.querySelector('.presonal-account__pass-inp-1')
        const passVisibleShow1 = document.querySelector('.presonal-account__visible-pass-show-1')
        const passVisibleHide1 = document.querySelector('.presonal-account__visible-pass-hidden-1')
        passVisibleShow1.addEventListener('click', () => {
            passFirst1.setAttribute('type', 'password')
            passVisibleShow1.classList.toggle('active')
            passVisibleHide1.classList.toggle('active')
        })

        passVisibleHide1.addEventListener('click', () => {
            passFirst1.setAttribute('type', 'text')
            passVisibleShow1.classList.toggle('active')
            passVisibleHide1.classList.toggle('active')
        })
    }
});

setTimeout(() => {
    if (document.querySelector('.wrapper-payment')) {
        if (localStorage.getItem('participantsCount') != null) {
            const inputCount = localStorage.getItem('participantsCount')
            document.querySelector('.column-count-acf').value = inputCount
            localStorage.setItem('participantsCount', '1')
        }
    }
}, 100)




