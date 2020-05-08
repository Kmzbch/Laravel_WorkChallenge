<!DOCTYPE html>

<head>
    <meta charset="ISO-8859-1">
    <title>Lab List - Lab Finder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="outline-box">
    <!-- https://getbootstrap.com/docs/4.4/components/navbar/ -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand active font-weight-bold" href="/">Lab Finder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home </a></li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron row justify-content-center color-white">
        <div class="col-8 justify-content-center div-style content">

            <h2 class="display-5">Find your lab</h2>
            <br />
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="width: 30%;">Lab Name</th>
                        <th scope="col" style="width: 25%;">Location</th>
                        <th scope="col" style="width: 25%;">Date Added</th>
                        <th scope="col" style="width: 10%;">Edit</th>
                        <th scope="col" style="width: 10%;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labs as $lab)
                    <tr scope="row" th:each="job:${jobs}">
                        <td>{{$lab->name}}</td>
                        <td>{{$lab->location}}</td>
                        <td>Dummy Timestamp</td>
                        <td><a class="btn btn-secondary" href="{{url('labs/'.$lab->id.'/edit')}}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{url('labs/'.$lab->id.'/delete')}}">Delete</a></td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
            <br /> <a class="col-2 btn btn-primary btn-lg" href="{{url('/create')}}">Add Lab</a>
            <br /> <br /> <a class="col-2 btn btn-info btn-lg" href="#">Back to Main</a>
        </div>

    </div>
    Yahoo!!!
    {{
        $labs
    }}



</body>

</html>