<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>questions</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>

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
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4"></div>
            <div class="col-md-5 text-center">
                @if(Session ::get('added'))
                <div class="alert alert-success" role="alert">
                    {{ Session:: get('added') }}
                </div>
                @php
                Session::forget('added');
                @endphp
                @endif

                @if(Session ::get('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ Session:: get('delete') }}
                </div>
                @php
                Session::forget('delete');
                @endphp
                @endif
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper mt-5">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-1">
                            <h2>Users <b></b></h2>
                        </div>
                        <div class="col-sm-7"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add
                            </button></div>
                        <div class="col-sm-4">
                            <div class="search-box">

                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>question <i class="fa fa-sort"></i></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $q)

                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$q->question}}</td>

                            <td>
                                <button type="button" class="btn bg-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2{{$q->id}}">
                                    Update
                                </button>
                                <a href="{{url('deletequestion')}}/{{$q->id}}" >
                                    <button class="btn btn-danger mt-1" onclick="return confirm('Are you sure you want to delete your account?');"> Delete</button>
                                   </a>
                                {{-- <a href="#" class="text-danger" data-toggle="modal" data-target="#exampleModal3{{$q->id}}">Delete</a> --}}
                            </td>
                        </tr>

                        <!-- Modal-update -->
                        <div class="modal fade" id="exampleModal2{{$q->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('updatequestion')}}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{$q->id}}">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Question</label>
                                                    <input type="text" name="question" class="form-control"
                                                        id="question" value="{{$q->question}}" </div>
                                                    <div class="row">
                                                        <div class="col-md-6"><label>A:</label></div>
                                                        <div class="col-md-6"><label>B:</label></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"><input name="opa" value="{{$q->a}}"></div>
                                                        <div class="col-md-6"><input name="opb" value="{{$q->b}}"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"><label>C:</label></div>
                                                        <div class="col-md-6"><label>D:</label></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"><input name="opc" value="{{$q->c}}"></div>
                                                        <div class="col-md-6"><input name="opd" value="{{$q->d}}"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Answer: </label>
                                                            <select name="ans" class="form-control">
                                                                <option value="{{$q->ans}}"> {{$q->ans}}</option>
                                                                <option value="a"> A</option>
                                                                <option value="b"> B</option>
                                                                <option value="c"> C</option>
                                                                <option value="d"> D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update question</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                         
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>


<!-- Modal-Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('addquestion')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="question" class="form-control" id="question"
                                value="{{old('question')}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>A:</label></div>
                            <div class="col-md-6"><label>B:</label></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><input name="opa" value="{{old('opa')}}"></div>
                            <div class="col-md-6"><input name="opb" value="{{old('opb')}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>C:</label></div>
                            <div class="col-md-6"><label>D:</label></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><input name="opc" value="{{old('opc')}}"></div>
                            <div class="col-md-6"><input name="opd" value="{{old('opd')}}"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Answer: </label>
                                <select name="ans" class="form-control">
                                    <option value="a"> A</option>
                                    <option value="b"> B</option>
                                    <option value="c"> C</option>
                                    <option value="d"> D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add question</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>