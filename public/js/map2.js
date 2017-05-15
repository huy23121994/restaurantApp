
$(document).ready(function(){
  initMap();
})
$(document).on('page:load',function(){
  initMap();
})

function initMap() {
    var green_icon_marker = {
          url: '/img/green-pin-th.png',
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 45)
        };
    var default_locationc = {lat: 20.9909745, lng: 105.8389606};
    
    var checkPosition = function(){
        if($('.havePosition').text(){
            return true;
        }
        return false;
    }
    if (checkPosition) {
        // have position
        var restaurants = [];
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
        
    }else{
        // no position
        map = new google.maps.Map(document.getElementById('map'), {
        center: default_location,
        zoom: 12,
        mapTypeId: 'roadmap',
        zoomControl: false,
        streetViewControl: false
        });
    }
}