<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('packages/bootstrap-3.3.5/css/bootstrap.min.css') !!}
    {!! Html::style('styles/index.css') !!}
    {!! Html::style('packages/font-awesome-4.1.0/css/font-awesome.min.css') !!}
    @yield('styles')

    {!! Html::script('scripts/jquery-1.11.3.min.js') !!}
    @yield('scripts')
</head>
<body>
    <header class="navbar navbar-default navbar-static-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Forums</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>{!! Html::link('', _('Index')) !!}</li>
                <li>{!! Html::linkRoute('forums.index', _('Forums')) !!}</li>
            </ul>
            @if (Auth::check())
                <div id="nav-profile" class="navbar-right">
                    <i class="fa fa-bell nav-search"></i>
                    <i class="fa fa-search nav-search" id="nav-search-icon"></i>
                    {!! Html::imageExists('images/avatars/'.Auth::user()->slug.'/'.Auth::user()->slug.'-small.jpg', Auth::user()->username, ['id' => 'nav-avatar']) !!}
                    <div id="nav-profile-links">
                        {!! Html::uLinkRoute('users.show', Auth::user()->username.' <i class="fa fa-caret-down"></i>', ['user' => Auth::user()->slug]) !!}
                        <br>
                    </div>
                </div>
            @else
                <ul class="nav navbar-right navbar-nav">
                    <li>{!! Html::uLinkRoute('auth.login', 'Login') !!}</li>
                    <li>{!! Html::uLinkRoute('auth.register', 'Register') !!}</li>
                </ul>
            @endif
        </div>
    </div>
    <div id="breadcrumbs">
        <div class="container">
            @yield('breadcrumbs')
        </div>
    </div>
    </header>
    <div class="container">
    {!! Html::flash() !!}
    @yield('content')
    </div>
    <hr/>
    <div class="container">
    <div class="pull-left" style="padding-top: 10px">{{ _('Kaamaru\Forums') }}</div>
    <ul class="nav nav-pills pull-left">
        @if (\Auth::check())
            <li>{!! Html::linkRoute('auth.logout', _('Logout'), ['_token' => csrf_token()]) !!}</li>
        @endif
    </ul>
    </div>
    </body>
</html>
