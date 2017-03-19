@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
	<form action="{{ route('restaurants.update',['workspace' => getWorkspaceUrl(), 'restaurant' => $restaurant->id]) }}" method="POST" enctype="multipart/form-data">
	  	{{ csrf_field() }}
	  	{{ method_field('PUT') }}
	  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	    	<label>Tên nhà hàng</label>
	    	<input type="text" class="form-control" name="name" placeholder="Tên nhà hàng" value="{{ $restaurant->name }}">
	    	@if($errors->has('name'))
	    		<span class="help-block">{{ $errors->first('name') }}</span>
	    	@endif
	  	</div>
	  	<div class="form-group">
	    	<label>Thông tin bổ sung</label>
	    	<textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3">{{ $restaurant->description }}</textarea>
	  	</div>
	  	<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
	    	<label>Địa chỉ</label>
	    	<input type="text" class="form-control" name="location" placeholder="Địa chỉ" value="{{ $restaurant->location }}">
	    	@if($errors->has('location'))
	    		<span class="help-block">{{ $errors->first('location') }}</span>
	    	@endif
	  	</div>
	  	<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
	    	<label for="avatar">Ảnh đại diện<br>
	    		<img src="{{ $restaurant->avatar }}" width="200">
	    	</label>
	    	<input type="file" name="avatar" id="avatar">
	    	@if($errors->has('avatar'))
	    		<span class="help-block">{{ $errors->first('avatar') }}</span>
	    	@endif
	  	</div>
	  	<button type="submit" class="btn btn-success">Đăng ký</button>
	</form>
@endsection