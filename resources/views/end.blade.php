@extends('layout.main')
@section('title', 'End Page')
@section('main-section')
<div class="container" style="padding-top: 35vh">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4 " style="color: black">
            <label>Correct : <small>{{Session::get('correctans')}}</small></label>&nbsp;&nbsp;
            <label>Incorrect : <small>{{Session::get('wrongans')}}</small></label>&nbsp;&nbsp;
            <label>Result : <small>{{Session::get('correctans')}}/{{Session::get('correctans') +
                    Session::get('wrongans')}}</small></label>
            <br><br> <a href="  
               @if (Auth::check()) {{route('home')}}
                @else 
                {{route('index')}}
                @endif
               "><button class="btn btn-primary" style="margin-left: 20%">Finish Quiz</button></a>
        </div>
        <div class="col-md-3"></div>
    </div>


</div>
@endsection