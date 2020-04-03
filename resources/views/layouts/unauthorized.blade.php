@extends('layouts.welcome')
@section('content')

    <div class="jumbotron">
        <h1><strong>UnAuthorized User!</strong> Please Login To Continue</h1>
    </div>
    <button class="btn primary" style="background-color:black; "><a href="{{ url('/register') }}" style="color:white">{{ __('views.welcome.register') }}</a></button>
    <button class="btn primary" style="background-color:dimgray;"><a href="{{ url('/login') }}" style="color:white"> {{ __('views.welcome.login') }}</a></button>
@endsection