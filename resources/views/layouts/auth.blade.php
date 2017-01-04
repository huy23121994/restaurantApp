@extends('layouts.master')

@section('add_css')
    <link rel="stylesheet" href="/css/auth.css">
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
                                    <img src="/img/user.png" class="full_size" alt="">
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </nav>
    </header>
    <section class="container-fluid">
        <div class="sidebar">
            ed
        </div>
        <div class="wrapper-right">
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </section>
@endsection