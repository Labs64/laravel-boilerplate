<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: lightgray;">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2 class="modal-title" id="registerModal">{{ __('Register') }}</h2>
            </div>
            <div class="modal-body">
                <section class="login_content"  id="registerForm">
                {{ Form::open(['route' => 'register']) }}
                
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                           placeholder="{{ __('views.auth.register.input_0') }}"
                           value="{{ old('name') }}" required autofocus/>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control"
                           placeholder="{{ __('views.auth.register.input_1') }}"
                           required/>
                </div >
                <div class="form-group">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ __('views.auth.register.input_2') }}"
                           required=""/>
                </div >
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ __('views.auth.register.input_3') }}"
                           required/>
                </div>

                

             
                <div class="form-group">
                    <button type="submit" class="btn btn-default submit">{{ __('views.auth.register.action_1') }}</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">{{ __('views.auth.register.message') }}
                        <a href="{{ route('login') }}" class="to_register"> {{ __('views.auth.register.action_2') }} </a>
                    </p>
                </div>
                {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
</div>
