@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        Member area
    </div>
    <div class="m-b-md">
        @if($valid)
            Your membership status is confirmed. All the protected pages will be accessible.
            @if($expires)
                Your license expires {{ new \Carbon\Carbon($expires) }}
            @endif
        @else
            Your membership status isn't confirmed. All the protected pages will not be accessible!
        @endif

        @if($shopUrl)
            <br/><br/>
            Click <a href="{{ $shopUrl }}">here</a> to extend or renew your membership.
        @endif
    </div>
@endsection
