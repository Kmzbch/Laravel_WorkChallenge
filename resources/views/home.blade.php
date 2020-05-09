@extends('layouts.template')

@section('content')

<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Find your lab!</h1>
        <br />
        <p class="lead"><span class="font-weight-bold">LabFinder</span> - the top web service for lab search</p>
        <hr class="my-4">
        <p>Find labs hosted all over the world so you can enhance your learning experience.</p>
        <br />
        <a class="col-2 btn btn-info btn-lg" href="{{url('/viewMap')}}">Find Lab</a>
    </div>
</div>

@endsection