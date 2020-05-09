@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                    <a href="{{url('/list')}}">View Lab List</a>

                    <a href="{{url('/viewMap')}}">View Map</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>

<head>
    <meta charset="ISO-8859-1">
    <title>Lab List - Lab Finder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="outline-box">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand active font-weight-bold" href="/">Lab Finder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/viewMap')}}">View Map</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/list')}}">Lab List</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}">Logout</a></li> -->
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>

    <div class="jumbotron row justify-content-center color-white">
        <div class="col-8 justify-content-center div-style content">

            <h2 class="display-5">Find your lab</h2>
            <br />
            <!-- <br /> <a class="col-2 btn btn-primary btn-lg" href="{{url('/create')}}">Add Lab</a>
            <br /> <br /> <a class="col-2 btn btn-info btn-lg" href="#">Back to Main</a> -->

            <a href="{{url('/list')}}">View Lab List</a>
            <a href="{{url('/viewMap')}}">View Map</a>

        </div>

    </div>


</body>

</html>