@extends('layouts.master')

@section('add_css')
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/lib/cropper.css">
@endsection

@section('top_js')
    <script src="/js/lib/passwordStrength.js"></script>
    <script src="/js/lib/cropper.min.js"></script>
    <script src="/js/auth.js"></script>
@endsection

@section('body_class','auth')

@section('main')
    <header class="container-fluid">
        <nav>
            <div class="nav-left pull-left">
                <a href="">RestaurantApp</a>
            </div>
            <div class="nav-right pull-right">
                <ul>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <div title="Account Settings">
                                <a href="/{{ $current_username }}/edit" class="circle">
                                    <i class="fa fa-cogs"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div title="Sign Out">
                                <a href="{{ url('/logout') }}" class="circle" 
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                </a>
                            </div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <div>
                                <a href="/{{ $current_username }}" class="circle">
                                    <img src="{{ $current_user->avatar }}" class="full_size" alt="">
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </nav>
    </header>
    @if(Auth::check())
        <section class="container-fluid">
            <div class="row">
                <div class="sidebar pull-left">
                    <div class="top">
                        <div class="text-center">
                            <a href="/{{ $current_username }}"><img src="{{ $current_user->avatar }}" alt="" width="75" height="75" class="img-rounded"></a>
                            <a href="/{{ $current_username }}">{{ $current_user->fullname }}</a>
                        </div>
                    </div>
                    <ul class="menu">
                        <li class="{{ $show or '' }}"><a href="/{{ $current_username }}/workspaces">App WorkSpaces</a></li>
                        <li class="{{ $edit or '' }}"><a href="/{{ $current_username }}/edit">Account Setting</a></li>
                    </ul>
                </div>
                <div class="wrapper-right">
                    <div id="content">
                        @yield('content')
                    </div>

                    <footer style="height:50px;" class="white">
                        FOOTER
                    </footer>
                </div>
            </div>
        </section>
    @else
        @yield('content')
    @endif
@endsection