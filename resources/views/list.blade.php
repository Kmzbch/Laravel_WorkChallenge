@extends('layouts.template')

@section('content')
<div class="jumbotron row justify-content-center color-white">
    <div class="col-8 justify-content-center div-style content">

        <h2 class="display-5">Explore Our Labs</h2>
        <br />
        <table class="table table-striped table-hover" style="position: relative;">
            <thead>
                <tr>
                    <th scope="col" style="width: 30%;">Name</th>
                    <th scope="col" style="width: 20%;">Location</th>
                    <th scope="col" style="width: 20%;">Date Added</th>
                    <th scope="col" style="width: 10%;">Edit</th>
                    <th scope="col" style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labs as $lab)
                <tr scope="row">
                    <td>{{$lab->name}} <a class="stretched-link" href="{{url('labs/'.$lab->id.'/show')}}"></a></td>
                    <td>{{$lab->location}}</td>
                    <td>{{ date_format($lab->created_at,"M j, Y")}}</td>
                    <td style="position: relative; z-index: 99999999;"><a class="btn btn-secondary" href="{{url('labs/'.$lab->id.'/edit')}}">Edit</a></td>
                    <td style="position: relative; z-index: 99999999;"><a class="btn btn-danger" href="{{url('labs/'.$lab->id.'/delete')}}">Delete</a></td>

                </tr>

                @endforeach

            </tbody>
        </table>
        <br /> <a class="col-2 btn btn-primary btn-lg" href="{{url('/create')}}">Add Lab</a>
        <br /> <br /> <a class="col-2 btn btn-info btn-lg" href="/">Back to Main</a>
    </div>

</div>
@endsection