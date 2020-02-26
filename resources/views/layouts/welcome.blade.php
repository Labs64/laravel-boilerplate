<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <head>
        <title>URF Booking System</title>
        <style>
          img {
            display: block;
            margin-left: auto;
            margin-right: auto;
          }
          </style>
        <!-- Laravel variables for js -->
        @tojs
    </head>
    <body>          
            <nav class="navbar navbar-default">
              <img style="width:100%;height:auto;" src="https://www.utm.my/edutourism/files/2018/11/edu-logo.png"/>
              <div class="container-fluid">
                <div class="navbar-header" style>
                  <a class="navbar-brand" href="#">UTM Recreational Forest</a>
                </div>
                <ul class="nav navbar-nav">
                <li class><a href="{{url('/welcome')}}">Home</a></li>
                  
                  <li><a href="{{ url('/about') }}">About</a></li>
                  
                  <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                  <li><a href="{{ route('package') }}">Packages</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                    @if (!Auth::check())
                        @if(config('auth.users.registration'))
                        <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span>{{ __('views.welcome.register') }}</a></li>
                        @endif
                        <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>   {{ __('views.welcome.login') }}</a></li>
                    @else
                        @if(auth()->user()->hasRole('administrator'))
                            <li><a href="{{ url('/admin') }}">{{ __('views.welcome.admin') }}</a></li>
                        @endif
                      
                     <li><a href="#">Booking</a></li>    
                    <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span>  {{ __('views.welcome.logout') }}</a></li>
                    @endif
                    
                @endif

                
                </ul>
              </div>
            </nav>

            <div class="content">
                @yield('content')
                <div class="footer">
                    <!--Credits:&nbsp;
                    <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&amp;utm_medium=github&amp;utm_campaign=laravel_boilerplate&amp;utm_content=credits" target="_blank" title="Online Software License Management"><i class="fa fa-lock" aria-hidden="true"></i>NetLicensing</a>&nbsp;&bull;&nbsp;
                    <a href="https://photolancer.zone/?utm_source=Laravel_Boilerplate&amp;utm_medium=github&amp;utm_campaign=laravel_boilerplate&amp;utm_content=credits" target="_blank" title="Individual digital content for your next campaign"><i class="fa fa-camera-retro" aria-hidden="true"></i>Photolancer Zone</a>
                    -->   
                </div>
            </div>
    </body>

</html>

