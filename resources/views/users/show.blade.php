@extends('layouts.auth')

@section('content')
	<div class="row">
		<div class="col-sm-6">
			<img src="/img/cropper.jpg" alt="" class="cropper">
		</div>
	</div>
	
	<ul>
		<li>{{ $current_user->username }}</li>
		<li>{{ $current_user->fullname }}</li>
		<li>{{ $current_user->email }}</li>
		<li>{{ $current_user->phone }}</li>
		<li>{{ $current_user->address }}</li>
	</ul>
@endsection