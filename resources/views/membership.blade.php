@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        Member area
    </div>
    <div class="m-b-md">
        @if($nlic_validation->get('valid'))
            Your membership status is confirmed. All the protected pages will be accessible.
            @if($nlic_validation->get('expires'))
                <br/>Your license expires on: <i>{{ new \Carbon\Carbon($nlic_validation->get('expires')) }}</i>
            @endif
        @else
            Your membership status isn't confirmed. All the protected pages will not be accessible!
        @endif
        <br/><br/>
        Click <a href="{{ $nlic_shop_token->shop_url }}">here</a> to extend or renew your membership.
    </div>
@endsection
