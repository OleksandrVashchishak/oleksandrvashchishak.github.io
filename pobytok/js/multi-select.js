'use strict';
(function () {
  let tabletRegionInput = document.querySelectorAll('.regions-tablet-input');
  let tabletCityInputWrap = document.querySelectorAll('.cities-tablet-input-wrap');
  let dolnoslanskCities = document.querySelectorAll('.js-dolnoslansk');
  let kujPomCities = document.querySelectorAll('.js-kuj-pom');
  let lubelskCities = document.querySelectorAll('.js-lubelsk');
  let lubuskCities = document.querySelectorAll('.js-lubusk');
  let lodzCities = document.querySelectorAll('.js-lodz');
  let malopolskCities = document.querySelectorAll('.js-malopolsk');
  let mazowieckCities = document.querySelectorAll('.js-mazowieck');
  let opolskCities = document.querySelectorAll('.js-opolsk');
  let podkarpacCities = document.querySelectorAll('.js-podkarpac');
  let podlaskCities = document.querySelectorAll('.js-podlask');
  let pomorCities = document.querySelectorAll('.js-pomor');
  let slaskCities = document.querySelectorAll('.js-slask');
  let swietokrzCities = document.querySelectorAll('.js-swietokrz');
  let warminoMazurCities = document.querySelectorAll('.js-warmino-mazur');
  let wielkopolCities = document.querySelectorAll('.js-wielkopol');
  let zachodpomorCities = document.querySelectorAll('.js-zachodpomor');

  let regionsItems = document.querySelectorAll('.filter__wojewodstwo-tablet');
  let tabletCityInput = document.querySelector('.filter__city-input');

  let regionsItems2 = document.querySelectorAll('.filter__wojewodstwo-tablet2');
  let tabletCityInput2 = document.querySelector('.filter__city-input2');
  
  let regionsItems3 = document.querySelectorAll('.filter__wojewodstwo-tablet3');
  let tabletCityInput3 = document.querySelector('.filter__city-input3');

  let regionsItems4 = document.querySelectorAll('.filter__wojewodstwo-tablet4');
  let tabletCityInput4 = document.querySelector('.filter__city-input4');

  let regionsItems5 = document.querySelectorAll('.filter__wojewodstwo-tablet5');
  let tabletCityInput5 = document.querySelector('.filter__city-input5');
  
  
   
for(let i = 0 ; i < 5; i++){
  regionsItems.forEach(el => el.addEventListener('click', function () {
    tabletCityInput.value = '';
  }));
  regionsItems2.forEach(el => el.addEventListener('click', function () {
    tabletCityInput2.value = '';
  }));
  regionsItems3.forEach(el => el.addEventListener('click', function () {
    tabletCityInput3.value = '';
  }));
  regionsItems4.forEach(el => el.addEventListener('click', function () {
    tabletCityInput4.value = '';
  }));
  regionsItems5.forEach(el => el.addEventListener('click', function () {
    tabletCityInput5.value = '';
  }));

  let cityWraps = [dolnoslanskCities[i], kujPomCities[i], lubelskCities[i], lubuskCities[i], lodzCities[i], malopolskCities[i],
    mazowieckCities[i], opolskCities[i], podkarpacCities[i], podlaskCities[i], pomorCities[i], slaskCities[i], swietokrzCities[i],
    warminoMazurCities[i], wielkopolCities[i], zachodpomorCities[i]];

  function getSelectBody(cityWrap, wraps) {
    wraps.forEach( function(el) {
      el.classList.add('hidden');
      el.classList.remove('select-body');
    });
    cityWrap.classList.remove('hidden');
    cityWrap.classList.add('select__body');
  }

  tabletCityInputWrap[i].addEventListener('click', function () {
    if (tabletRegionInput[i].value === 'Dolnośląskie') {
      getSelectBody(dolnoslanskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Kujawsko-pomorskie') {
      getSelectBody(kujPomCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Lubelskie') {
      getSelectBody(lubelskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Lubuskie') {
      getSelectBody(lubuskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Łódzkie') {
      getSelectBody(lodzCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Małopolskie') {
      getSelectBody(malopolskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Mazowieckie') {
      getSelectBody(mazowieckCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Opolskie') {
      getSelectBody(opolskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Podkarpackie') {
      getSelectBody(podkarpacCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Podlaskie') {
      getSelectBody(podlaskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Pomorskie') {
      getSelectBody(pomorCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Śląskie') {
      getSelectBody(slaskCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Swiętokrzyskie') {
      getSelectBody(swietokrzCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Warmińsko-mazurskie') {
      getSelectBody(warminoMazurCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Wielkopolskie') {
      getSelectBody(wielkopolCities[i], cityWraps);
    } else if (tabletRegionInput[i].value === 'Zachodniopomorskie') {
      getSelectBody(zachodpomorCities[i], cityWraps);
    }
  });
}
})();

if (document.querySelector(".personal__select-ul-multi")) {

  let filterWojewodstwoI = document.querySelectorAll(".filter__wojewodstwo-tablet");
  let filterWojewodstwoI2 = document.querySelectorAll(".filter__wojewodstwo-tablet2");
  let filterWojewodstwoI3 = document.querySelectorAll(".filter__wojewodstwo-tablet3");
  let filterWojewodstwoI4 = document.querySelectorAll(".filter__wojewodstwo-tablet4");
  let filterWojewodstwoI5 = document.querySelectorAll(".filter__wojewodstwo-tablet5");
  let filterCityI = document.querySelectorAll(".filter__city-input-wrap");

  for(let j = 0 ; j < 5; j++){
  filterCityI[j].style.display = "none";
  }

  for (let i = 0; i < filterWojewodstwoI.length; i++) {
    filterWojewodstwoI[i].addEventListener("click", getCityBlock);
    function getCityBlock() {
      filterCityI[0].style.display = "block";
      if (this.innerHTML == "Cała Polska") {
        filterCityI[0].style.display = "none";
      }
    }
  }

  for (let i = 0; i < filterWojewodstwoI2.length; i++) {
    filterWojewodstwoI2[i].addEventListener("click", getCityBlock2);
    function getCityBlock2() {
      filterCityI[1].style.display = "block";
      if (this.innerHTML == "Cała Polska") {
        filterCityI[1].style.display = "none";
      }
    }
  }

  for (let i = 0; i < filterWojewodstwoI3.length; i++) {
    filterWojewodstwoI3[i].addEventListener("click", getCityBlock3);
    function getCityBlock3() {
      filterCityI[2].style.display = "block";
      if (this.innerHTML == "Cała Polska") {
        filterCityI[2].style.display = "none";
      }
    }
  }

  for (let i = 0; i < filterWojewodstwoI4.length; i++) {
    filterWojewodstwoI4[i].addEventListener("click", getCityBlock4);
    function getCityBlock4() {
      filterCityI[3].style.display = "block";
      if (this.innerHTML == "Cała Polska") {
        filterCityI[3].style.display = "none";
      }
    }
  }

   for (let i = 0; i < filterWojewodstwoI5.length; i++) {
    filterWojewodstwoI5[i].addEventListener("click", getCityBlock5);
    function getCityBlock5() {
      filterCityI[4].style.display = "block";
      if (this.innerHTML == "Cała Polska") {
        filterCityI[4].style.display = "none";
      }
    }
  }

  let filterRegionsI = document.querySelectorAll(".filter__all-regions-tablet-wrap");
  let selectIconI = document.querySelectorAll(".select__icon");

  for(let i = 0 ; i < filterRegionsI.length; i++){

  document.addEventListener("click", function (event) {
    let target = event.target;
    if (
      target.classList.contains("regions-tablet-input") ||
      target.classList.contains("select__icon")
    ) {
      return;
    }
    filterRegionsI[i].classList.remove("is-active");
    selectIconI[0].classList.remove("arrow-up");
    selectIconI[2].classList.remove("arrow-up");
    selectIconI[4].classList.remove("arrow-up");
    selectIconI[6].classList.remove("arrow-up");
    selectIconI[8].classList.remove("arrow-up");
  });
}

for(let i = 0 ; i < filterRegionsI.length; i++){
  let selectfilterSityI = document.querySelectorAll(".filter__city-input-wrap");
  document.addEventListener("click", function (event) {
    let target = event.target;
    if (
      target.classList.contains("filter__city-input") ||
      target.classList.contains("filter__city-input2") ||
      target.classList.contains("filter__city-input3") ||
      target.classList.contains("filter__city-input4") ||
      target.classList.contains("filter__city-input5") ||
      target.classList.contains("select__icon")
    ) {
      return;
    }
    selectfilterSityI[i].classList.remove("is-active");
    selectIconI[1].classList.remove("arrow-up");
    selectIconI[3].classList.remove("arrow-up");
    selectIconI[5].classList.remove("arrow-up");
    selectIconI[7].classList.remove("arrow-up");
    selectIconI[9].classList.remove("arrow-up");
  });
}
}



