@extends('layouts.master')
@section('title','Map Dashboard')
@section('content')
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 800px;
        width:1500px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  	<div class="container">
    <div id="map"></div>
</div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      var initZoomAmt = 18;
      var myPos;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 28.3949, lng: 84.1240},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.watchPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            myPos = pos;

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
            map.setZoom(initZoomAmt);
            startBusDraw();
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          }, {
            enableHighAccuracy: true,  
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function startBusDraw() {
        var imgSize = 30;
        var image = {
          url: "images/Dragon.ico",
          scaledSize: new google.maps.Size(imgSize, imgSize),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(imgSize/2, imgSize/2)
        };
        var busMarker = new google.maps.Marker({
          position: myPos,
          map: map,
          icon: image
        });
        var updateTime = 1000;

        function moveBus() {
          var busPosRequest = new XMLHttpRequest();
          busPosRequest.onreadystatechange = function() {
            if (busPosRequest.readyState === XMLHttpRequest.DONE) {
                var response = JSON.parse(busPosRequest.responseText)[0]
                busMarker.setPosition({
                  lat: +response.lat,
                  lng: +response.lon
                });
                setTimeout(moveBus, updateTime);
            }
          }
          busPosRequest.open("GET", "poll.php", true);
          busPosRequest.send(null);
        }

        setTimeout(moveBus, updateTime);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLFv4JVBlC3pXdvO7TBUBVWgrEq4bb_y0&callback=initMap">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
@endsection