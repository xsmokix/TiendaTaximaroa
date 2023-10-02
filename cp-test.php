<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAuPxWrQ7zxMV9h7dzYKH4Npu11WtNhs3k"></script>  -->
  


<?php 
/**
*
* Author: CodexWorld
* Author URI: http://www.codexworld.com
* Function Name: getZipcode()
* $address => Full address.
*
**/

// some address values



    $direccion = 'Heroico Colegio Militar 560 Chapultepec Oriente';

     
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=H.+Colegio+Militar+560,+Chapultepec+Oriente,+Morelia,+Mich.&key=AIzaSyAuPxWrQ7zxMV9h7dzYKH4Npu11WtNhs3k";

// Parsing the JSON response from the Google Geocode API to get exact map coordinates:
// latitude , longitude (see the Google doc. for the complete data return here:
// https://developers.google.com/maps/documentation/geocoding/.)

$datosjson   = file_get_contents($url);


$datosmapa = json_decode($datosjson, true);

echo var_dump($datosmapa);

echo "<br><br><br><br>";


echo $datosmapa['status'];



echo $latitud = $datosmapa['results'][0]['address_components'][6]['long_name'];



 ?>

 <!DOCTYPE html>
<html>
  <head>
    <title>Add Marker to Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 90%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAuPxWrQ7zxMV9h7dzYKH4Npu11WtNhs3k"></script> 
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

     <script>
         function loadMap() {
            
            var mapOptions = {
               center:new google.maps.LatLng(19.6922464, -101.1651255),
               zoom:16
            }
                
            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);
            
            var marker = new google.maps.Marker({
               position: new google.maps.LatLng(19.6922464, -101.1651255),
               map: map,
            });
         }
      </script>
      <script type="text/javascript">
    function DrawMap() {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById('txtPostalCode').value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0].types[0] == 'postal_code') {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    var data = {};
                    data.title = results[0].formatted_address;
                    data.lat = latitude;
                    data.lng = longitude;
                    var mapOptions = { center: new google.maps.LatLng(latitude, longitude), zoom: 14, mapTypeId: google.maps.MapTypeId.ROADMAP };
                    var infoWindow = new google.maps.InfoWindow();
                    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({ position: myLatlng, map: map, title: data.title });
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent("<div style = 'width:200px;height:50px'>" + data.title + "</div>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                    document.getElementById("dvMap").style.display = "block";
                } else {
                    document.getElementById("dvMap").style.display = "none";
                    alert("Your post code is not correct.\nPlease update your correct postcode.");
                }
            } else {
                document.getElementById("dvMap").style.display = "none";
                alert("Your post code is not correct.\nPlease update your correct postcode.");
            }
        });
    };
</script>

      
   </head>
   
   <body onload = "loadMap()">
      <div id = "sample" style = "width:580px; height:400px;"></div>


      <center>
    <input type="text" id="txtPostalCode" onchange="DrawMap()" placeholder="Enter Postal / Zip / Pin code"
        style="width: 200px" />
    <br />
    <br />
    <div id="dvMap" style="width: 300px; height: 400px">
    </div>
</center>

   </body>
    


</html>