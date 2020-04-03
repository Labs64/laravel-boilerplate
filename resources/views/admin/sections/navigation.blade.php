<div class="col-md-3 left_col" style="background-color:black">
    <div class="left_col scroll-view" style="background-color:black">
        <div class="navbar nav_title" style="border: 0; background-color:black">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix" style="background-color:black">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="background-color:black">
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_1') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.packages.index') }}">
                            <i class="fa fa-th-large" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_packages') }}
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            Booking
                        </a>
                    </li>
                
                    <li>
                        <a href="{{ route('admin.users.restore') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_3') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.permissions') }}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_2') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_2') }}</h3>

                <ul class="nav side-menu">
                    <li>
                        <a>
                            <i class="fa fa-list"></i>
                            {{ __('views.backend.section.navigation.menu_2_1') }}
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('log-viewer::dashboard') }}">
                                    {{ __('views.backend.section.navigation.menu_2_2') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('log-viewer::logs.list') }}">
                                    {{ __('views.backend.section.navigation.menu_2_3') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_3') }}</h3>
                <ul class="nav side-menu">
                  <li>
                      <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=credits" target="_blank" title="Online Software License Management"><i class="fa fa-lock" aria-hidden="true"></i>NetLicensing</a>
                  </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
