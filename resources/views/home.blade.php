@extends('layouts.template')

@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h1 class="display-5 font-weight-bold">Find a Lab for the future!</h1>
                <br />
                <p class=" lead"><span class="font-weight-bold text-black-50">LabFinder - the best web service for lab search</span></p>
                <p style="font-size: 1.2rem;">
                    LabFinder helps you find a variety of labs in the world. You can gain valuable insights from speakers and panelists on emerging technologies, skill development and lifelong learning.
                    Leverage these co-learning opportunities with us!
                </p>
                <br />
                <a class="col-3 btn btn-primary btn-lg" href="{{url('/viewMap')}}">Find Lab</a>

            </div>
            <!-- Image retrieved from: https://coreaxis.com/the-rise-of-elearning/ -->
            <div class="text-right col-sm">
                <img class="topimage" src="{{asset('../images/image.jpg')}}" class="rounded" alt="topimage">
            </div>

        </div>
    </div>
</div>

@endsection