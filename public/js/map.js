
var map;
var markers = [];
var marker;
var restaurants;
var multi_marker;
var searchMarker;

$(document).ready(function(){
  multi_marker = $('.multi_marker').text();
  initMap();
})
$(document).on('page:load',function(){
  multi_marker = $('.multi_marker').text();
  initMap();
})

function initMap() {
    var myLocation = null,
        restaurants = [],
        default_location = {lat: 20.9909745, lng: 105.8389606};
    
    var green_icon_marker = {
          url: '/img/green-pin-th.png',
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 45)
        };

    if (!multi_marker) {
      if ($('.lat').text() != '') {
        myLocation = { lat: Number($('.lat').text()), lng: Number($('.lng').text())};
      }

      map = new google.maps.Map(document.getElementById('map'), {
        center: myLocation || default_location,
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
        center: restaurants[0] || default_location,
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
        
        var infoWindow = new google.maps.InfoWindow({
          content: '<div>'+value.name+'</div>',
          maxwidth: 200
        })
        newMarker.addListener('click', function(){
          infoWindow.open(map, newMarker);
        })
      })

    }

    marker = new google.maps.Marker({
      position: myLocation,
      map: map,
      draggable: true
    });
    
    var order_lat = Number($('.order_lat').val()),
        order_lng = Number($('.order_lng').val());
    order_marker = new google.maps.Marker({
      position: {lat: order_lat, lng: order_lng},
      map: map,
      icon: green_icon_marker,
      draggable: true
    });
    
    // Create the search box and link it to the UI element.
    var input = document.getElementById('map-search');
    if (input) {
      var searchBox = new google.maps.places.SearchBox(input);

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
        marker.setMap(null);
        order_marker.setMap(null);
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }
          var icon = null;
          if(multi_marker){
            icon = green_icon_marker;
          }

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location,
            draggable: true
          }));

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        map.fitBounds(bounds);

        searchMarker = markers[0];
        setInputPosition(searchMarker.getPosition().lat(), searchMarker.getPosition().lng());
        
        dragend(searchMarker);
        
        distanceCalculate([searchMarker.getPosition()],restaurants,'DRIVING');
        
        displayDistance(searchMarker);
        
      });

    }
    
    dragend(marker);
    dragend(order_marker);
    displayDistance(order_marker);
    
    function displayDistance(marker){
      var origins = [marker.getPosition()];
      marker.addListener('dragend', function(event) {
        var lat = event.latLng.lat(),
            lng = event.latLng.lng();
        origins = [{ lat: lat,lng: lng }];
        setInputPosition(lat,lng);
        distanceCalculate(origins,restaurants,'DRIVING');
      });
      distanceCalculate(origins,restaurants,'DRIVING');
    }
    
    function dragend(marker){
      marker.addListener('dragend', function(event) {
        setInputPosition(event.latLng.lat(),event.latLng.lng())
      });
    }
    function distanceCalculate(origins,destinations,travelMode) {
      var distanceService = new google.maps.DistanceMatrixService;
      distanceService.getDistanceMatrix({
        origins: origins,
        destinations: destinations,
        travelMode: travelMode,
      }, function(response, status) {
        if (status == 'OK') {
          $.each(response.rows[0].elements, function(key,value){
            $('.restaurant_id.'+restaurants[key].id+' .distance')
              .html(value.distance.text + '<br>~ ' + value.duration.text);
          })
        }
      });
    }
    function setInputPosition(lat, lng){
        $('input.lat').val(lat);
        $('input.lng').val(lng);
    }
}