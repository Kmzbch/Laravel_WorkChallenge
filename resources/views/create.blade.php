@extends('layouts.template')

@section('content')
<div class="jumbotron row justify-content-center color-white">
    <div class="col-8 justify-content-center div-style content">

        <h2 class="display-5">Add New Lab</h2>
        <br />
        <form action="{{url('/store')}}" method="POST">

            {!! csrf_field() !!}

            <!-- -->
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a lab name" required />
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <textarea class="form-control" style="min-height: 100px;" id="description" name="description" placeholder="Enter a description" value="" required></textarea>
            </div>
            <div class="form-group">
                <label for="location" class="font-weight-bold">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter a location" value="" required />
            </div>

            <!-- Google Maps goes here -->
            <label for="map" class="font-weight-bold">Map</label>

            <div id="map">
            </div>

            <!-- Address search result -->
            <div id="infowindow-content">
                <img src="" width="16" height="16" id="place-icon">
                <span id="place-name" class="title"></span><br>
                <span id="place-address"></span>
            </div>

            <br />
            <input type="submit" class="col-2 mr-2 btn btn-success btn-lg" value="Add" />
            <a class="col-2 mr-2  btn btn-info btn-lg" href="/list">Back</a>
        </form>
    </div>
</div>

<!-- scripts -->
<script src="{{ asset('js/maps.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google-map.apikey')}}&language=en&libraries=places&callback=initMap" async defer></script>

@endsection