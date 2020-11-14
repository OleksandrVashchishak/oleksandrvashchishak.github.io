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
   iconPlay[i].addEventListener("click", function () {
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
    //console.log('selects init');

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
        function () {
          displyUl(this);
        },
        false
      );
    }
  }
  function wrapElement(el, wrapper, i, placeholder) {
    el.parentNode.insertBefore(wrapper, el);
    wrapper.appendChild(el);

    document.addEventListener("click", function (e) {
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

      if(element.parentNode.previousSibling.previousSibling.classList.contains('selectCityPolish')){
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

    if(element.parentNode.classList.contains('select-dropdown__list--0')){
      let catPolish = document.querySelectorAll(".select-custom-acc-cat");
      for (i = 0; i <  catPolish.length; i++) {
        catPolish[i].classList.remove("active");
      }
      for (i = 0; i <  catPolish.length; i++) {
        console.log(catPolish[i] + i);

        if (element.getAttribute("data-value") == i + 1) {
          catPolish[i].classList.add("active");
          break;
        }
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
      function (e) {
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
  if( typeAdvertBunner.classList.contains('active')){
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

let addStickRabat = document.querySelector(".add-stick-rabat");
let adventR = document.querySelector(".sticer-advent-r");
let addStickNic = document.querySelector(".add-stick-nic");
let adventN = document.querySelector(".sticer-advent-n");
let addStickKarta = document.querySelector(".add-stick-karta");
let adventP = document.querySelector(".sticer-advent-p");
let addStickPromocija = document.querySelector(".add-stick-promocija");
let adventPr = document.querySelector(".sticer-advent-pr");
addStickRabat.click()
addStickRabat.addEventListener("click", getAddStickRabat);
function getAddStickRabat() {
  adventPr.classList.remove("active")
  adventP.classList.remove("active")
  adventN.classList.remove("active")
  adventR.classList.add("active");
}

addStickPromocija.addEventListener("click", getAddStickPromocija);
function getAddStickPromocija() {
  adventPr.classList.add("active")
  adventP.classList.remove("active")
  adventN.classList.remove("active")
  adventR.classList.remove("active");
}

addStickKarta.addEventListener("click", getAddStickKarta);
function getAddStickKarta() {
  adventPr.classList.remove("active")
  adventN.classList.remove("active")
  adventR.classList.remove("active");
  adventP.classList.add("active");
}

addStickNic.addEventListener("click", getAddStickNic);
function getAddStickNic() {
  adventPr.classList.remove("active")
  adventR.classList.remove("active");
  adventP.classList.remove("active");
  adventN.classList.add("active");
}





let addGalaryLabel = document.querySelector(".personal__add-galary-label");
let adventDesc = document.querySelector(".bunner-advent-desc");
let adventDescWithaut= document.querySelector(".bunner-advent-desc-withaut");
let adventDescGalary= document.querySelector(".personal__add-galary-descc");

addGalaryLabel.addEventListener("click", getGalaryLabel);
function getGalaryLabel() {
  adventDesc.classList.toggle("active");
  adventDescWithaut.classList.toggle("active");
  adventDescGalary.classList.toggle("active");
}






let uploadWrapper= document.querySelector(".input-cont-upload-wrapper");
let uploadBanner= document.querySelector(".input-cont-upload-banner");

let typeAdvertDescImg= document.querySelector(".personal__img-stick-main-desc");
let typeAdvertBunnerImg= document.querySelector(".personal__img-stick-main-bunner");
let typeAdvertDescIm= document.querySelector(".personal__img-stick-main-des");
let typeAdvertBunnerIm= document.querySelector(".personal__img-stick-main-bunne");
let typeAdvertDesc= document.querySelector(".personal__type-advert-desc");
let typeAdvertBunner= document.querySelector(".personal__type-advert-bunner");
let typeAdvertB= document.querySelector(".personal__type-advert-b");
let visualEditor= document.querySelector(".visual-editor-cont-desc");


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
  if(bunnerLabel.classList.contains('active')){
    visualEditor.classList.add("active");
  }
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
}


