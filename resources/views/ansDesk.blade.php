<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        body{
    background-image: url("/image/question.jpeg");
    background-size: cover;
    background-repeat: no-repeat;

    
}
    </style>
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
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index')}}">Home</a>
                    </li>
                    @endif

                </ul>
                @if (Auth::check())

                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-end" type="submit">Logout</button>
                </form>
                @endif
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 25vh" >

    </div>
    <div class="container">
        <form method="post" action="{{route('submitans')}}">
            @csrf
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-4 text-white">
                <h3>#{{Session::get('nextq')}} :{{$question->question}}</h3>
                <input  value="a" name="ans" type="radio" checked="true" > (A) <small>{{$question->a}}</small><br>
                <input  value="b" name="ans" type="radio"> (B) <small>{{$question->b}}</small><br>
                <input  value="c" name="ans" type="radio"> (C) <small>{{$question->c}}</small><br>
                <input  value="d"name="ans" type="radio"> (D) <small>{{$question->d}}</small><br>
                <input value="{{$question->ans}}" type="hidden" name="dbans">
            </div>
            <div class="col-md-5"></div>
           
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary float-end " >Next</button>
                </div>
                <div class="col-md-5"></div>
            </div>
        
        </div>
    </form>
    </div>
</body>
</html>