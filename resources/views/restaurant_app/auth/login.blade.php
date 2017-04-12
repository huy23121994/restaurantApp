@extends('restaurant_app.layouts.auth')

@section('content')
	<form action="/{{ $workspace->url }}/login" method="POST">
		{{ csrf_field() }}
	  	<h1>{{ $workspace->name }}</h1>
		@if(session()->has('errors')) 
		    <div class="text-left">
		        <ul>
		        	<li class="text-danger">* {{ session()->get('errors') }}</li>
		        </ul>
		    </div>
		@endif
	  	<div>
		  	<input type="text" class="form-control" name="username" required="required" value="{{old('username')}}" autofocus>
	  	</div>
	  	<div>
	  		<input type="password" class="form-control" name="password" required="required">
	  	</div>
	  	{{-- <div class="checkbox text-left">
	  		<label>
		  		<input type="checkbox" name=""> Ghi nhớ đăng nhập
	  		</label>
	  	</div> --}}
	  	<div class="text-center">
		    <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Logging...">Login</button>
	  	</div>
	</form>

@endsection