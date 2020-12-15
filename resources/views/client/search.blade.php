@extends('layouts.client')

@section('content')
<div class="container  "> <!-- class="container text-center" -->
    <div class="row ">
        <!-- item left -->
        <div class="col col-lg-4 ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="jumbotron ">
                        <form action="{{ url('/search') }}" method="GET">
                            {{-- logo Thammasat --}}
                            {{-- <img class="mb-4 center " src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Emblem_of_Thammasat_University.svg/1200px-Emblem_of_Thammasat_University.svg.png" alt="" width="100" height="100" ><br><br> --}}
                            
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
                            <select id="currentPosition" name="currentPosition" class="form-control " required autofocus >
                                <option  value="" disabled selected hidden>Please Choose...</option>
                                @foreach ($stations as $item)
                                    <option value="{{$item->name_station}}" <?php if($selectedCurrent == "$item->name_station") { echo("selected"); }?>>{{ $item->name_station }}</option>
                                @endforeach
                            </select><br>
                            
                            <label for="destination">Destination :</label>
                            <select id="destination" name="destination" class="form-control" required>
                                <option  value="" disabled selected hidden>Please Choose...</option>
                                @foreach ($stations as $item)
                                    <option value="{{$item->name_station}}" <?php if($selectedDestination == "$item->name_station") { echo("selected"); }?>>{{ $item->name_station }}</option>
                                @endforeach
                            </select><br>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12  " >
                    <div class="jumbotron ">
                        <h4 class="h4 mb-3 font-weight-normal">List of bus</h4><br>
                        <?php
                            $array_Curreant = array();
                            $array_Destination = array();
                            $array_Curreant_NGV = array();
                            $array_Destination_NGV = array();
                        ?>
                        
                            <?php 
                                foreach ($routes as $itemRoute){
                                    foreach ($itemRoute->stations as $itemStation) {     
                                        if($selectedCurrent == $itemStation->name_station  ){
                                            array_push($array_Curreant_NGV,  $itemRoute->name_route) ;
                                            foreach ($itemRoute->stations as $key => $itemStation){
                                                $new = array_push($array_Curreant, $itemStation->name_station) ; 
                                            }
                                        }
                                    }
                                    
                                    foreach ($itemRoute->stations as $itemStation) {  
                                        if ($selectedDestination == $itemStation->name_station){ 
                                            array_push( $array_Destination_NGV,  $itemRoute->name_route) ;
                                            foreach ($itemRoute->stations as $key => $itemStation){
                                                $new =  array_push($array_Destination,$itemStation->name_station); 
                                            }
                                        } 
                                    }
                                   
                                }
                                // print_r("Array_Curreant : ");
                                // print_r($array_Curreant );
                                // print_r($array_Curreant_NGV);
                                // print_r($array_Destination_NGV);
                                // print_r("Array_Destination : ");
                                // print_r($array_Destination);
                               
                                if (in_array($selectedDestination,$array_Curreant) && in_array($selectedDestination,$array_Curreant) ) {
                                    // print_r("Destination : ");
                                    // print_r($selectedDestination);
                                
                                    foreach ($routes as $itemRoute){
                                    
                                            if (in_array($itemRoute->name_route, $array_Curreant_NGV) && in_array($itemRoute->name_route, $array_Destination_NGV) ) {
                                            // print_r($itemStation->name_station)
                                            // print_r("Array_Curreant : ");
                                            // print_r($array_Curreant);
                                    ?>
                                    <div class="dropdown">
                                            <button class="dropbtn">{{$itemRoute->name_route}}
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-content">
                                                @foreach ($itemRoute->stations as $itemStation)
                                                    <a >{{$itemStation->name_station}}</a> 
                                                @endforeach
                                            </div>
                                          
                                    </div>
                                  
                                    <?php
                                         
                                       }  
                                    }
                                }
                                ?> 
                                 
                        
                                
                                        
                            
                        
                    </div>
                </div>
            </div>
            
        </div>

        <!-- item right -->
        <div class="col col-lg-8">
            <div class="jumbotron ">
                
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
    
   
    var list_Bus ;
    function orderBus(){
        document.getElementById("list_Bus")
        
    }
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: position,
            zoom: 15,
            // mapTyped: google.maps.MapTypeId.TERRAIN
        });

        // get data from SearchController.php and append to json data
        var all_stations = JSON.parse('<?php echo json_encode($stations) ?>');
    
        console.log(all_stations);
        

        var json_locations_NGV = JSON.parse('<?php echo json_encode($buses); ?>');
        var ngv_Curreant = '<?php echo json_encode($array_Curreant_NGV); ?>';
        var ngv_Destination = '<?php echo json_encode($array_Destination_NGV); ?>';
        // console.log(ngv_Curreant);
        // console.log(ngv_Destination);
        var marker, i, info;
        // console.log(json_locations_NGV.data[0].name_route);
        for (i = 0; i < json_locations_NGV.data.length; i++)  {
            if ((ngv_Curreant.includes(json_locations_NGV.data[i].name_route)) && (ngv_Destination.includes(json_locations_NGV.data[i].name_route)) ) {
             
                var marker, i, info;
                // console.log(json_locations_NGV.data[0]);
                  marker = new google.maps.Marker({
                        position: new google.maps.LatLng(json_locations_NGV.data[i].latitude, json_locations_NGV.data[i].longitude),
                        map: map,
                        icon: "http://maps.google.com/mapfiles/kml/pal2/icon47.png"
                    });
                    info = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                           
                            info.setContent(json_locations_NGV.data[i].name_route + '  ['+json_locations_NGV.data[i].license_plate +']');
                            info.open(map, marker);
                        }
                    })(marker, i));
                    // console.log(json_locations_NGV.data[i].license_plate);
                
            }
        }

        

        var selectedCurrent = '<?php echo $selectedCurrent ?>';
        var selectedDestination = '<?php echo $selectedDestination ?>';
        var marker , info;
        var icon = {
                url: "https://cdn1.iconfinder.com/data/icons/ecommerce-61/48/eccomerce_-_location-128.png", // url
                scaledSize: new google.maps.Size(50, 50), // scaled size
                
            };
        $.each(all_stations,function(i,item){
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
                     icon:icon
                     
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
    //refresh page 
    window.setInterval('refresh()', 15000); 
        function refresh() {
            window.location.reload(1);
            // console.log(555555555);
            }




    
</script>
<style>

.div {
  width: 100%;
  background-color:  #585964;
  color: rgb(255, 255, 255);
}
.divPageBackground {
  width: 100%;
  background-color: #1e2246;
  
}
.divNav {
  width: 100%;
  background-color: #2a2a4d;
 
  
}
.dropbtn {
  background-color: #ffe13a;
  color: rgb(0, 0, 0);
  padding: 10px;
  font-size: 12px;
  min-width: 50px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-top: 5px
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 150px;
  max-height: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  overflow:scroll;
}

.dropdown-content a {
  color: black;
  padding: 8px ;
  font-size:10px;
  text-decoration: none;
  display: block;

}

/* .dropdown-content a:hover {background-color: #ddd;} */

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #c22f15;}
</style>
@endsection
