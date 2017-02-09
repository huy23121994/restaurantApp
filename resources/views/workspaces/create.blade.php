@extends('layouts.auth')

@section('content')
	<div class="top flex">
		<div class="wr">
			<h3>Create a new workspace</h3>
		</div>
	</div>
	<div class="main">
		<form action="{{ route('workspaces.store') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $current_user->id }}" name="user_id">
			<div class="form-group">
			    <label for="name">Restaurant name</label>
			    <input type="text" class="form-control" id="fullname" placeholder="your-restaurant-name" name="name">
			</div>
			<div class="form-group">
			    <label for="description">Description</label>
			    <input type="text" class="form-control" id="fullname" placeholder="description" name="description">
			</div>
			<div class="form-group">
			    <label for="url">Access link address</label>
			    <div class="input-group">
				  <span class="input-group-addon" id="sizing-addon2">{{ url('/') }}/</span>
				  <input type="text" class="form-control" id="fullname" placeholder="description" name="url">
				</div>
			</div>
			<div class="form-group">
			    <label for="avatar">
			    	Avatar
			    	<div class="img-preview" style="height:100px;overflow:hidden;">
			    		<img src="/img/cover_default.jpg" alt="" class="img-thumbnail">
			    	</div>
			    </label>
			    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*" >
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
@endsection