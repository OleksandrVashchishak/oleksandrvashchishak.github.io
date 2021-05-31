<?php
get_header();
/*
 Template Name: Contacts
 */
?>

<div class="contacts-bg">
  <div class="map">
    <div id="map">
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuqtG8XhmKQPGoYpFi9dqZmhZTDWGCxE0&amp;callback=initMap">
      </script>
      <script>
        function initMap() {
          setTimeout(function() {
            var element = document.getElementById('map');

            var stylemap = [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                  "color": "#444444"
                }]
              },
              {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                  "color": "#f2f2f2"
                }]
              },
              {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{
                    "saturation": -100
                  },
                  {
                    "lightness": 45
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{
                  "visibility": "simplified"
                }]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                  "color": "#ffffff"
                }]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#dde6e8"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              }
            ]


            var options = {
              zoom: 13,
              styles: stylemap,
              disableDefaultUI: true,
              center: {
                lat: 60.00709621992757,
                lng: 23.539583887654967
              }

            };
            var myMap = new google.maps.Map(element, options);

            var markers = [{
              coordinates: {
                lat: 60.00709621992757,
                lng: 23.539583887654967
              },
              image: "<?php bloginfo('template_url'); ?>/img/icons/marker-map.png",
            }];

            function addMarker(properties) {
              var marker = new google.maps.Marker({
                position: properties.coordinates,
                map: myMap,
                icon: properties.image,
                animation: google.maps.Animation.BOUNCE,
              });


            }
            for (var i = 0; i < markers.length; i++) {
              addMarker(markers[i]);
            }

          }, 500)




        }
      </script>
    </div>
  </div>
<div class="container">
  <nav class="breadcrumbs breadcrumbs__contact">
    <a href="index.html" class="breadcrumbs__home">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
          <path d="M16.4816 8.27283V17.5905H12.9635V13.5607C12.9635 13.2074 12.6771 12.921 12.3239 12.921H7.82492C7.4716 12.921 7.18527 13.2074 7.18527 13.5607V17.5905H3.68848V8.27283H2.40918V18.2302C2.40918 18.5835 2.69555 18.8698 3.04883 18.8698H7.82496C8.17828 18.8698 8.46461 18.5835 8.46461 18.2302V14.2004H11.6842V18.2302C11.6842 18.5835 11.9706 18.8699 12.3239 18.8699H17.1213C17.4746 18.8699 17.761 18.5835 17.761 18.2302V8.27283H16.4816Z" fill="#222222" />
          <path d="M19.7975 9.9808L10.5224 1.30279C10.2782 1.074 9.89871 1.07252 9.65246 1.29873L0.206833 9.97677C-0.0532847 10.2158 -0.070355 10.6203 0.168668 10.8804C0.294684 11.0179 0.46695 11.0874 0.639879 11.0874C0.79445 11.0874 0.949684 11.0316 1.0725 10.9188L10.0814 2.64201L18.9234 10.9149C19.1819 11.1565 19.5861 11.1427 19.8275 10.8849C20.0687 10.6269 20.0554 10.2222 19.7975 9.9808Z" fill="#222222" />
        </g>
        <defs>
          <clipPath id="clip0">
            <rect width="20" height="20" fill="white" />
          </clipPath>
        </defs>
      </svg>
    </a>

    <span class="breadcrumbs__separator">
      <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="6" height="6" rx="2" fill="#222" />
      </svg>
    </span>
    <span class="breadcrumbs__this">
      <?php echo pll__('contacts_bread_page'); ?>
    </span>
  </nav>
  </div>
  <div class="container">
    <div class="contacts">
      <div class="contacts__left">
        <h3 class="contacts__left-title">
          <?php the_field('title-contacts'); ?>
        </h3>

        <div class="contacts__item-items-wrap">

          <?php
          if (have_rows('contact_items-contacts')) :
            while (have_rows('contact_items-contacts')) : the_row();
          ?>

              <div class="contacts__item-items">
                <h5 class="contacts__item-title">
                  <?php the_sub_field('title'); ?>
                </h5>

                <?php
                if (have_rows('items')) :
                  while (have_rows('items')) : the_row();
                ?>

                    <div class="contacts__item">
                      <span class="contacts__item-name"><?php the_sub_field('item_name'); ?></span>
                      <a href="<?php the_sub_field('image'); ?>" class="contacts__item-value"><?php the_sub_field('item_value'); ?></a>
                    </div>

                <?php
                  endwhile;
                else :
                endif;
                ?>

                <a href="<?php the_sub_field('email'); ?>" class="contacts__item-mail"> <?php the_sub_field('email'); ?></a>
              </div>

          <?php
            endwhile;
          else :
          endif;
          ?>

        </div>
      </div>
      <div class="contacts__right">
        <h3 class="contacts__right-title"><?php the_field('right-title-contacts'); ?></h3>
        <p class="contacts__right-text"><?php the_field('text-under-right-title-contacts'); ?></p>
        <?php
         if (ICL_LANGUAGE_CODE == 'fin') {
          echo do_shortcode('[contact-form-7 id="202" title="Contact form main"]');
        } elseif (ICL_LANGUAGE_CODE == 'swe') {
          echo do_shortcode('[contact-form-7 id="477" title="Contact form main se"]');
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>