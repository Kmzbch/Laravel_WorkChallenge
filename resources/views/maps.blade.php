<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Googlemaps Test</title>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
</head>

<body>
    <div id="map">

    </div>


    <script>
        console.log('???');
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {
                lat: -25.344,
                lng: 131.036
            };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 4,
                    center: uluru
                });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&callback=initMap">
        console.log('!!!!!');
    </script>

</body>

</html>