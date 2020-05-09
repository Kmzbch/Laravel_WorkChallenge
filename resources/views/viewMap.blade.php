<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>View Map</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <style>
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>

<body class="outline-box">
    <!-- https://getbootstrap.com/docs/4.4/components/navbar/ -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand active font-weight-bold" href="/">Lab Finder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron row justify-content-center color-white">
        <div class="col-8 justify-content-center div-style content">
            <div id="map">

            </div>

        </div>
    </div>

    <script>
        // get the lab list from PHP
        let labs = @json($labs);

        function dropMarkers(map) {

            labs.forEach((lab) => {
                console.log(lab);
                geocoder.geocode({
                    'address': lab.location
                }, (results, status) => {
                    if (status == 'OK') {

                        console.log(results);
                        map.setCenter(results[0].geometry.location);
                        let marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                        // // fit bounds to cover all the marker in the map
                        // let bounds = new google.map.LatLngBounds();
                        // bounds.extend(marker);
                        // map.fitBounds(bounds);

                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                    return results[0].geometry.location;
                })

            });



        }

        let geocoder;

        function initMap() {

            geocoder = new google.maps.Geocoder();
            var defaultLatLng = new google.maps.LatLng(-34.397, 150.644);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLatLng,
                // region: 'ca',
                zoom: 5
            });

            dropMarkers(map);

            // var card = document.getElementById('pac-card');
            // // var input = document.getElementById('pac-input');
            // var input = document.getElementById('location');
            // var types = document.getElementById('type-selector');
            // var strictBounds = document.getElementById('strict-bounds-selector');

            // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

            // var autocomplete = new google.maps.places.Autocomplete(input);

            // // Bind the map's bounds (viewport) property to the autocomplete object,
            // // so that the autocomplete requests use the current map bounds for the
            // // bounds option in the request.
            // autocomplete.bindTo('bounds', map);

            // // Set the data fields to return when the user selects a place.
            // autocomplete.setFields(
            //     ['address_components', 'geometry', 'icon', 'name']);

            // var infowindow = new google.maps.InfoWindow();
            // var infowindowContent = document.getElementById('infowindow-content');
            // infowindow.setContent(infowindowContent);
            // var marker = new google.maps.Marker({
            //     map: map,
            //     anchorPoint: new google.maps.Point(0, -29)
            // });

            // autocomplete.addListener('place_changed', function() {
            //     infowindow.close();
            //     marker.setVisible(false);
            //     var place = autocomplete.getPlace();
            //     if (!place.geometry) {
            //         // User entered the name of a Place that was not suggested and
            //         // pressed the Enter key, or the Place Details request failed.
            //         window.alert("No details available for input: '" + place.name + "'");
            //         return;
            //     }

            //     // If the place has a geometry, then present it on a map.
            //     if (place.geometry.viewport) {
            //         map.fitBounds(place.geometry.viewport);
            //     } else {
            //         map.setCenter(place.geometry.location);
            //         map.setZoom(17); // Why 17? Because it looks good.
            //     }
            //     marker.setPosition(place.geometry.location);
            //     marker.setVisible(true);

            //     var address = '';
            //     if (place.address_components) {
            //         address = [
            //             (place.address_components[0] && place.address_components[0].short_name || ''),
            //             (place.address_components[1] && place.address_components[1].short_name || ''),
            //             (place.address_components[2] && place.address_components[2].short_name || '')
            //         ].join(' ');
            //     }

            //     infowindowContent.children['place-icon'].src = place.icon;
            //     infowindowContent.children['place-name'].textContent = place.name;
            //     infowindowContent.children['place-address'].textContent = address;
            //     infowindow.open(map, marker);
            // });

            // // Sets a listener on a radio button to change the filter type on Places
            // // Autocomplete.
            // function setupClickListener(id, types) {
            //     // var radioButton = document.getElementById(id);
            //     // radioButton.addEventListener('click', function() {
            //     //     autocomplete.setTypes(types);
            //     // });
            // }

            // setupClickListener('changetype-all', []);
            // setupClickListener('changetype-address', ['address']);
            // setupClickListener('changetype-establishment', ['establishment']);
            // setupClickListener('changetype-geocode', ['geocode']);

            // document.getElementById('use-strict-bounds')
            //     .addEventListener('click', function() {
            //         console.log('Checkbox clicked! New state=' + this.checked);
            //         autocomplete.setOptions({
            //             strictBounds: this.checked
            //         });
            //     });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&libraries=places&callback=initMap" async defer></script>

</body>

</html>