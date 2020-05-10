@extends('layouts.template')

@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-5">Labs Available</h2>
        <br />

        <form action="{{ url('list')}}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <!-- Search form -->
                <!-- https://mdbootstrap.com/snippets/jquery/mdbootstrap/921457 -->
                <div class="col-md-5 mb-5">

                    <div class="input-group md-form form-sm form-2 pl-0">
                        <input id="searchQuery" name="searchQuery" value="{{$searchQuery}}" class=" form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="input-group-text amber lighten-3" id="basic-text1" type="submit" name="submit"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <div>
            <table class="table table-light table-bordered table-striped table-hover" style="position: relative;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 41%;">Name</th>
                        <th scope="col" style="width: 25%;">Location</th>
                        <th scope="col" style="width: 16%;">Date Added</th>
                        @admin
                        <th scope="col" style="width: 18%;">Actions</th>
                        @endadmin

                    </tr>
                </thead>
                <tbody>
                    @foreach ($labs as $lab)
                    <tr scope="row">
                        <td>{{$lab->name}} <a class="stretched-link" href="{{url('labs/'.$lab->id.'/show')}}"></a></td>
                        <td>{{$lab->location}}</td>
                        <td>{{ date_format($lab->created_at,"M j, Y")}}</td>
                        @admin
                        <td style="position: relative; z-index: 99999999;">
                            <div class="span">
                                <a class="btn btn-primary" style="width: 80px;" href=" {{url('labs/'.$lab->id.'/edit')}}">Edit</a>
                                <a class="btn btn-danger" style="width: 80px;" href=" {{url('labs/'.$lab->id.'/delete')}}">Delete</a>
                            </div>
                        </td>
                        @endadmin
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $labs->links() }}
        </div>

        @admin
        <a class="col-2 btn btn-success btn-lg" href="{{url('/create')}}">Add Lab</a>
        @endadmin

    </div>
</div>

@endsection