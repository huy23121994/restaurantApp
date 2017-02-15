@extends('layouts.auth')

@section('content')
	<div class="top flex">
		<div class="wr">
			<h3>{{ $workspace->name }}</h3>
		</div>
	</div>
	<div class="main" id="show-workspace">
		@if (count($errors) > 0)
		    <div class="alert alert-danger alert-dismissible fade in">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		@if (session('status'))
		    <div class="alert alert-success alert-dismissible fade in">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		        {{ session('status') }}
		    </div>
		@endif
		<form action="{{ route('workspaces.update', [$workspace->url]) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" value="{{ $workspace->id }}" name="user_id">
			<div class="form-group">
			    <label for="name">Restaurant name</label>
			    <input type="text" class="form-control" id="name" placeholder="your-restaurant-name" name="name" value="{{ $workspace->name }}">
			</div>
			<div class="form-group">
			    <label for="description">Description</label>
			    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="{{ $workspace->description }}">
			</div>
			<div class="form-group" id="access-link">
			    <label for="url">Access link address</label>
			    <div class="input-group">
				  <span class="input-group-addon">{{ url('/') }}/</span>
				  <input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{ $workspace->url }}">
				  <div class="text-primary access-link"><a href="{{ url('/'.$workspace->url) }}">Access <i class="fa fa-external-link"></i></a></div>
				</div>
			</div>
			<div class="form-group">
			    <label for="avatar">
			    	Avatar
			    	<div class="img-preview" style="height:100px;overflow:hidden;">
			    		<img src="{{ $workspace->avatar }}" alt="" class="img-thumbnail">
			    	</div>
			    </label>
			    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*" >
			</div>
			<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Updating..."  class="btn btn-primary">Update Workspace</button>
		</form>
	</div>
@endsection
