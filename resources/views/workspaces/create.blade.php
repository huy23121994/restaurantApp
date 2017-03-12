@extends('workspaces.layout')

@section('workspace_title', 'Create a new workspace')

@section('workspace_content')
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
	<form action="{{ route('workspaces.store') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" value="{{ $current_user->id }}" name="user_id">
		<div class="form-group">
		    <label for="name">Restaurant name</label>
		    <input type="text" class="form-control" id="name" placeholder="your-restaurant-name" name="name" value="{{ old('name') }}">
		</div>
		<div class="form-group">
		    <label for="description">Description</label>
		    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="{{ old('description') }}">
		</div>
		<div class="form-group">
		    <label for="url">Access link address</label>
		    <div class="input-group">
			  <span class="input-group-addon" id="sizing-addon2">{{ url('/') }}/</span>
			  <input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{ old('url') }}">
			</div>
		</div>
		<div class="form-group">
		    <label for="avatar">
		    	Avatar
		    	<div class="img-preview" style="height:100px;overflow:hidden;">
		    		<img src="/img/workspace_avatar_default.jpg" alt="" class="img-thumbnail">
		    	</div>
		    </label>
		    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*">
		</div>
		<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing..." class="btn btn-primary">Create</button>
	</form>
@endsection
