@extends('layout.main')

@section('title', 'Start Quize Page')
{{-- @section('background-image', asset('/image/bg.jpg')) --}}
@section('main-section')
<div class="container" style="padding-top: 35vh">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <h1 class="">Are You Ready?</h1><br>
            <a href="{{route('startquize')}}"><button class="btn btn-primary" style="margin-left: 20%">Start
                    Quiz</button></a>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection