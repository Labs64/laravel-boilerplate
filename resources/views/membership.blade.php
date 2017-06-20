@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        Member area
    </div>
    <div class="m-b-md">
        @if($valid)
            Your membership status is confirmed. All the protected pages will be accessible.
<<<<<<< HEAD
            @if($expires)
                Your license expires {{ new \Carbon\Carbon($expires) }}
=======
            @if($nlic_validation->get('expires'))
                <br/>Your license expires on: <i>{{ new \Carbon\Carbon($nlic_validation->get('expires')) }}</i>
>>>>>>> 58117047047f3980f7cafa09ed1f103726f2a599
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
