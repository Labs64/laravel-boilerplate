@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        The content of this page is protected
    </div>
    <div class="m-b-md">
        <div class="links">
            <a href="{{ $shop_url }}"> Click to go to the store to buy a license </a>
        </div>
    </div>
@endsection