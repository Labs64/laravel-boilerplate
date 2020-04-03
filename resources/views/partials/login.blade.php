
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:lightgray;">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" id="loginModal">{{ __('Login') }}</h2>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>


                        <div>
                            <button class="btn btn-default submit" type="submit">{{ __('views.auth.login.action_0') }}</button>
                            <a class="reset_pass" href="{{ route('password.request') }}">
                                {{ __('views.auth.login.action_1') }}
                            </a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <span>{{ __('views.auth.login.message_0') }}</span>
                            <div>
                                <a href="{{ route('social.redirect', ['google']) }}" class="btn btn-success btn-google-plus">
                                    <i class="fa fa-google-plus"></i>
                                    Google+
                                </a>
                                <a href="{{ route('social.redirect', ['facebook']) }}" class="btn btn-success btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                    Facebook
                                </a>
                                <a href="{{ route('social.redirect', ['twitter']) }}" class="btn btn-success btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </div>
                        </div>

                        @if(config('auth.users.registration'))
                            <div class="separator">
                                <p class="change_link">{{ __('views.auth.login.message_1') }}
                                    <a href="{{ route('register') }}" class="to_register"> {{ __('views.auth.login.action_2') }} </a>
                                </p>

                                {{-- <div class="clearfix"></div>
                                <br/>

                                <div>
                                    <div class="h1">{{ config('app.name') }}</div>
                                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.login.copyright') }}</p>
                                </div> --}}
                            </div>
                        @endif
                    </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif
@endsection