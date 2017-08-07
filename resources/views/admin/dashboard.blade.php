@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Total registered users</span>
            <div class="count green">{{ $counts['users'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-address-card"></i> Unconfirmed users</span>
            <div class="count">{{ $counts['users_unconfirmed'] }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i> Inactive users</span>
            <div class="count">{{ $counts['users_inactive'] }}</div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Log Activities</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="date_piker pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span class="date_piker_label">
                                {{ \Carbon\Carbon::now()->addDays(-6)->format('F j, Y') }} - {{ \Carbon\Carbon::now()->format('F j, Y') }}
                            </span>
                            <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2>Log levels</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>Emergency</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-emergency" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Alert</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-alert" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Critical</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-critical" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Error</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="asdasdasd"></div>
                                    <div class="progress-bar log-error" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Warning</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-warning" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Notice</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-notice" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Info</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-info" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Debug</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-debug" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    <div class="row">


        {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
            {{--<div class="x_panel tile fixed_height_320">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>App Versions</h2>--}}
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="#">Settings 1</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Settings 2</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<h4>App Usage across versions</h4>--}}
                    {{--<div class="widget_summary">--}}
                        {{--<div class="w_left w_25">--}}
                            {{--<span>0.1.5.2</span>--}}
                        {{--</div>--}}
                        {{--<div class="w_center w_55">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">--}}
                                    {{--<span class="sr-only">60% Complete</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="w_right w_20">--}}
                            {{--<span>123k</span>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                    {{--<div class="widget_summary">--}}
                        {{--<div class="w_left w_25">--}}
                            {{--<span>0.1.5.3</span>--}}
                        {{--</div>--}}
                        {{--<div class="w_center w_55">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">--}}
                                    {{--<span class="sr-only">60% Complete</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="w_right w_20">--}}
                            {{--<span>53k</span>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="widget_summary">--}}
                        {{--<div class="w_left w_25">--}}
                            {{--<span>0.1.5.4</span>--}}
                        {{--</div>--}}
                        {{--<div class="w_center w_55">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">--}}
                                    {{--<span class="sr-only">60% Complete</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="w_right w_20">--}}
                            {{--<span>23k</span>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="widget_summary">--}}
                        {{--<div class="w_left w_25">--}}
                            {{--<span>0.1.5.5</span>--}}
                        {{--</div>--}}
                        {{--<div class="w_center w_55">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">--}}
                                    {{--<span class="sr-only">60% Complete</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="w_right w_20">--}}
                            {{--<span>3k</span>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="widget_summary">--}}
                        {{--<div class="w_left w_25">--}}
                            {{--<span>0.1.5.6</span>--}}
                        {{--</div>--}}
                        {{--<div class="w_center w_55">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">--}}
                                    {{--<span class="sr-only">60% Complete</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="w_right w_20">--}}
                            {{--<span>1k</span>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>Registration Usage</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <p class="">Source</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <p class="">Progress</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas id="registration_usage" class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0">
                                </canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Registration Form</p>
                                        </td>
                                        <td id="registration_usage_from"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Google </p>
                                        </td>
                                        <td id="registration_usage_google"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>Facebook </p>
                                        </td>
                                        <td id="registration_usage_facebook"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square grren"></i>Twitter </p>
                                        </td>
                                        <td id="registration_usage_twitter"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
            {{--<div class="x_panel tile fixed_height_320">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Quick Settings</h2>--}}
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="#">Settings 1</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Settings 2</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<div class="dashboard-widget-content">--}}
                        {{--<ul class="quick-list">--}}
                            {{--<li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-bars"></i><a href="#">Subscription</a>--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>--}}
                            {{--<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>--}}
                            {{--<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-area-chart"></i><a href="#">Logout</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        {{--<div class="sidebar-widget">--}}
                            {{--<h4>Profile Completion</h4>--}}
                            {{--<canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>--}}
                            {{--<div class="goal-wrapper">--}}
                                {{--<span id="gauge-text" class="gauge-value pull-left">0</span>--}}
                                {{--<span class="gauge-value pull-left">%</span>--}}
                                {{--<span id="goal-text" class="goal-value pull-right">100%</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>


    <div class="row">
        {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
            {{--<div class="x_panel">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Recent Activities <small>Sessions</small></h2>--}}
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="#">Settings 1</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Settings 2</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<div class="dashboard-widget-content">--}}

                        {{--<ul class="list-unstyled timeline widget">--}}
                            {{--<li>--}}
                                {{--<div class="block">--}}
                                    {{--<div class="block_content">--}}
                                        {{--<h2 class="title">--}}
                                            {{--<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>--}}
                                        {{--</h2>--}}
                                        {{--<div class="byline">--}}
                                            {{--<span>13 hours ago</span> by <a>Jane Smith</a>--}}
                                        {{--</div>--}}
                                        {{--<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="block">--}}
                                    {{--<div class="block_content">--}}
                                        {{--<h2 class="title">--}}
                                            {{--<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>--}}
                                        {{--</h2>--}}
                                        {{--<div class="byline">--}}
                                            {{--<span>13 hours ago</span> by <a>Jane Smith</a>--}}
                                        {{--</div>--}}
                                        {{--<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="block">--}}
                                    {{--<div class="block_content">--}}
                                        {{--<h2 class="title">--}}
                                            {{--<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>--}}
                                        {{--</h2>--}}
                                        {{--<div class="byline">--}}
                                            {{--<span>13 hours ago</span> by <a>Jane Smith</a>--}}
                                        {{--</div>--}}
                                        {{--<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="block">--}}
                                    {{--<div class="block_content">--}}
                                        {{--<h2 class="title">--}}
                                            {{--<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>--}}
                                        {{--</h2>--}}
                                        {{--<div class="byline">--}}
                                            {{--<span>13 hours ago</span> by <a>Jane Smith</a>--}}
                                        {{--</div>--}}
                                        {{--<p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-md-8 col-sm-8 col-xs-12">--}}



            {{--<div class="row">--}}

                {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Visitors location <small>geo-presentation</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<div class="dashboard-widget-content">--}}
                                {{--<div class="col-md-4 hidden-small">--}}
                                    {{--<h2 class="line_30">125.7k Views from 60 countries</h2>--}}

                                    {{--<table class="countries_list">--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>United States</td>--}}
                                            {{--<td class="fs15 fw700 text-right">33%</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>France</td>--}}
                                            {{--<td class="fs15 fw700 text-right">27%</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Germany</td>--}}
                                            {{--<td class="fs15 fw700 text-right">16%</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Spain</td>--}}
                                            {{--<td class="fs15 fw700 text-right">11%</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Britain</td>--}}
                                            {{--<td class="fs15 fw700 text-right">10%</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                                {{--<div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="row">--}}


                {{--<!-- Start to do list -->--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>To Do List <small>Sample tasks</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}

                            {{--<div class="">--}}
                                {{--<ul class="to_do">--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Schedule meeting with new client </p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Create email address for new intern</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Have IT fix the network printer</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Copy backups to offsite location</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Create email address for new intern</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Have IT fix the network printer</p>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<p>--}}
                                            {{--<input type="checkbox" class="flat"> Copy backups to offsite location</p>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- End to do list -->--}}

                {{--<!-- start of weather widget -->--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Daily active users <small>Sessions</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-12">--}}
                                    {{--<div class="temperature"><b>Monday</b>, 07:30 AM--}}
                                        {{--<span>F</span>--}}
                                        {{--<span><b>C</b></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<div class="weather-icon">--}}
                                        {{--<canvas height="84" width="84" id="partly-cloudy-day"></canvas>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<div class="weather-text">--}}
                                        {{--<h2>Texas <br><i>Partly Cloudy Day</i></h2>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-12">--}}
                                {{--<div class="weather-text pull-right">--}}
                                    {{--<h3 class="degrees">23</h3>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="clearfix"></div>--}}

                            {{--<div class="row weather-days">--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Mon</h2>--}}
                                        {{--<h3 class="degrees">25</h3>--}}
                                        {{--<canvas id="clear-day" width="32" height="32"></canvas>--}}
                                        {{--<h5>15 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Tue</h2>--}}
                                        {{--<h3 class="degrees">25</h3>--}}
                                        {{--<canvas height="32" width="32" id="rain"></canvas>--}}
                                        {{--<h5>12 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Wed</h2>--}}
                                        {{--<h3 class="degrees">27</h3>--}}
                                        {{--<canvas height="32" width="32" id="snow"></canvas>--}}
                                        {{--<h5>14 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Thu</h2>--}}
                                        {{--<h3 class="degrees">28</h3>--}}
                                        {{--<canvas height="32" width="32" id="sleet"></canvas>--}}
                                        {{--<h5>15 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Fri</h2>--}}
                                        {{--<h3 class="degrees">28</h3>--}}
                                        {{--<canvas height="32" width="32" id="wind"></canvas>--}}
                                        {{--<h5>11 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                    {{--<div class="daily-weather">--}}
                                        {{--<h2 class="day">Sat</h2>--}}
                                        {{--<h3 class="degrees">26</h3>--}}
                                        {{--<canvas height="32" width="32" id="cloudy"></canvas>--}}
                                        {{--<h5>10 <i>km/h</i></h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<!-- end of weather widget -->--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection