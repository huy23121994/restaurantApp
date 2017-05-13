
var map;
var markers = [];
var marker;
var restaurants;
var multi_marker;

$(document).ready(function(){
  multi_marker = $('.multi_marker').text();
  initMap();
})
$(document).on('page:load',function(){
  multi_marker = $('.multi_marker').text();
  initMap();
})

function initMap() {
    var myLocation = null;
    var restaurants = [];

    if (!multi_marker) {
      if ($('.lat').text() != '') {
        myLocation = { lat: Number($('.lat').text()), lng: Number($('.lng').text())};
      }

      map = new google.maps.Map(document.getElementById('map'), {
        center: myLocation || {lat: 20.9909745, lng: 105.8389606},
        zoom: 16,
        mapTypeId: 'roadmap',
        zoomControl: false,
        streetViewControl: false
      });
    }else{
      $('.restaurant_id').each(function(){
        data = {
          id: $(this).attr('id'),
          name: $(this).find('.name').text(),
          lat: Number($(this).find('.res_lat').text()),
          lng: Number($(this).find('.res_lng').text()),
        };
        restaurants.push(data);
      })

      map = new google.maps.Map(document.getElementById('map'), {
        center: restaurants[0],
        zoom: 12,
        mapTypeId: 'roadmap',
        zoomControl: false,
        streetViewControl: false
      });
      var myMarkers = [];
      $.each(restaurants, function(key,value){
        var newMarker = new google.maps.Marker({
          position: value,
          map: map
        });
       console.log(value.name);
        var infoWindow = new google.maps.InfoWindow({
          content: '<div>'+value.name+'</div>',
          maxwidth: 200
        })
        newMarker.addListener('click', function(){
          infoWindow.open(map, newMarker);
        })
      })

      // myMarkers.forEach(function(marker) {
      //   marker.addListener('click', function(){
      //     infoWindow.open(map, marker);
      //   })
      // });
    }

    marker = new google.maps.Marker({
      position: myLocation,
      map: map,
      draggable: true
    });
    
    // Create the search box and link it to the UI element.
    var input = document.getElementById('map-search');
    if (input) {
      var searchBox = new google.maps.places.SearchBox(input);
      // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      // Bias the SearchBox results towards current map's viewport.
      map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
      });

      markers = [];
      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
          marker.setMap(null);
        });
        // marker.setMap(null);
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }
          var icon = {
            url: 'http://www.clker.com/cliparts/q/y/S/n/A/V/green-pin-th.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 45)
          };

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location,
          }));

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        map.fitBounds(bounds);

        marker = markers[0];
        $('input.lat').val(markers[0].getPosition().lat());
        $('input.lng').val(markers[0].getPosition().lng());
        dragend();

        var distanceService = new google.maps.DistanceMatrixService;
        distanceService.getDistanceMatrix({
          origins: [marker.getPosition()],
          destinations: restaurants,
          travelMode: 'DRIVING',
        }, function(response, status) {
          console.log(response);
          if (status == 'OK') {
            $.each(response.rows[0].elements, function(data,value){
              $('.restaurant_id.'+restaurants[data].id+' .distance').html(value.distance.text)
            })
          }
        });
      });

      dragend();
      function dragend(){
        marker.addListener('dragend', function(event) {
          $('input.lat').val(event.latLng.lat());
          $('input.lng').val(event.latLng.lng());
        });
      }
    }
}