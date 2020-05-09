@extends('layouts.template')

@section('content')
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

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&libraries=places&callback=initMap" async defer></script>

@endsection