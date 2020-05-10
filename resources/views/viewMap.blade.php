@extends('layouts.template')

@section('content')

<div class="jumbotron row justify-content-center color-white">

    <div class="col-8 justify-content-center div-style content">
        <h2>Find labs</h2>
        <br>
        <div id="map">
        </div>

    </div>
</div>

<script>
    // get the lab list from PHP
    const labs = @json($labs);

    // 
    function dropMarkers(map) {
        let geocoder;
        let infoWindow;

        labs.forEach((lab) => {

            geocoder = new google.maps.Geocoder();

            // get geocode from address string
            geocoder.geocode({
                'address': lab.location
            }, (results, status) => {
                if (status == 'OK') {
                    const marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP,
                    });

                    infoWindow = new google.maps.InfoWindow();

                    // attach click event to info window
                    marker.addListener('click', function() {
                        infoWindow.setContent(
                            `<div><h4>${lab.name}</a></h4>${lab.location}</div><div class="text-right"><a href="labs/${lab.id}/show">View</a></div>`
                        );
                        infoWindow.open(map, marker);
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }

                map.setCenter(results[0].geometry.location);

                return results[0].geometry.location;
            })

        });
    }

    function initMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(43.651070, -79.347015), // Toronto by default
            region: 'ca',
            zoom: 9
        });

        dropMarkers(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&language=en&libraries=places&callback=initMap" async defer></script>

@endsection