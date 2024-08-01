@extends('layout.main')

@section('title', 'Register Page')
@section('main-section')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-body">

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session:: get('success') }}
                    </div>
                    @endif

                    <form action="{{ route('registerPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password"
                                value="{{old('password')}}">
                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary"> Register</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">Already have an account? <a href="{{route('login')}}" >Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection