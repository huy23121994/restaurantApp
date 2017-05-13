<!DOCTYPE html>
<html>
  <head>
    <title>Distance Matrix service</title>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        width: 50%;
      }
      #right-panel {
        float: right;
        width: 48%;
        padding-left: 2%;
      }
      #output {
        font-size: 11px;
      }
    </style>
  </head>
  <body>
    <div id="right-panel">
      <div id="inputs">
        <pre>
var origin1 = {lat: 55.930, lng: -3.118};
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = {lat: 50.087, lng: 14.421};
        </pre>
      </div>
      <div>
        <strong>Results</strong>
      </div>
      <div id="output"></div>
    </div>
    <div id="map"></div>
    <script>
    var x;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 20.9909745, lng: 105.8389606},
          zoom: 13
        });
        var marker = new google.maps.Marker({
          position: {lat: 20.9909745, lng: 105.8389606},
          map: map,
          draggable: true
        });

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [{lat: 20.9909745, lng: 105.8389606}, {lat: 21.033063, lng: 105.7991459}],
          destinations: [{lat:21.0088909,lng:105.8287417}, {lat: 20.98778,lng: 105.798343}],
          travelMode: 'DRIVING',
        }, function(response, status) {
          x = response;
          if (status == 'OK') {
            $.each(response.rows, function(data,value){
              console.log(value);
            })
          }
        });
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn0oLar3kzwByYvpk-6dodmO9dzg4ar_4&callback=initMap">
    </script>
  </body>
</html>