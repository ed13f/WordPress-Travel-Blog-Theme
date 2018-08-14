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
  array_push($modified_post_objects_list, $modified_post_objects);    
}
$wpQueryJson = json_encode($modified_post_objects_list);


?>

  <section class="map-section">
    <div class="hero-short-screen"></div>
    <div class="map-screen"></div> 
    <div id="map"></div>
  </section>  
    <script>
      var jsonMapArray = <?php echo $wpQueryJson; ?>;
      
      

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2.4,
          scrollwheel: false,
          navigationControl: false,
          mapTypeControl: false,
          scaleControl: false,
          draggable: false,
          disableDefaultUI: true,
          
          gestureHandling: 'cooperative',
          center: new google.maps.LatLng(16.128083,-72.651112),
          mapTypeId: 'terrain'

        });

       
          for (i = 0; i < jsonMapArray.length; i++) {
            var postID = jsonMapArray[i]['ID']
            var lat = jsonMapArray[i]['lat'];
            var long = jsonMapArray[i]['long'];
            var title = jsonMapArray[i]['title'];
            var url = jsonMapArray[i]['url'];
            var latLng = new google.maps.LatLng(lat, long);
            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: title,
              url: url,
            });
            var infoWindow = new google.maps.InfoWindow(), marker, i;
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent("<a href=" + this.url + ">" + this.title) + "</a>";
                    infoWindow.open(map, marker);
                }
            })(marker, i));
          }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQQrpSPcREAO1uIR8wVmEsqdg4Mv6Udxs&callback=initMap">

    </script>