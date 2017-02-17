@extends('layouts.master')

@section('add_css')
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/lib/cropper.css">
@endsection

@section('top_js')
    <script src="/js/lib/passwordStrength.js"></script>
    <script src="/js/lib/cropper.min.js"></script>
    <script src="/js/auth.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
@endsection

@section('body_class','auth')

@section('main')
    <header class="container-fluid">
        <nav>
            <div class="nav-left pull-left">
                <a href="/">RestaurantApp</a>
            </div>
            <div class="nav-right pull-right">
                <ul>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <div title="Account Settings">
                                <a href="{{ route('profile.edit') }}" class="circle">
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
                                <a href="{{ route('workspaces.index') }}" class="circle">
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
                            <a href="{{ route('workspaces.index') }}"><img src="{{ $current_user->avatar }}" alt="" width="75" height="75" class="img-rounded"></a>
                            <a href="{{ route('workspaces.index') }}">{{ $current_user->fullname }}</a>
                        </div>
                    </div>
                    <ul class="menu">
                        <li class="{{ $w or '' }}"><a href="{{ route('workspaces.index') }}">App WorkSpaces</a></li>
                        <li class="{{ $p or '' }}"><a href="{{ route('profile.edit') }}">Account Setting</a></li>
                    </ul>
                </div>
                <div class="wrapper-right">
                    <div id="content">
                        @yield('content')
                    </div>

                </div>
            </div>
        </section>
        
                    <footer>
                        <p class="pull-left">© 2017 BaoHuy Company Inc.</p>
                        <ul class="pull-right">
                            <li><a href="">Blog</a></li>
                            <li><a href="https://facebook.com/baohuy23121994">Facebook</a></li>
                            <li><a href="mailto:huytb.contac@gmail.com">Email</a></li>
                            <li><a href="">Website</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </footer>
    @else
        @yield('content')
    @endif
@endsection