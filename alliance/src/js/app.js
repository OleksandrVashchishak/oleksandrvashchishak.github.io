import $ from "jquery";
import "../bootstrap/js/bootstrap.min.js";
import AOS from 'aos';
import createAnimation from "./animation";
import { blogSelect } from './blogSelect.js';
AOS.init();
createAnimation();

// require('../js/animation.js');
require("../js/pages.js");
 
AOS.init();
$(document).ready(function() {
  $(".sort__by-category-position").click(function(event) {
    $(
      ".sort__category-ul-position, .sort__by-category-position, .button-test-position"
    ).toggleClass("active");

    let levelBtn = document.querySelector(".button-test-level");
    let levelUlCat = document.querySelector(".sort__category-ul-level");
    let LevelCat = document.querySelector(".sort__by-category-level");
    if (levelUlCat.classList.contains("active")) {
      levelUlCat.classList.toggle("active");
      LevelCat.classList.toggle("active");
      levelBtn.classList.toggle("active");
    }
    let TagBtn = document.querySelector(".button-test-tag");
    let TagUlCat = document.querySelector(".sort__category-ul-tag");
    let TagCat = document.querySelector(".sort__by-category-tag");
    if (TagUlCat.classList.contains("active")) {
      TagUlCat.classList.toggle("active");
      TagCat.classList.toggle("active");
      TagBtn.classList.toggle("active");
    }
  });
});

$(document).ready(function() {
  $(".sort__by-category-level").click(function(event) {
    $(
      ".sort__category-ul-level, .sort__by-category-level, .button-test-level"
    ).toggleClass("active");
    let positionBtn = document.querySelector(".button-test-position");
    let positionUlCat = document.querySelector(".sort__category-ul-position");
    let positionCat = document.querySelector(".sort__by-category-position");
    if (positionCat.classList.contains("active")) {
      positionUlCat.classList.toggle("active");
      positionCat.classList.toggle("active");
      positionBtn.classList.toggle("active");
    }
    let TagBtn = document.querySelector(".button-test-tag");
    let TagUlCat = document.querySelector(".sort__category-ul-tag");
    let TagCat = document.querySelector(".sort__by-category-tag");
    if (TagUlCat.classList.contains("active")) {
      TagUlCat.classList.toggle("active");
      TagCat.classList.toggle("active");
      TagBtn.classList.toggle("active");
    }
  });
});

$(document).ready(function() {
  $(".sort__by-category-tag").click(function(event) {
    $(
      ".sort__category-ul-tag, .sort__by-category-tag, .button-test-tag"
    ).toggleClass("active");
    let positionBtn = document.querySelector(".button-test-position");
    let positionUlCat = document.querySelector(".sort__category-ul-position");
    let positionCat = document.querySelector(".sort__by-category-position");
    if (positionCat.classList.contains("active")) {
      positionUlCat.classList.toggle("active");
      positionCat.classList.toggle("active");
      positionBtn.classList.toggle("active");
    }
    let levelBtn = document.querySelector(".button-test-level");
    let levelUlCat = document.querySelector(".sort__category-ul-level");
    let LevelCat = document.querySelector(".sort__by-category-level");
    if (levelUlCat.classList.contains("active")) {
      levelUlCat.classList.toggle("active");
      LevelCat.classList.toggle("active");
      levelBtn.classList.toggle("active");
    }
  });
});



// visible tags block
$(document).ready(function() {
  $(".sort__by-teg-req").click(function(event) {
    $(".sort__tags-block, .sort__by-teg-req").toggleClass("active");
  });
});

$(document).ready(function() {
  $(".select-dropdown").click(function(event) {
    $(" .zmdi-chevron-down").toggleClass("active");
  });
});

// clear search form in page tags
const clearSearch = document.getElementById("clearSearch");
let searchInput = document.getElementById("searchInput");

if (searchInput) {
  clearSearch.addEventListener("click", getClearSearch);
  function getClearSearch() {
    searchInput.value = "";
  }
}

// vacancies form accordion

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
      //var labelWrapper = document.getElementsByClassName('js-label-wrapper');
      for (var i = 0, len = selectDropdown.length; i < len; i++) {
        selectDropdown[i].classList.toggle("active");
        //var parentNode = $(selectDropdown[i]).closest('.js-label-wrapper');
        //parentNode[0].classList.toggle("active");
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


let  hellopreloader = document.getElementById("preloaderMain");
function fadeOutnojquery(el) {
  el.style.opacity = 1;
  let interhellopreloader = setInterval(function() {
    el.style.opacity = el.style.opacity - 0.05;
    if (el.style.opacity <= 0.05) {
      clearInterval(interhellopreloader);
      hellopreloader.style.display = "none";
    }
  }, 16);
}
window.onload = function() {

  setTimeout(function() {
    fadeOutnojquery(hellopreloader);
  }, 1000);
};

// Blog select
if(document.querySelector('#sort-category-blog-father')){
  blogSelect();
}

let inputForUrlVac = document.getElementById('inputForUrlVac')


if(document.querySelector('#selectedOptionsVac')){

const levelOption = document.querySelector("#levelOption");
const tagOption = document.querySelector("#tagOption");
const positionOption = document.querySelector("#positionOption");
const selectedOptionsVac = document.querySelector("#selectedOptionsVac");
positionOption.addEventListener("click", getOption)
tagOption.addEventListener("click", getOption)
levelOption.addEventListener("click", getOption)

function getOption(event){
  let target = event.target;
  if (target.checked) {
    let sortTag = document.createElement("p");
    let sortTagClose = document.createElement("span");
    sortTag.innerHTML = target.parentNode.textContent;
    inputForUrlVac.value += target.parentNode.textContent.replace(/\s/g,'')+',', '';
    selectedOptionsVac.appendChild(sortTag);
    sortTag.classList.add("sort__tags");
    sortTag.appendChild(sortTagClose);
    sortTagClose.classList.add("sort__tags-close");
    // hide btn CLEAR ALL
    hideBtnVac()
  } else if (target.checked == false) {
    for (let i = 0; i < selectedOptionsVac.childNodes.length; i++) {
      if (selectedOptionsVac.childNodes[i].textContent == target.parentNode.textContent) {
        selectedOptionsVac.childNodes[i].parentNode.removeChild(selectedOptionsVac.childNodes[i])
      }
    }
    hideBtnVac()
    inputForUrlVac.value = inputForUrlVac.value.replace(target.parentNode.textContent.replace(/\s/g,'')+',', '');
  
  }
  // console.log(inputForUrlVac.value);
}


const tagSortBtn = document.querySelector("#tagSortBtn");
tagSortBtn.addEventListener("click", () => getAllSelect('.sort__category-checkbox-tag') )
const levelSortBtn = document.querySelector("#levelSortBtn");
levelSortBtn.addEventListener("click", () => getAllSelect('.sort__category-checkbox-lev') )
const positionSortBtn = document.querySelector("#positionSortBtn");
positionSortBtn.addEventListener("click", () => getAllSelect('.sort__category-checkbox-pos') )

function getAllSelect(sortClasCat){
  const sortCategoryCheckbox = document.querySelectorAll(sortClasCat);
  for (let i = 0; i < sortCategoryCheckbox.length; i++) {
    sortCategoryCheckbox[i].checked = true
        inputForUrlVac.value += sortCategoryCheckbox[i].parentNode.textContent.replace(/\s/g,'')+',', ''
        // console.log(sortCategoryCheckbox[i].parentNode.textContent.replace(/\s/g,'')+',', '');
        // if(  inputForUrlVac.value = sortCategoryCheckbox[i].parentNode.textContent.replace(/\s/g,'')+',', ''){

        // }
    for (let j = 1; j < selectedOptionsVac.childNodes.length; j++) {
      if (selectedOptionsVac.childNodes[j].textContent == sortCategoryCheckbox[i].parentNode.textContent) {
        selectedOptionsVac.childNodes[j].parentNode.removeChild(selectedOptionsVac.childNodes[j])
      }
    }
    let sortTag = document.createElement("p");
    let sortTagClose = document.createElement("span");
    sortTag.innerHTML = sortCategoryCheckbox[i].parentNode.textContent;
    selectedOptionsVac.appendChild(sortTag);
    sortTag.classList.add("sort__tags");
    sortTag.appendChild(sortTagClose);
    sortTagClose.classList.add("sort__tags-close");
   
  }
  hideBtnVac()
}

selectedOptionsVac.addEventListener("click", function(event) {
  let target = event.target;
  if (target == selectedOptionsVac || target.classList.contains("sort__tags")) {
    return;
  }
  target.parentNode.parentNode.removeChild(target.parentNode);
  inputForUrlVac.value = inputForUrlVac.value.replace(target.parentNode.textContent.replace(/\s/g,'')+',', '');
  const sortCategory = document.querySelectorAll(".sort__category");
  for (let i = 0; i < sortCategory.length; i++) {
    if (
      sortCategory[i].textContent ==
      target.parentNode.textContent
    ) {
     sortCategory[i].childNodes[0].childNodes[1].checked = false
    }
  }
  hideBtnVac()
});

const sortTagClearVac = document.querySelector("#sortTagClearVac");
sortTagClearVac.addEventListener("click", function() {
  const selectedOptions = document.querySelector("#selectedOptionsVac");
 selectedOptions.textContent = ''
 const sortCategory = document.querySelectorAll(".sort__category");
    for (let i = 0; i < sortCategory.length; i++) {
      sortCategory[i].childNodes[0].childNodes[1].checked = false
    }
    inputForUrlVac.value = ''
    hideBtnVac()
});

hideBtnVac()
function hideBtnVac(){
const selectedOptionsVacancies = document.querySelector("#selectedOptionsVac");
if (selectedOptionsVacancies.textContent == ''){
  sortTagClearVac.style.display = 'none'  
} else {
  sortTagClearVac.style.display = 'block' 
}
}

}