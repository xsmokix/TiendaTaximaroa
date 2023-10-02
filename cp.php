
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAuPxWrQ7zxMV9h7dzYKH4Npu11WtNhs3k"></script> 
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

      <script type="text/javascript">
    function DrawMap(cp) {
        var geocoder = new google.maps.Geocoder();
        var address = cp;
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
                    alert("No podemos encontrar ese código postal.\n Por favor revísalo para que la entrega sea correcta.");
                }
            } else {
                document.getElementById("dvMap").style.display = "none";
                    alert("No podemos encontrar ese código postal.\n Por favor revísalo para que la entrega sea correcta.");
            }
        });
    };
    DrawMap('58j60');
</script>

      

<center>
    <div id="dvMap" style="width: 100%; height: 200px"></div>
</center>

