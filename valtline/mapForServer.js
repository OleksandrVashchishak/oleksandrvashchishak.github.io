function initMap() {
  var element = document.getElementById("map");
  var image = "img/valtline/marker.svg";
  var pos = { lat: 46.468986, lng: 10.36512 };
  var opt = {
    center: pos,
    zoom: 15,
    styles: [
      {
        featureType: "administrative",
        elementType: "labels.text.fill",
        stylers: [{ color: "#444444" }],
      },
      {
        featureType: "landscape",
        elementType: "all",
        stylers: [{ color: "#f2f2f2" }],
      },
      {
        featureType: "poi",
        elementType: "all",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "road",
        elementType: "all",
        stylers: [{ saturation: -100 }, { lightness: 45 }],
      },
      {
        featureType: "road.highway",
        elementType: "all",
        stylers: [{ visibility: "simplified" }],
      },
      {
        featureType: "road.arterial",
        elementType: "labels.icon",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "transit",
        elementType: "all",
        stylers: [{ visibility: "off" }],
      },
      {
        featureType: "water",
        elementType: "all",
        stylers: [{ color: "#46bcec" }, { visibility: "on" }],
      },
    ],
  };
  var myMap = new google.maps.Map(element, opt);
let hotelsAtrr = []
let imgLinkJS = document.querySelectorAll('.imgLinkJS')
let linkJS = document.querySelectorAll('.linkJS')
let hotelsStars = document.querySelectorAll('.hotels-list__stars')
let hotelsListTitle = document.querySelectorAll('.hotels-list__title')
let hotelsListCat = document.querySelectorAll('.hotels-list__cat')
let newArrHotels = []

for(let i = 0; i< imgLinkJS.length; i++){
hotelsAtrr.push(new Array([imgLinkJS[i].textContent, hotelsListTitle[i].textContent, linkJS[i].href, hotelsListCat[i].textContent] ))
  var contentString  =
    '<div class="map__item">' +
    '<a href="'+
    hotelsAtrr[i][0][2]+
    '" >' +
    '<img src="' +
    hotelsAtrr[i][0][0] +
    '" class="map__img" alt="hotel">' +
    "</a>" +
    '<div class="map__content">' +
    '<div class="space-between space-between-map">' +
    '<div class="map__cat">' +
    hotelsAtrr[i][0][3]+
    "</div>" +
    '<div class="d-flex hotels-list__stars hotels-list__starsJS">' +
    hotelsStars[i].innerHTML +
    "</div>" +
    "</div>" +
    '<h5 class="map__title map__titleJS">' +
    '<a href="'+
    hotelsAtrr[i][0][2]+
    '" >' +
    hotelsAtrr[i][0][1] +
    "</a>" +
    "</h5>" +
    '<p class="map__text">' +
    '<span class="map__text--span">' +
  
    "</span>" +
    "</p>" +
    "</div>";
    newArrHotels.push(contentString);
  }


  let hotelLocatiaClass = document.querySelectorAll('.hotelLocatiaClass')
  let locations = {}
  for(let i = 0; i< hotelLocatiaClass.length; i++){
    if(hotelLocatiaClass[i].textContent == ''){
      hotelLocatiaClass[i].textContent =  '{lat: 46.466848, lng: 10.383371}'
    } 
    let replaceLocatia1 = hotelLocatiaClass[i].textContent.replace(/lat/, '"lat"'); 
     let replaceLocatia2 = replaceLocatia1.replace(/lng/, '"lng"'); 
    locations["location"+i] = JSON.parse(replaceLocatia2)
    // console.log(locations);
    console.log(locations["location"+i]);
  }
  
  let i = 0;
  for (x in locations) {
   var newHotels = newArrHotels[i]
    var latlng = locations[x];
    addMarker(latlng, newHotels);
    i++
  }
  var activeInfoWindow; 
  function addMarker(latlng, newHotels) {
    var marker = new google.maps.Marker({
      map: myMap,
      position: latlng,
      icon: image,
    });

    var InfoWindow = new google.maps.InfoWindow({
      content: newHotels,
    });
  
    marker.addListener('click', function () {
      if (activeInfoWindow) { activeInfoWindow.close();}
      InfoWindow.open(map, marker);
      activeInfoWindow = InfoWindow;
  });

    google.maps.event.addListener(myMap, 'click', getCloseMap) 
    function getCloseMap(){
      InfoWindow.close();
    };

  }

}
