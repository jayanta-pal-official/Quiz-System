@extends('layout.main')

@section('title', 'Login Page')
@section('main-section')
 
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Log In</h1>
                </div>
                <div class="card-body">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session:: get('error') }}
                    </div>
                    @endif
                    <form action="{{ route('loginPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" id="email">
                            
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">Don't have an account? <a href="{{route('register')}}" >Signup</a></p>

                </div>
            </div>
        </div>
    </div>
@endsection