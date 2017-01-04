@extends('layouts.auth')

@section('content')
	<ul>
		<li>{{ $current_user->username }}</li>
		<li>{{ $current_user->fullname }}</li>
		<li>{{ $current_user->email }}</li>
		<li>{{ $current_user->phone }}</li>
		<li>{{ $current_user->address }}</li>
	</ul>
@endsection