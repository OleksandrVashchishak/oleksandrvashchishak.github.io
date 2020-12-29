if (document.querySelector(".personal__add-select-cont-rent-home")) {
    document.querySelector('#timeRentHome1').addEventListener('change', function() {
        document.querySelector('.personal__add-select-cont-rent-home').classList.add('active')
    })

    document.querySelector('#timeRentHome2').addEventListener('change', function() {
        document.querySelector('.personal__add-select-cont-rent-home').classList.remove('active')
    })
}
if (document.querySelector(".rent-worker-calc")) {
    let workerValue = document.querySelector('.input-calc-worker')
    document.querySelector('.calc-button1').addEventListener('click', function() {
        if (workerValue.value == 0) {
            return
        }
        workerValue.value--
    })
    document.querySelector('.calc-button2').addEventListener('click', function() {
        workerValue.value++
    })
}

if (document.querySelector(".mandatory-registration-popup-pay-accept")) {
    document.querySelector('.personal__button-add-vacancy').addEventListener('click', function() {
        document.querySelector('.mandatory-registration-popup-pay-accept').classList.remove('visually-hidden')
    })

    let mandatoryPersonal = document.querySelector('.mandatory_radio-for-personal')
    let mandatoryCompany = document.querySelector('.mandatory_radio-for-company')
    document.querySelector('#mandatoryRadio1').addEventListener('change', function() {
        mandatoryCompany.classList.add('active')
        mandatoryPersonal.classList.remove('active')
    })

    document.querySelector('#mandatoryRadio2').addEventListener('change', function() {
        mandatoryCompany.classList.remove('active')
        mandatoryPersonal.classList.add('active')
    })
}

function getContractPopup() {
    document.querySelector('.mandatory-contract-popup').classList.remove('visually-hidden')

}

function getbotTooltipePopup() {
    document.querySelector('.mandatory-registration-popup-bot-tooltipe').classList.remove('visually-hidden')
}

function getTopTooltipePopup() {
    document.querySelector('.mandatory-registration-popup-top-tooltipe').classList.remove('visually-hidden')
}

function getBotTooltipe() {
    document.querySelector('.tooltip-help-answer-bot').classList.add('active')
}

function closeBotTooltipe() {
    document.querySelector('.tooltip-help-answer-bot').classList.remove('active')
}

function getTopTooltipe() {
    document.querySelector('.tooltip-help-answer-top').classList.add('active')
}

function closeTopTooltipe() {
    document.querySelector('.tooltip-help-answer-top').classList.remove('active')
}

if (document.querySelector(".mandatory-registration-popup-bot-tooltipe")) {
    let closeBtnPopup = document.querySelectorAll('.sign-wrap__btn')
    let mainTooltipePopup = document.querySelectorAll('.mandatory-registration-popup')
    for (let i = 0; i < closeBtnPopup.length; i++) {
        closeBtnPopup[i].addEventListener('click', function() {
            mainTooltipePopup[i].classList.add('visually-hidden')
        })
    }


    // cheked all checkbox
    let mandatoryCheckboxItem = document.querySelectorAll('.mandatory-checkbox-item')

    function getCheckAll() {
        for (let i = 0; i < mandatoryCheckboxItem.length; i++) {
            if (mandatoryCheckboxItem[i].checked) {
                continue
            }
            mandatoryCheckboxItem[i].click()
        }
    }


    for (let i = 0; i < mandatoryCheckboxItem.length; i++) {
        mandatoryCheckboxItem[i].addEventListener('click', getCountChecked)
    }

    function getCountChecked() {
        let countChecked = 0
        for (let i = 0; i < mandatoryCheckboxItem.length; i++) {
            if (mandatoryCheckboxItem[i].checked) {
                countChecked++
            }
        }
        document.querySelector('.mandatory_result-calc').textContent = countChecked
    }

}

if (document.querySelector(".company-data")) {
    function getPopapChangeCompany() {
        document.querySelector('.popup-change-name-company').classList.remove('visually-hidden')
    }

    let addWorkerEmailForm = document.querySelector('.add-worker-email')
    let addWorkerEmailBtn = document.querySelectorAll('.service-add-worker-email.active')

    const firstBtnEmail = document.querySelector('.service-add-worker-email-1')
    const twoBtnEmail = document.querySelector('.service-add-worker-email-2')
    const threeBtnEmail = document.querySelector('.service-add-worker-email-3')

    const firstItemEmail = document.querySelector('.email-add-worker-item-first')
    const twoItemEmail = document.querySelector('.email-add-worker-item-two')
    const threeItemEmail = document.querySelector('.email-add-worker-item-three')




    function removeParentEmail() {
        let target = event.target;
        target.parentNode.parentNode.classList.remove('active')
        if (addWorkerEmailForm.childElementCount == 0) {
            document.querySelector('.service-button-gray').classList.add('unactive')
        }

        if (!firstItemEmail.classList.contains('active')) {
            firstBtnEmail.classList.add('active')
        } else if (!twoItemEmail.classList.contains('active')) {
            twoBtnEmail.classList.add('active')
        } else if (!threeItemEmail.classList.contains('active')) {
            threeBtnEmail.classList.add('active')
        }
        let addWorkerEmailBtn = document.querySelectorAll('.service-add-worker-email.active')

        if (addWorkerEmailBtn.length > 1) {
            addWorkerEmailBtn[addWorkerEmailBtn.length - 1].classList.remove('active')
        }
    }

    firstBtnEmail.addEventListener('click', () => {
        firstBtnEmail.classList.remove('active')
        document.querySelector('.email-add-worker-item-first').classList.add('active')
        document.querySelector('.service-button-gray').classList.remove('unactive')

        if (!firstItemEmail.classList.contains('active')) {
            firstBtnEmail.classList.add('active')
        } else if (!twoItemEmail.classList.contains('active')) {
            twoBtnEmail.classList.add('active')
        } else if (!threeItemEmail.classList.contains('active')) {
            threeBtnEmail.classList.add('active')
        }
    });

    twoBtnEmail.addEventListener('click', () => {
        twoBtnEmail.classList.remove('active')
        document.querySelector('.email-add-worker-item-two').classList.add('active')
        document.querySelector('.service-button-gray').classList.remove('unactive')

        if (!firstItemEmail.classList.contains('active')) {
            firstBtnEmail.classList.add('active')
        } else if (!twoItemEmail.classList.contains('active')) {
            twoBtnEmail.classList.add('active')
        } else if (!threeItemEmail.classList.contains('active')) {
            threeBtnEmail.classList.add('active')
        }
    });

    threeBtnEmail.addEventListener('click', () => {
        threeBtnEmail.classList.remove('active')

        document.querySelector('.email-add-worker-item-three').classList.add('active')
        document.querySelector('.service-button-gray').classList.remove('unactive')

        if (!firstItemEmail.classList.contains('active')) {
            firstBtnEmail.classList.add('active')
        } else if (!twoItemEmail.classList.contains('active')) {
            twoBtnEmail.classList.add('active')
        } else if (!threeItemEmail.classList.contains('active')) {
            threeBtnEmail.classList.add('active')
        }
    });
    console.log(firstItemEmail.classList)
    if (!firstItemEmail.classList.contains('active')) {
        firstBtnEmail.classList.add('active')

    } else if (!twoItemEmail.classList.contains('active')) {
        twoBtnEmail.classList.add('active')
    } else if (!threeItemEmail.classList.contains('active')) {
        threeBtnEmail.classList.add('active')

    }


}

if (document.querySelector(".personal__panel-servicesJS")) {
    let serviceOpenContainer = document.querySelectorAll('.service__open-container')
    let serviceOpenCheckJS = document.querySelectorAll('.serviceOpenCheckJS')
    let serviceOnvisualText = document.querySelectorAll('.service__onvisual-text')
    let serviceHideText = document.querySelectorAll('.service__hide-text')
    let firstRadio = document.querySelectorAll('.firstRadio')

    for (let i = 0; i < serviceOpenCheckJS.length; i++) {
        serviceOpenCheckJS[i].addEventListener('click', function() {

            if (serviceOnvisualText[i].classList.contains('active')) {
                serviceOnvisualText[i].classList.remove('active')
                renderServicePrice()
                return
            }
            serviceOpenContainer[i].classList.toggle('active')
            firstRadio[i].click()
            renderServicePrice()
        })

        serviceHideText[i].addEventListener('click', function() {

            serviceOnvisualText[i].classList.add('active')
            serviceOpenContainer[i].classList.remove('active')
        })

        serviceOnvisualText[i].addEventListener('click', function() {
            serviceOnvisualText[i].classList.remove('active')
            serviceOpenContainer[i].classList.add('active')
        })
    }

    let servicePriceNumber = document.querySelector('.service__finish-price-number')

    let openAutshorsing = document.querySelector('.open-container-autshorsing')
    let openLising = document.querySelector('.open-container-lising')
    let openWorking = document.querySelector('.open-container-working')
    let openSelecting = document.querySelector('.open-container-selecting')
    let openСooperation = document.querySelector('.open-container-cooperation')
    let lisingShow = document.querySelector('.lisingShow')
    let autshorsingShow = document.querySelector('.autshorsing-show-more')
    let workingShow = document.querySelector('.working-show-more')
    let selectingShow = document.querySelector('.selecting-show-more')
    let cooperationShow = document.querySelector('.cooperation-show-more')
    let lisingPrice = 0,
        autshorsingPrice = 0,
        workingPrice = 0,
        selectingPrice = 0,
        cooperationPrice = 0

    renderServicePrice()
    document.querySelector('#serviceLising1').addEventListener('click', function() {
        lisingPrice = 250
        renderServicePrice()
    })
    document.querySelector('#serviceLising2').addEventListener('click', function() {
        lisingPrice = 650
        renderServicePrice()
    })
    document.querySelector('#serviceLising3').addEventListener('click', function() {
        lisingPrice = 1200
        renderServicePrice()
    })

    document.querySelector('#serviceAutshorsing1').addEventListener('click', function() {
        autshorsingPrice = 250
        renderServicePrice()
    })
    document.querySelector('#serviceAutshorsing2').addEventListener('click', function() {
        autshorsingPrice = 650
        renderServicePrice()
    })
    document.querySelector('#serviceAutshorsing3').addEventListener('click', function() {
        autshorsingPrice = 1200
        renderServicePrice()
    })

    document.querySelector('#serviceWorking1').addEventListener('click', function() {
        workingPrice = 250
        renderServicePrice()
    })
    document.querySelector('#serviceWorking2').addEventListener('click', function() {
        workingPrice = 650
        renderServicePrice()
    })
    document.querySelector('#serviceWorking3').addEventListener('click', function() {
        workingPrice = 1200
        renderServicePrice()
    })

    document.querySelector('#serviceSelecting1').addEventListener('click', function() {
        selectingPrice = 250
        renderServicePrice()
    })
    document.querySelector('#serviceSelecting2').addEventListener('click', function() {
        selectingPrice = 650
        renderServicePrice()
    })
    document.querySelector('#serviceSelecting3').addEventListener('click', function() {
        selectingPrice = 1200
        renderServicePrice()
    })

    document.querySelector('#serviceСooperation1').addEventListener('click', function() {
        cooperationPrice = 250
        renderServicePrice()
    })
    document.querySelector('#serviceСooperation2').addEventListener('click', function() {
        cooperationPrice = 650
        renderServicePrice()
    })
    document.querySelector('#serviceСooperation3').addEventListener('click', function() {
        cooperationPrice = 1200
        renderServicePrice()
    })


    function renderServicePrice() {
        if (openAutshorsing.classList.contains('active')) {} else {
            if (autshorsingShow.classList.contains('active')) {} else { autshorsingPrice = 0 }
        }
        if (openLising.classList.contains('active')) {} else {
            if (lisingShow.classList.contains('active')) {} else { lisingPrice = 0 }
        }
        if (openWorking.classList.contains('active')) {} else {
            if (workingShow.classList.contains('active')) {} else { workingPrice = 0 }
        }

        if (openSelecting.classList.contains('active')) {} else {
            if (selectingShow.classList.contains('active')) {} else { selectingPrice = 0 }
        }

        if (openСooperation.classList.contains('active')) {} else {
            if (cooperationShow.classList.contains('active')) {} else { cooperationPrice = 0 }
        }

        servicePriceNumber.textContent = lisingPrice + autshorsingPrice + workingPrice + selectingPrice + cooperationPrice
    }

}



if (document.querySelector(".personal__select-ul")) {
    let filterWojewodstwoI = document.querySelectorAll(
        ".filter__wojewodstwo-tablet"
    );
    let filterCityI = document.querySelector(".filter__city-input-wrap");
    filterCityI.style.display = "none";
    for (let i = 0; i < filterWojewodstwoI.length; i++) {
        filterWojewodstwoI[i].addEventListener("click", getCityBlock);

        function getCityBlock() {
            filterCityI.style.display = "block";
            if (this.innerHTML == "Cała Polska") {
                filterCityI.style.display = "none";
            }
        }
    }

    let filterRegionsI = document.querySelector(
        ".filter__all-regions-tablet-wrap"
    );

    let selectIconI = document.querySelectorAll(".select__icon");
    document.addEventListener("click", function(event) {
        let target = event.target;
        if (
            target.classList.contains("regions-tablet-input") ||
            target.classList.contains("select__icon")
        ) {
            return;
        }
        filterRegionsI.classList.remove("is-active");
        selectIconI[0].classList.remove("arrow-up");
    });

    let selectfilterSityI = document.querySelector(".filter__city-input-wrap");
    document.addEventListener("click", function(event) {
        let target = event.target;
        if (
            target.classList.contains("filter__city-input") ||
            target.classList.contains("select__icon")
        ) {
            return;
        }
        selectfilterSityI.classList.remove("is-active");
        selectIconI[1].classList.remove("arrow-up");
    });
}

let backgrountOpacityAll = document.querySelector(".backgrount-opacity-all");
let accountMobileMenu = document.querySelector(".personal__mobile-menu");
let accountMobileMenuPanel = document.querySelector(".personal__panel");
let closeMobileAcc = document.querySelector(".close-mobile-acc");

accountMobileMenu.addEventListener("click", getMobileMenuAcc);

function getMobileMenuAcc() {
    accountMobileMenuPanel.classList.add("active");
    backgrountOpacityAll.classList.add("active");
}
closeMobileAcc.addEventListener("click", closeMobileMenuAcc);

function closeMobileMenuAcc() {
    accountMobileMenuPanel.classList.remove("active");
    backgrountOpacityAll.classList.remove("active");
}

if (document.querySelector(".personal__real-icon-play")) {
    let iconPlay = document.querySelectorAll(".personal__real-icon-play");
    let realColPlay = document.querySelectorAll(".personal__real-col-play ");
    let realColPause = document.querySelectorAll(".personal__real-col-pause");

    for (let i = 0; i < iconPlay.length; i++) {
        iconPlay[i].addEventListener("click", function() {
            realColPlay[i].classList.toggle("block");
            realColPause[i].classList.toggle("block");
        });
    }
}

document.addEventListener("DOMContentLoaded", createSelect, false);

function createSelect() {
    var select = document.getElementsByTagName("select"),
        liElement,
        ulElement,
        optionValue,
        iElement,
        optionText,
        selectDropdown,
        elementParentSpan;

    for (var select_i = 0, len = select.length; select_i < len; select_i++) {
        for (let i = 0; i < select[select_i].parentNode.children[1].children.length; i++) {
            if (select[select_i].parentNode.children[1].children[i].getAttribute('selected')) {
                select[select_i].setAttribute('placeholder-text', select[select_i].parentNode.children[1].children[i].textContent)
                break
            }
        }
    }

    for (var select_i = 0, len = select.length; select_i < len; select_i++) {
        select[select_i].style.display = "none";
        wrapElement(
            document.getElementById(select[select_i].id),
            document.createElement("div"),
            select_i,
            select[select_i].getAttribute("placeholder-text")
        );


        for (var i = 0; i < select[select_i].options.length; i++) {
            liElement = document.createElement("li");
            optionValue = select[select_i].options[i].value;
            optionText = document.createTextNode(select[select_i].options[i].text);
            liElement.className = "select-dropdown__list-item";
            liElement.setAttribute("data-value", optionValue);
            liElement.appendChild(optionText);
            ulElement.appendChild(liElement);

            liElement.addEventListener(
                "click",
                function() {
                    displyUl(this);
                },
                false
            );
        }
    }

    function wrapElement(el, wrapper, i, placeholder) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);

        document.addEventListener("click", function(e) {
            let clickInside = wrapper.contains(e.target);
            if (!clickInside) {
                let menu = wrapper.getElementsByClassName("select-dropdown__list");
                menu[0].classList.remove("active");
                menu[0].parentNode.children[1].classList.remove("active");
            }
        });

        var buttonElement = document.createElement("button"),
            spanElement = document.createElement("span"),
            spanText = document.createTextNode(placeholder);
        iElement = document.createElement("i");
        ulElement = document.createElement("ul");


        wrapper.className = "select-dropdown select-dropdown--" + i;
        buttonElement.className =
            "select-dropdown__button select-dropdown__button--" + i;
        buttonElement.setAttribute("data-value", "");
        buttonElement.setAttribute("type", "button");
        spanElement.className = "select-dropdown select-dropdown--" + i;
        iElement.className = "zmdi zmdi-chevron-down";
        ulElement.className = "select-dropdown__list select-dropdown__list--" + i;
        ulElement.id = "select-dropdown__list-" + i;

        wrapper.appendChild(buttonElement);
        spanElement.appendChild(spanText);
        buttonElement.appendChild(spanElement);
        buttonElement.appendChild(iElement);
        wrapper.appendChild(ulElement);
    }

    function displyUl(element) {
        if (element.tagName == "BUTTON") {
            selectDropdown = element.parentNode.getElementsByTagName("ul");
            for (var i = 0, len = selectDropdown.length; i < len; i++) {
                selectDropdown[i].classList.toggle("active");
                element.classList.toggle("active");
            }
        } else if (element.tagName == "LI") {
            var selectId = element.parentNode.parentNode.getElementsByTagName(
                "select"
            )[0];
            selectElement(selectId.id, element.getAttribute("data-value"));
            elementParentSpan = element.parentNode.parentNode.getElementsByTagName(
                "span"
            );
            element.parentNode.classList.toggle("active");
            if (document.querySelector(".mandatory-registration-popup-pay-accept")) {
                let otherCantryVis = document.querySelector('.mandatory_other-cantry-vis')
                let polishCantryVis = document.querySelector('.mandatory_polish-cantry-vis')
                if (element.textContent == 'Polska') {
                    polishCantryVis.classList.add('active')
                    otherCantryVis.classList.remove('active')
                } else if (element.textContent == 'Poza Unią Europejską' || element.textContent == 'Unia Europejska') {
                    polishCantryVis.classList.remove('active')
                    otherCantryVis.classList.add('active')
                }

            }
            if (document.querySelector(".select-category-home-for-worker")) {
                if (element.textContent == 'Inne') {
                    document.querySelector('.service__textarea-home-for-worker').classList.add('active')
                } else if (element.textContent == 'Zapewnia pracodawca' || element.textContent == 'Zapewnia agencja') {
                    document.querySelector('.service__textarea-home-for-worker').classList.remove('active')
                }
            }

            if (
                element.parentNode.previousSibling.previousSibling.classList.contains(
                    "selectCityPolish"
                )
            ) {
                let cityPolish = document.querySelectorAll(".select-custom-acc-v");
                for (i = 0; i < cityPolish.length; i++) {
                    cityPolish[i].classList.remove("active");
                }
                for (i = 0; i < cityPolish.length; i++) {
                    if (element.getAttribute("data-value") == i + 2) {
                        cityPolish[i].classList.add("active");
                        break;
                    }
                }
            }

            if (
                element.parentNode.previousSibling.previousSibling.classList.contains(
                    "select-category-notice-acc"
                )
            ) {
                let catPolish = document.querySelectorAll(".select-custom-acc-cat");
                for (i = 0; i < catPolish.length; i++) {
                    catPolish[i].classList.remove("active");
                }
                for (i = 0; i < catPolish.length; i++) {


                    if (element.getAttribute("data-value") == i + 1) {
                        catPolish[i].classList.add("active");
                        break;
                    }
                }
            }




            if (document.querySelector('.exp-work-сontainer')) {
                let expWorkContainer = document.querySelector(".exp-work-сontainer-default");
                console.log(element.parentNode.previousSibling.previousSibling.classList.contains('select-exp-level'))
                if (element == element.parentNode.children[1] && element.parentNode.previousSibling.previousSibling.classList.contains('select-exp-level')) {
                    expWorkContainer.classList.add('active')
                    document.querySelector(".exp-work-container-main").style.display = 'block'
                } else if (element == element.parentNode.children[0] && element.parentNode.previousSibling.previousSibling.classList.contains('select-exp-level')) {
                    expWorkContainer.classList.remove('active')
                    document.querySelector(".exp-work-container-main").style.display = 'none'
                }

                let expWorkContainerFirst = document.querySelector(".exp-work-сontainer-add1");
                let expWorkContainerTwo = document.querySelector(".exp-work-сontainer-add2");

                let validationWokPlace_1 = document.querySelectorAll(".validation-work-place-1");
                let validationWokPlace_2 = document.querySelectorAll(".validation-work-place-2");

                document.querySelector(".add-exp-work-1").addEventListener('click', function() {
                    for (let inp of validationWokPlace_1) {
                        if (inp.value == '') {
                            return
                        }
                    }
                    expWorkContainerFirst.classList.add('active')
                })
                document.querySelector(".remove-this-work-place-1").addEventListener('click', function() {
                    expWorkContainerFirst.classList.remove('active')
                })

                document.querySelector(".add-exp-work-2").addEventListener('click', function() {
                    for (let inp of validationWokPlace_2) {
                        if (inp.value == '') {
                            return
                        }
                    }
                    expWorkContainerTwo.classList.add('active')
                })
                document.querySelector(".remove-this-work-place-2").addEventListener('click', function() {
                    expWorkContainerTwo.classList.remove('active')
                })

                let educationWorkContainer = document.querySelector(".education-work-сontainer-default");
                if (element == element.parentNode.children[0] && element.parentNode.previousSibling.previousSibling.classList.contains('select-education-class') ||
                    element == element.parentNode.children[1] && element.parentNode.previousSibling.previousSibling.classList.contains('select-education-class') ||
                    element == element.parentNode.children[3] && element.parentNode.previousSibling.previousSibling.classList.contains('select-education-class')) {
                    educationWorkContainer.classList.add('active')
                    console.log('asdasd')
                    document.querySelector(".education-work-container-main").style.display = 'block'
                } else if (element == element.parentNode.children[2] && element.parentNode.previousSibling.previousSibling.classList.contains('select-education-class')) {
                    educationWorkContainer.classList.remove('active')
                    document.querySelector(".education-work-container-main").style.display = 'none'
                }

                let educationWorkContainerFirst = document.querySelector(".education-work-сontainer-add1");
                let educationWorkContainerTwo = document.querySelector(".education-work-сontainer-add2");
                let validationWokEdPlace_1 = document.querySelectorAll(".validation-work-place-ed-1");
                let validationWokEdPlace_2 = document.querySelectorAll(".validation-work-place-ed-2");

                document.querySelector(".add-education-work-1").addEventListener('click', function() {
                    for (let inp of validationWokEdPlace_1) {
                        console.log(inp);
                        if (inp.value == '') {
                            return
                        }
                    }
                    educationWorkContainerFirst.classList.add('active')
                })

                document.querySelector(".add-education-work-2").addEventListener('click', function() {
                    for (let inp of validationWokEdPlace_2) {
                        console.log(inp);
                        if (inp.value == '') {
                            return
                        }
                    }
                    educationWorkContainerTwo.classList.add('active')
                })

                document.querySelector(".remove-this-education-place-1").addEventListener('click', function() {
                    educationWorkContainerFirst.classList.remove('active')
                })

                document.querySelector(".remove-this-education-place-2").addEventListener('click', function() {
                    educationWorkContainerTwo.classList.remove('active')
                })



                let addNewLeng1 = document.querySelector('.add-new-leng-work1')
                let addNewLeng2 = document.querySelector('.add-new-leng-work2')

                if (document.getElementById('select-vacancy41').getAttribute('selected')) {
                    addNewLeng1.classList.add('active')
                }

                addNewLeng1.addEventListener('click', function() {
                    addNewLeng1.classList.add('hidden')
                    document.querySelector('.lang-container-1-work').classList.add('active')
                })

                if (document.getElementById('select-vacancy411').getAttribute('selected')) {
                    addNewLeng2.classList.add('active')
                }

                addNewLeng2.addEventListener('click', function() {
                    addNewLeng2.classList.add('hidden')
                    document.querySelector('.lang-container-2-work').classList.add('active')
                })

            }



            if (
                element.parentNode.previousSibling.previousSibling.classList.contains(
                    "select-category-adverts-js"
                )
            ) {
                let catPolish = document.querySelectorAll(".select-custom-acc-cat");
                for (i = 0; i < catPolish.length; i++) {
                    catPolish[i].classList.remove("active");
                }
                if (element.getAttribute("data-value") == "Ubezpieczenia") {
                    catPolish[0].classList.add("active");
                } else if (element.getAttribute("data-value") == "Prawo") {
                    catPolish[1].classList.add("active");
                } else if (element.getAttribute("data-value") == "Rekreacja") {
                    catPolish[2].classList.add("active");
                } else if (element.getAttribute("data-value") == "Kredyty (Usługi finansowe)") {
                    catPolish[3].classList.add("active");
                }
            }



            if (
                element.parentNode.previousSibling.previousSibling.classList.contains(
                    "select-category-notice-subCat"
                )
            ) {
                let catPolish = document.querySelectorAll(".select-custom-acc-cat");
                for (i = 0; i < catPolish.length; i++) {
                    catPolish[i].classList.remove("active");
                }


                if (element.getAttribute("data-value") == "Motoryzacja") {
                    catPolish[0].classList.add("active");
                } else if (element.getAttribute("data-value") == "Dom i Ogród") {
                    catPolish[1].classList.add("active");
                } else if (element.getAttribute("data-value") == "Elektronika") {
                    catPolish[2].classList.add("active");
                } else if (element.getAttribute("data-value") == "Moda") {
                    catPolish[3].classList.add("active");
                } else if (element.getAttribute("data-value") == "Rolnictwo") {
                    catPolish[4].classList.add("active");
                } else if (element.getAttribute("data-value") == "Zwierzęta") {
                    catPolish[5].classList.add("active");
                } else if (element.getAttribute("data-value") == "Dla Dzieci") {
                    catPolish[6].classList.add("active");
                } else if (element.getAttribute("data-value") == "Sport i Hobby") {
                    catPolish[7].classList.add("active");
                } else if (element.getAttribute("data-value") == "Muzyka i Edukacja") {
                    catPolish[8].classList.add("active");
                } else if (element.getAttribute("data-value") == "Usługi i Firmy") {
                    catPolish[9].classList.add("active");
                } else if (element.getAttribute("data-value") == "Ślub i Wesele") {
                    catPolish[10].classList.add("active");
                }
            }
            element.parentNode.parentNode.children[1].classList.toggle("active");
            element.parentNode.parentNode.children[1].style.color = "#464646";

            elementParentSpan[0].textContent = element.textContent;
            elementParentSpan[0].parentNode.setAttribute(
                "data-value",
                element.getAttribute("data-value")
            );
        }
    }

    function selectElement(id, valueToSelect) {
        var element = document.getElementById(id);
        element.value = valueToSelect;
        element.setAttribute("selected", "selected");
    }
    var buttonSelect = document.getElementsByClassName("select-dropdown__button");

    for (var i = 0, len = buttonSelect.length; i < len; i++) {
        buttonSelect[i].addEventListener(
            "click",
            function(e) {
                e.preventDefault();
                displyUl(this);
            },
            false
        );
    }
}





let photoLabel = document.querySelector(".personal__add-photo-label");
let bunnerLabel = document.querySelector(".personal__add-bunner-label");
let leadBunner = document.querySelector(".personal__lead-bunner");
let leadPhoto = document.querySelector(".personal__lead-photo");

photoLabel.addEventListener("click", getPhotoBlock);

function getPhotoBlock() {
    leadPhoto.classList.toggle("active");
}

bunnerLabel.addEventListener("click", getBunnerBlock);

function getBunnerBlock() {
    leadBunner.classList.toggle("active");
    bunnerLabel.classList.toggle("active");
    if (typeAdvertBunner.classList.contains("active")) {
        visualEditor.classList.toggle("active");
    }
}

let wwwOnLink = document.querySelector(".www-on-link");
let wwwOnLinkSticker = document.querySelector(".www-on-link-sticker");
let linkLabel = document.querySelector(".personal__add-link-label");
let leadLink = document.querySelector(".add-link-check");

linkLabel.addEventListener("click", getLinkBlock);

function getLinkBlock() {
    leadLink.classList.toggle("active");
    wwwOnLink.classList.toggle("active");
    wwwOnLinkSticker.classList.toggle("active");
}

let stickLabel = document.querySelector(".personal__add-sick-label");
let leadStick = document.querySelector(".add-stick-check");

stickLabel.addEventListener("click", getStickBlock);

function getStickBlock() {
    leadStick.classList.toggle("active");
}

// let addStickRabat = document.querySelector(".add-stick-rabat");
// let adventR = document.querySelector(".sticer-advent-r");
// let addStickNic = document.querySelector(".add-stick-nic");
// let adventN = document.querySelector(".sticer-advent-n");
// let addStickKarta = document.querySelector(".add-stick-karta");
// let adventP = document.querySelector(".sticer-advent-p");
// let addStickPromocija = document.querySelector(".add-stick-promocija");
// let adventPr = document.querySelector(".sticer-advent-pr");
// addStickRabat.click();
// addStickRabat.addEventListener("click", getAddStickRabat);
// function getAddStickRabat() {
//   adventPr.classList.remove("active");
//   adventP.classList.remove("active");
//   adventN.classList.remove("active");
//   adventR.classList.add("active");
// }

// addStickPromocija.addEventListener("click", getAddStickPromocija);
// function getAddStickPromocija() {
//   adventPr.classList.add("active");
//   adventP.classList.remove("active");
//   adventN.classList.remove("active");
//   adventR.classList.remove("active");
// }

// addStickKarta.addEventListener("click", getAddStickKarta);
// function getAddStickKarta() {
//   adventPr.classList.remove("active");
//   adventN.classList.remove("active");
//   adventR.classList.remove("active");
//   adventP.classList.add("active");
// }

// addStickNic.addEventListener("click", getAddStickNic);
// function getAddStickNic() {
//   adventPr.classList.remove("active");
//   adventR.classList.remove("active");
//   adventP.classList.remove("active");
//   adventN.classList.add("active");
// }

let addGalaryLabel = document.querySelector(".personal__add-galary-label");
let adventDesc = document.querySelector(".bunner-advent-desc");
let adventDescWithaut = document.querySelector(".bunner-advent-desc-withaut");
let adventDescGalary = document.querySelector(".personal__add-galary-descc");

addGalaryLabel.addEventListener("click", getGalaryLabel);

function getGalaryLabel() {
    adventDesc.classList.toggle("active");
    adventDescWithaut.classList.toggle("active");
    adventDescGalary.classList.toggle("active");
}

let uploadWrapper = document.querySelector(".input-cont-upload-wrapper");
let uploadBanner = document.querySelector(".input-cont-upload-banner");

let typeAdvertDescImg = document.querySelector(
    ".personal__img-stick-main-desc"
);
let typeAdvertBunnerImg = document.querySelector(
    ".personal__img-stick-main-bunner"
);
let typeAdvertDescIm = document.querySelector(".personal__img-stick-main-des");
let typeAdvertBunnerIm = document.querySelector(
    ".personal__img-stick-main-bunne"
);
let typeAdvertDesc = document.querySelector(".personal__type-advert-desc");
let typeAdvertBunner = document.querySelector(".personal__type-advert-bunner");
let typeAdvertB = document.querySelector(".personal__type-advert-b");
let visualEditor = document.querySelector(".visual-editor-cont-desc");


let inputNameAdverDesc = document.querySelector(".select-custom-acc-name-desc");
let inputNameAdverBunner = document.querySelector(".select-custom-acc-bunner-name");

typeAdvertBunner.addEventListener("click", getTypeAdvertBunner);

function getTypeAdvertBunner() {
    uploadBanner.classList.add("active");
    uploadWrapper.classList.remove("active");
    typeAdvertDesc.classList.remove("active");
    typeAdvertBunner.classList.add("active");
    visualEditor.classList.remove("active");
    typeAdvertDescImg.classList.add("active");
    typeAdvertBunnerImg.classList.remove("active");
    typeAdvertDescIm.classList.add("active");
    typeAdvertBunnerIm.classList.remove("active");
    if (bunnerLabel.classList.contains("active")) {
        visualEditor.classList.add("active");
    }

    inputNameAdverDesc.classList.remove('active')
    inputNameAdverBunner.classList.add('active')
}

typeAdvertDesc.addEventListener("click", getTypeAdvertDesc);

function getTypeAdvertDesc() {
    uploadBanner.classList.remove("active");
    uploadWrapper.classList.add("active");
    typeAdvertDesc.classList.add("active");
    typeAdvertBunner.classList.remove("active");
    typeAdvertBunnerImg.classList.add("active");
    typeAdvertDescImg.classList.remove("active");
    typeAdvertBunnerIm.classList.add("active");
    typeAdvertDescIm.classList.remove("active");
    visualEditor.classList.add("active");

    inputNameAdverDesc.classList.add('active')
    inputNameAdverBunner.classList.remove('active')
}