<!DOCTYPE html>
<html lang="en">
<head>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2A49QewskHrrRb0FnHIVLTRYMcEHQHT4&callback=initMap&libraries=&v=weekly"
        defer>
    </script>
    <style type="text/css">
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
    <script>
    var map;

    var position = {
        lat: 14.069477,
        lng: 100.603453
    }
    var locations = [
        ["คณะวิศวกรรมศาสตร์", 14.067428, 100.605844],
        ["คณะวารสาร(JC)", 14.067506, 100.604850],
        ["อาคารเรียนรวม SC", 14.069552, 100.601710]
    ];

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: position,
            zoom: 18,
            // mapTyped: google.maps.MapTypeId.TERRAIN
        });
        var marker, i, info;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                // icon: "images/pin.png"
            });
            info = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    info.setContent(locations[i][0]);
                    info.open(map, marker);
                }
            })(marker, i));
        }

    }
    </script>
</head>

<body>
    {{-- @section('maps') --}}
     <div id="map"></div>
    {{-- @endsection --}}
   

</body>

</html>
