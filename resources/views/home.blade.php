@extends('layouts.template')

@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h1 class="display-5 font-weight-bold">Find a Lab for the future!</h1>
                <br />
                <p class=" lead">LabFinder - the best web service for lab search</p>
                <p style="font-size: 1.2rem;">
                    LabFinder helps you find a variety of labs in the world. You can gain valuable insights from speakers and panelists on emerging technologies, skill development and lifelong learning.
                    Leverage these co-learning opportunities with us!
                </p>
                <br />
                <a class="col-3 btn btn-primary btn-lg" href="{{url('/viewMap')}}">Find Lab</a>

            </div>
            <div class="text-right col-sm">
                <img class="topimage" src="{{asset('../images/image.jpg')}}" class="rounded" alt="topimage">
            </div>

        </div>
    </div>
</div>

@endsection