<?php get_header();
/*
 Template Name: contact us
 */
?>

<main class="main">
  <?php echo do_shortcode('[contact-form-7 id="179" title="Contact us form"]'); ?>
</main>

<?php get_footer(); ?>

<span class="img-url-marker" style="display: none;"><?php bloginfo('template_url'); ?>/img/marker.png</span>
<!-- https://maps.googleapis.com/maps/api/js?key=AIzaSyApj8qSzyO4DqXeQtFQPKI4mi6p-MBwlpo&callback=initMap&libraries=&v=weekly -->
<script src="<?php the_field('contact-page__url-gogle-map'); ?>" async>
</script>

<script>
  // Initialize and add the map
  function initMap() {
    var stylemap = [{
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [{
            "saturation": 36
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 40
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [{
            "visibility": "on"
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 17
          },
          {
            "weight": 1.2
          }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 21
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 29
          },
          {
            "weight": 0.2
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 18
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 19
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [{
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      }
    ];
    const myLatLng = {
      lat: 53.4295063,
      lng: -7.8909729
    };
    const centerloc = {
      lat: 53.4301063,
      lng: -7.8909729
    };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 16,
      center: centerloc,
      styles: stylemap,
      disableDefaultUI: true,

    });
    const image = document.querySelector('.img-url-marker').textContent
    new google.maps.Marker({
      position: myLatLng,
      map,
      icon: image,
    });


    // var options = {
    //     zoom: 16,
    //     center: {
    //         lat: 53.4305345,
    //         lng: -7.8954844
    //     },
    //     styles: stylemap,

    // }
    // new google.maps.Marker({
    //     position: myLatLng,
    //     map,
    // });




    // var map = new google.maps.Map(document.getElementById('map'), options);

  }
</script>






<!-- AIzaSyApj8qSzyO4DqXeQtFQPKI4mi6p-MBwlpo -->