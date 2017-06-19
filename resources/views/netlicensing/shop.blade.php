@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        Member area
    </div>
    <div class="m-b-md">
        <div class="links">
          Your membership status isn't confirmed. All the protected pages will not be accessible!
          <br/><br/>
          Click <a href="{{ $shop_url }}">here</a> to extend or renew your membership.
        </div>
    </div>
@endsection
