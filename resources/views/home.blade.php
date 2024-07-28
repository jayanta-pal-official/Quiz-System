<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <nav class="navbar   navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quiz System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
                    </li>

                </ul>
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-end" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <h3 class="text-white text-center mt-5">welcome : {{ Auth::user()->name }}</h3>

    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <a href="{{route('question')}}" > <button class="btn btn-primary" style="width: 130px" >Teacher</button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('start')}}"> <button class="btn btn-primary" style="width: 130px">Student</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>