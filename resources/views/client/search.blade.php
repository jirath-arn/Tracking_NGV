@extends('layouts.client')

@section('content')
<div class="container"> <!-- class="container text-center" -->
    <div class="row">
        <!-- item left -->
        <div class="col col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <form action="{{ url('/search') }}" method="GET">
                            <!-- logo Thammasat
                            <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Emblem_of_Thammasat_University.svg/1200px-Emblem_of_Thammasat_University.svg.png" alt="" width="100" height="100"><br><br>
                            -->
                            <?php
                                if(isset($_GET['currentPosition'])) {
                                    $selectedCurrent = $_GET['currentPosition'];
                                } else {
                                    $selectedCurrent = "";
                                }

                                if(isset($_GET['destination'])) {
                                    $selectedDestination = $_GET['destination'];
                                } else {
                                    $selectedDestination = "";
                                } 
                            ?>
                           
                            <label for="currentPosition">Current position :</label>
                            <select id="currentPosition" name="currentPosition" class="form-control" required autofocus>
                                <option value="" disabled selected hidden>Please Choose...</option>
                                @foreach ($stations as $item)
                                    <option value="{{$item->name_station}}" <?php if($selectedCurrent == "$item->name_station") { echo("selected"); }?>>{{ $item->name_station }}</option>
                                @endforeach
                            </select><br>
                            
                            <label for="destination">Destination :</label>
                            <select id="destination" name="destination" class="form-control" required>
                                <option value="" disabled selected hidden>Please Choose...</option>
                                @foreach ($stations as $item)
                                    <option value="{{$item->name_station}}" <?php if($selectedDestination == "$item->name_station") { echo("selected"); }?>>{{ $item->name_station }}</option>
                                @endforeach
                            </select><br>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h4 class="h4 mb-3 font-weight-normal">List of bus</h4><br>

                        <div class="text-center">
                            No data
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- item right -->
        <div class="col col-lg-8">
            <div class="jumbotron">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Map of Thammasat</div>
                    
                    <div class="panel-body">
                        <div id="map" style="height: 450px;">
                        
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2A49QewskHrrRb0FnHIVLTRYMcEHQHT4&callback=initMap&libraries=&v=weekly" defer></script>
<script>
    var map;

    var position = {
        lat: 14.06951825716126, 
        lng: 100.60329490762967
    }
   
    // var locations = [
    //     ["คณะวิศวกรรมศาสตร์", 14.067428, 100.605844],
    //     ["คณะวารสาร(JC)", 14.067506, 100.604850],
    //     ["อาคารเรียนรวม SC", 14.069552, 100.601710]
    // ]; 
    
   
    
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: position,
            zoom: 15,
            // mapTyped: google.maps.MapTypeId.TERRAIN
        });

        // get data from SearchController.php and append to json data
        var all_stations = JSON.parse('<?php echo json_encode($stations) ?>');
    
        // console.log(all_stations);
        

        var json_locations_NGV = JSON.parse('<?php echo json_encode($buses) ?>');
        // console.log(json_locations_NGV);
        

        var marker, i, info;
        // console.log(json_locations_NGV.data[0]);
        for (i = 0; i < json_locations_NGV.data.length; i++) {
            
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(json_locations_NGV.data[i].latitude, json_locations_NGV.data[i].longitude),
                map: map,
                icon: "http://maps.google.com/mapfiles/kml/pal2/icon47.png"
            });
            info = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    info.setContent(json_locations_NGV.data[i].license_plate);
                    info.open(map, marker);
                }
            })(marker, i));
        }

        var selectedCurrent = '<?php echo $selectedCurrent ?>';
        var selectedDestination = '<?php echo $selectedDestination ?>';
        var marker , info;
        $.each(all_stations.data,function(i,item){
            // console.log(item.name_station);
            if( item.name_station === selectedCurrent ){
                marker = new google.maps.Marker({
                     position: new google.maps.LatLng(item.latitude,item.longitude),
                     map:map,
                     
                });
                
            }else if( item.name_station === selectedDestination){
                marker = new google.maps.Marker({
                     position: new google.maps.LatLng(item.latitude,item.longitude),
                     map:map,
                     icon:"http://maps.google.com/mapfiles/kml/pal2/icon10.png"
                     
                });
                
            }else{
                 marker = new google.maps.Marker({
                     position: new google.maps.LatLng(item.latitude,item.longitude),
                     map:map,
                     icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
                     
                });

            }
            info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        info.setContent(item.name_station);
                        info.open(map, marker);
                    }
                })(marker, i));
        });
    }
   
    // var db_stations = stations ;
    // console.log(db_stations);
</script>
@endsection
