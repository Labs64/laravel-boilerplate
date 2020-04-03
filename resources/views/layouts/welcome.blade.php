<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="https://bootswatch.com/3/lumen/bootstrap.min.css">
  
  {{-- <link type="text/css" rel="stylesheet" href="assets/app/css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="assets/app/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="assets/app/css/navbar-fixed-top.css"> --}}
  {{-- <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

 
  <head>
        <title>URF Booking System</title>

        <!-- Laravel variables for js -->
        @tojs
        
    </head>

    <body>
      @if ($message = Session::get('message'))
      <div class="alert alert-success alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>	
          <p>Registration Successful!</p>
          <strong>{{ $message }}</strong>
      </div>
    @endif

    @if(config('auth.captcha.registration'))
      @captcha()
    @endif

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
    
      <!-- Fixed navbar -->
      
      <nav class="navbar navbar-inverse navbar-fixed">
         
      <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">             
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <img class="navbar-brand" src="http://gmm-student.fc.utm.my/~nsbtmr/img/logoFAV2.png"/>
              <a class="navbar-brand" href="#">UTM Recreational Forest</a>
            </div>
          <div id="navbar" class="navbar-collapse collapse">
            @if (Auth::check()==false)
            <ul id="public" class="nav navbar-nav">  
              <li class><a href="{{url('/welcome')}}">Home</a></li>        
              <li><a href="{{ url('/about') }}">About</a></li>
              <li><a href="{{ url('/contact') }}">Contact Us</a></li>
              <li><a href="{{ route('package') }}">Packages</a></li>
            </ul>
            @endif
            <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
              @if (!Auth::check())
                @if(config('auth.users.registration'))
                  <li><a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span>   {{ __('Login') }}</a></li>
                <li>
                  <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#registerModal"><span class="glyphicon glyphicon-log-in"></span>   {{ __('Register') }}</a>
                </li>
                @endif
                  {{-- <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span>{{ __('views.welcome.register') }}</a></li>
                  
                  <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>   {{ __('views.welcome.login') }}</a></li> --}}
              
              @else 
                @if(auth()->user()->hasRole('administrator'))
                  <li><a href="{{ route('admin.dashboard') }}">{{ __('views.welcome.admin') }}</a></li>
                @endif
              
                @if(!auth()->user()->hasRole('administrator'))   
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Booking Menu<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('booking.menu')}}">New Booking</a></li>
                    <li><a href="{{ route('booking.index',auth()->user()->id) }}">Booking History</a></li>
                  </ul>
                </li>
                
                @endif
              @if (Auth::check()==true)
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Welcome ,
                {{ auth()->user()->name }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('customer.edit',auth()->user()->id) }}">                                      
                    <span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
                  <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span>
                        {{ __('views.welcome.logout') }}</a></li>
                </ul>
              </li>
              @endif 
              @endif 
              @endif 
            
            </ul>   
        </div>       
        </div>  
        @include('partials.login')
        @include('partials.register')       
    </nav>
    <div class="container">
     
                
      
        @yield('content')
        <div class="footer">
                    <!--Credits:&nbsp;
                    <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&amp;utm_medium=github&amp;utm_campaign=laravel_boilerplate&amp;utm_content=credits" target="_blank" title="Online Software License Management"><i class="fa fa-lock" aria-hidden="true"></i>NetLicensing</a>&nbsp;&bull;&nbsp;
                    <a href="https://photolancer.zone/?utm_source=Laravel_Boilerplate&amp;utm_medium=github&amp;utm_campaign=laravel_boilerplate&amp;utm_content=credits" target="_blank" title="Individual digital content for your next campaign"><i class="fa fa-camera-retro" aria-hidden="true"></i>Photolancer Zone</a>
                    -->   
                
        </div>
    </div>
    @yield('scripts')  
    {{-- <script src="assets/app/js/jquery-3.2.1.min.js"></script>
    <script src="assets/app/js/bootstrap.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>

</html>

