@extends('layout.main')
@section('title', 'Home Page')
@section('background-image', asset('/image/bg.jpg'))
@section('main-section')
<div class="container">
    <h3 class="text-white text-center pt-5">welcome : {{ Auth::user()->name }}</h3>
    <div class="row justify-content-center pt-5">
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="{{route('question')}}"> <button class="btn btn-primary"
                            style="width: 130px">Teacher</button></a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('start')}}"> <button class="btn btn-primary"
                            style="width: 130px">Student</button></a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection