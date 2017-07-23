@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        Member area
    </div>
    <div class="m-b-md">
        @if($valid)
            Your membership status is confirmed. All the protected pages will be accessible.
            @if($expires)
                <br/>Your license expires on <i>{{  new \Carbon\Carbon($expires) }}</i>
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
