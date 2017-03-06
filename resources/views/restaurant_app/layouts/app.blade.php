@extends('layouts.master')

@section('body_class','nav-md')

@section('add_css')
	<link rel="stylesheet" type="text/css" href="/css/lib/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/pnotify.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/pnotify.buttons.css">
    <link href="/css/lib/green.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
@endsection

@section('top_js')
	<script src="/js/lib/jquery.dataTables.min.js"></script>
	<script src="/js/lib/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
	<script src="/js/lib/parsley.min.js"></script>
	<script src="/js/lib/select2.min.js"></script>
	<script src="/js/lib/pnotify.js"></script>
	<script src="/js/lib/pnotify.buttons.js"></script>
    <script src="/js/lib/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
  	<script src="/js/lib/moment.min.js"></script>
  	<script src="/js/lib/daterangepicker.js"></script>
  	<!-- jquery.inputmask -->
  	<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@endsection

@section('main')
	<div class="container body">
		<div class="main_container">
			@include('restaurant_app.sidebar')

			@include('restaurant_app.top')

			<div class="right_col" role="main">
				@yield('content')
			</div>

			@include('restaurant_app.footer')

		</div>
	</div>
@endsection

@section('bottom_js')
	<script src="/js/template.js"></script>
	<script src="/js/restaurant.js"></script>
@endsection