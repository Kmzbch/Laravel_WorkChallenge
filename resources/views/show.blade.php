@extends('layouts.template')

@section('content')
<div class="jumbotron row justify-content-center color-white">
    <div class="col-8 justify-content-center div-style content">

        <h2 class="f-s-30 m-b-20">{{$lab->name}}</h2>
        <br>

        <h4><i class="material-icons">schedule</i>&nbsp;{{date_format($lab->created_at,"M j, Y")}}</h4>

        <h5><i class="material-icons">place</i>&nbsp;{{$lab->location}}</h5>

        <br>

        <p style="font-size: 20px;">
            {{$lab->description}}
        </p>

        <br>

        <div id="map">
        </div>

        <br /> <br /> <a class="col-2 btn btn-info btn-lg" href="{{ url()->previous() }}">Back</a>

    </div>
</div>

<script>
    let lab = @json($lab);

    function codeAddress(map) {
        // let address = document.getElementById('location').value;
        let address = lab.location;

        geocoder.geocode({
            'address': address
        }, (results, status) => {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }

            return results[0].geometry.location;
        })
    }

    let geocoder;

    function initMap() {

        geocoder = new google.maps.Geocoder();
        var defaultLatLng = new google.maps.LatLng(-34.397, 150.644);

        var map = new google.maps.Map(document.getElementById('map'), {
            center: defaultLatLng,
            region: 'ca',
            zoom: 15,
            mapTypeControl: false,
            fullscreenControl: false,
            streetViewControl: false

        });

        codeAddress(map);



        var card = document.getElementById('pac-card');
        // var input = document.getElementById('pac-input');
        var input = document.getElementById('location');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            // var radioButton = document.getElementById(id);
            // radioButton.addEventListener('click', function() {
            //     autocomplete.setTypes(types);
            // });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
                console.log('Checkbox clicked! New state=' + this.checked);
                autocomplete.setOptions({
                    strictBounds: this.checked
                });
            });

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&language=en&libraries=places&callback=initMap" async defer></script>


@endsection