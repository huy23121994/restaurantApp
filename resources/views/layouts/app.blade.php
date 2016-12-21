@extends('layouts.master')

@section('body_class','nav-md')

@section('add_css')
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/pnotify.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/pnotify.buttons.css">
	<link rel="stylesheet" type="text/css" href="/css/lib/font-awesome.min.css">
@endsection

@section('top_js')
	<script src="/js/lib/jquery.dataTables.min.js"></script>
	<script src="/js/lib/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
	<script src="/js/lib/parsley.min.js"></script>
	<script src="/js/lib/select2.min.js"></script>
	<script src="/js/lib/pnotify.js"></script>
	<script src="/js/lib/pnotify.buttons.js"></script>
@endsection

@section('main')
	<div class="container body">
		<div class="main_container">
			@include('app.sidebar')

			@include('app.top')

			<div class="right_col" role="main">
				@yield('content')
			</div>

			@include('app.footer')

		</div>
	</div>
@endsection

@section('bottom_js')
	<!-- bootstrap-daterangepicker -->
    <script src="/js/lib/moment.min.js"></script>
    <script src="/js/lib/daterangepicker.js"></script>

	<script src="/js/template.js"></script>
    <script src="/js/common.js"></script>
@endsection