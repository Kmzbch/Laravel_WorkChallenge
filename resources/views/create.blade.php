<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1">
    <title>Add New Lab - Lab Finder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

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

            <h2 class="display-5">Add New Lab</h2>
            <br />
            <form action="{{url('/store')}}" method="POST">
                <div class="form-group">
                    <label for="name">Name</label> <input type="text" class="form-control" id="name" placeholder="e.g. J001" /></span>
                </div>
                <div class="form-group">
                    <label for="location">Location</label> <input type="text" class="form-control" id="location" placeholder="e.g. J001" value="dummy" /></span>
                </div>

                <br /> <input type="submit" class="col-2 btn btn-primary btn-lg" value="Add Job" /><br /> <br /> <a class="col-2 btn btn-info btn-lg" href="/">Back
                    to Main</a>
            </form>
        </div>
    </div>
</body>

</html>