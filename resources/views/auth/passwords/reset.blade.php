@extends('auth.layouts.auth')

@section('body_class','passwords_reset')

@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    {{ Form::open(['route' => 'password.request']) }}
                    <h1>{{ __('views.auth.passwords.reset.header') }}</h1>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="{{ __('views.auth.passwords.reset.input_0') }}" required autofocus>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="{{ __('views.auth.passwords.reset.input_1') }}" required>
                    </div>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="{{ __('views.auth.passwords.reset.input_2') }}" required>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!$errors->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            {!! $errors->first() !!}
                        </div>
                    @endif

                    <div>
                        <button class="btn btn-default submit" type="submit">{{ __('views.auth.passwords.reset.action') }}</button>
                        <a class="reset_pass" href="{{ route('login') }}">
                            {{ __('views.auth.passwords.reset.message') }}
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <div class="h1">{{ config('app.name') }}</div>
                            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.passwords.reset.copyright') }}</p>
                        </div>
                    </div>
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent

    {{ Html::style(mix('assets/auth/css/passwords.css')) }}
@endsection