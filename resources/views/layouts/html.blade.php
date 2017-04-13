<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}
        @meta

        {{--Common Styles--}}
        {{ Html::style(mix('css/plugins.css')) }}
        {{ Html::style(mix('css/theme.css')) }}
        {{ Html::style(mix('css/app.css')) }}

        {{--Header Styles--}}
        @yield('styles_header')

        {{--Header Scripts--}}
        @yield('scripts_header')
    </head>
    <body class="@yield('body_class')">

        {{--Region Top Header--}}
        @yield('header_top')

        {{--Region Header--}}
        @yield('header')

        {{--Region Left Sidebar--}}
        @yield('sidebar_left')

        {{--Region Content--}}
        @yield('content')

        {{--Region Right Sidebar--}}
        @yield('sidebar_right')

        {{--Region Footer--}}
        @yield('footer')

        {{--Region Bottom Footer--}}
        @yield('footer_bottom')

        {{--Footer Styles--}}
        @yield('styles_footer')

        {{--Footer Scripts--}}
        @yield('scripts_footer')

        {{--Common Scripts--}}
        {{ Html::script(mix('js/core.js')) }}
        {{ Html::script(mix('js/plugins.js')) }}
        {{ Html::script(mix('js/app.js')) }}

       {{--Laravel Js Variables--}}
        @tojs
    </body>
</html>
