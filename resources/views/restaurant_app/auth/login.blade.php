@extends('restaurant_app.layouts.auth')

@section('content')
	<form action="/{{ $workspace->url }}/login" method="POST">
		{{ csrf_field() }}
	  	<h1>{{ $workspace->name }}</h1>
		@if(false) 
		    <div class="text-left">
		        <ul>
		        	<li><%= flash[:danger] %></li>
		        </ul>
		    </div>
		@endif
	  	<div>
		  	<input type="text" class="form-control" name="" required="required" autofocus>
	  	</div>
	  	<div>
	  		<input type="password" class="form-control" name="" required="required">
	  	</div>
	  	{{-- <div class="checkbox text-left">
	  		<label>
		  		<input type="checkbox" name=""> Ghi nhớ đăng nhập
	  		</label>
	  	</div> --}}
	  	<div class="text-center">
		    <button type="submit" class="btn btn-success">Login</button>
	  	</div>
	</form>

@endsection