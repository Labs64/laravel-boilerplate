@extends('layouts.app')

@section('page')

    {{--Region Content--}}
    @yield('content')

@endsection

@section('styles')
    {{ Html::style(mix('assets/auth/css/auth.css')) }}
@endsection
