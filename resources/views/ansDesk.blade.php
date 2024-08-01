@extends('layout.main')

@section('title', 'Start Quiz')
@section('background-image', asset('/image/question.jpeg'))


@section('main-section')
<style>
    body{
    background-image: url("/image/question.jpeg")!improtent;
    background-size: cover;
    background-repeat: no-repeat;
    }
</style>
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
@endsection