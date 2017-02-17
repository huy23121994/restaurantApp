@extends('layouts.master')

@section('body_class','login')

@section('add_css')
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
@endsection

@section('main')
	<div>
      <div class="login_wrapper">
        <div class="form">
          <section class="login_content">

				@yield('content')

			    <div>
			      <h1 style="position: relative;"><a href="{{ url('/') }}" data-no-turbolink><i class="fa fa-paw"></i> YumYum!</a></h1>
			      <p>©2016 All Rights Reserved. Privacy and Terms</p>
			    </div>
			  </div>
          </section>
        </div>
      </div>
    </div>
@endsection

@section('bottom_js')
	<script src="/js/template.js"></script>
  	<script src="/js/common.js"></script>
@endsection