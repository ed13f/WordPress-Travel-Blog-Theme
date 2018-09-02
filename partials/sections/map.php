<?php

$args=array(
  'posts_per_page' => -1, 
  'post_type'      => 'destination',
);

$wp_query = new WP_Query( $args );
wp_reset_query();

$posts = $wp_query->posts;

$modified_post_objects = array();
$modified_post_objects_list = array();
foreach ($posts as $post) {
  $modified_post_objects['ID'] = $post->ID;
  $modified_post_objects['date'] = $post->post_date;
  $modified_post_objects['title'] = $post->post_title;
  $modified_post_objects['lat'] = get_field('latitude', $post->ID);
  $modified_post_objects['long'] = get_field('longitude', $post->ID);
  $modified_post_objects['url'] = get_permalink($post->ID);
  $modified_post_objects['img_url'] = get_the_post_thumbnail_url($post->ID);
  array_push($modified_post_objects_list, $modified_post_objects);    
}
$wpQueryJson = json_encode($modified_post_objects_list);


?>

  <section class="map-section">
    <div class="hero-content-screen">
      <?php partial('widgets.hero-content'); ?>

    </div>
    <div class="hero-short-screen"></div>
    <div class="map-screen"></div> 
    <div id="map"></div>
  </section>  
    <script>
      var jsonMapArray = <?php echo $wpQueryJson; ?>;
      google.maps.event.trigger(map, 'resize');



      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          // zoom: 2.4,
          zoom: 3,
          scrollwheel: false,
          navigationControl: true,
          mapTypeControl: false,
          // scaleControl: false,
          // draggable: false,
          disableDefaultUI: false,
          maxZoom:5,
          minZoom:2.5,
          
          gestureHandling: 'cooperative',
          center: new google.maps.LatLng(35.2271,-80.8431),
          mapTypeId: 'terrain',
          styles: [
                    {
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#ebe3cd"
                        }
                      ]
                    },
                    {
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#523735"
                        }
                      ]
                    },
                    {
                      "elementType": "labels.text.stroke",
                      "stylers": [
                        {
                          "color": "#f5f1e6"
                        }
                      ]
                    },
                    {
                      "featureType": "administrative",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "administrative",
                      "elementType": "geometry.stroke",
                      "stylers": [
                        {
                          "color": "#c9b2a6"
                        }
                      ]
                    },
                    {
                      "featureType": "administrative.land_parcel",
                      "elementType": "geometry.stroke",
                      "stylers": [
                        {
                          "color": "#dcd2be"
                        }
                      ]
                    },
                    {
                      "featureType": "administrative.land_parcel",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#ae9e90"
                        }
                      ]
                    },
                    {
                      "featureType": "administrative.neighborhood",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "landscape.natural",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#dfd2ae"
                        }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#dfd2ae"
                        }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "labels.text",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#93817c"
                        }
                      ]
                    },
                    {
                      "featureType": "poi.park",
                      "elementType": "geometry.fill",
                      "stylers": [
                        {
                          "color": "#a5b076"
                        }
                      ]
                    },
                    {
                      "featureType": "poi.park",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#447530"
                        }
                      ]
                    },
                    {
                      "featureType": "road",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#f5f1e6"
                        }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "labels",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "labels.icon",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "road.arterial",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#fdfcf8"
                        }
                      ]
                    },
                    {
                      "featureType": "road.highway",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#f8c967"
                        }
                      ]
                    },
                    {
                      "featureType": "road.highway",
                      "elementType": "geometry.stroke",
                      "stylers": [
                        {
                          "color": "#e9bc62"
                        }
                      ]
                    },
                    {
                      "featureType": "road.highway.controlled_access",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#e98d58"
                        }
                      ]
                    },
                    {
                      "featureType": "road.highway.controlled_access",
                      "elementType": "geometry.stroke",
                      "stylers": [
                        {
                          "color": "#db8555"
                        }
                      ]
                    },
                    {
                      "featureType": "road.local",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#806b63"
                        }
                      ]
                    },
                    {
                      "featureType": "transit",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "transit.line",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#dfd2ae"
                        }
                      ]
                    },
                    {
                      "featureType": "transit.line",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#8f7d77"
                        }
                      ]
                    },
                    {
                      "featureType": "transit.line",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                        {
                          "color": "#ebe3cd"
                        }
                      ]
                    },
                    {
                      "featureType": "transit.station",
                      "elementType": "geometry",
                      "stylers": [
                        {
                          "color": "#dfd2ae"
                        }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "geometry.fill",
                      "stylers": [
                        {
                          "color": "#b9d3c2"
                        }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "labels.text",
                      "stylers": [
                        {
                          "visibility": "off"
                        }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "labels.text.fill",
                      "stylers": [
                        {
                          "color": "#92998d"
                        }
                      ]
                    }
                  ]

                          });

       
          for (i = 0; i < jsonMapArray.length; i++) {

            var postID = jsonMapArray[i]['ID'];
            
            var lat = jsonMapArray[i]['lat'];
            var long = jsonMapArray[i]['long'];
            var title = jsonMapArray[i]['title'];
            var imgUrl = jsonMapArray[i]['img_url'];
            var url = jsonMapArray[i]['url'];
                              
            var icon = {
                url: 'http://ricodesantis.com/images/travel_blog/Red_Pin_Emoji.png',

                scaledSize: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(15, 27),
            };
            var latLng = new google.maps.LatLng(lat, long);
            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: title,
              icon: icon,
              imgUrl: imgUrl,
              scaledSize: new google.maps.Size(5, 1), // scaled size
              url: url,
            });
            var infoWindow = new google.maps.InfoWindow(), marker, i;
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {

                    infoWindow.setContent( 
                      "<a class='info-window-link' href=" + this.url + ">" + 
                        "<div class='info-box-wrapper'>" + 
                          "<div class='info-box-screen'></div>" +
                        '<div class="info-box-container" style="background-image:url(' + this.imgUrl + ');">' + 
                          "<h3>" + this.title + "</h3>" +
                         '</div>' + 
                        '</div>' +
                      "</a>"



                     );
                    $('.gm-style-iw').prev('div').remove();

                    infoWindow.open(map, marker);
                }
            })(marker, i));

          }

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQQrpSPcREAO1uIR8wVmEsqdg4Mv6Udxs&callback=initMap">

    </script>