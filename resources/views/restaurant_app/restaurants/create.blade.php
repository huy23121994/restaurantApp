@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<form action="{{ route('restaurants.store',['workspace'=>session('workspace')->url]) }}" enctype="multipart/form-data" method="POST">
				  	{{ csrf_field() }}
				  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				    	<label>Tên nhà hàng</label>
				    	<input type="text" class="form-control" name="name" placeholder="Tên nhà hàng">
				    	@if($errors->has('name'))
				    		<span class="help-block">{{ $errors->first('name') }}</span>
				    	@endif
				  	</div>
				  	<div class="form-group">
				    	<label>Thông tin bổ sung</label>
				    	<textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3"></textarea>
				  	</div>
				  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				    	<label>Địa chỉ</label>
				    	<input type="text" class="form-control" name="location" placeholder="Địa chỉ">
				    	@if($errors->has('location'))
				    		<span class="help-block">{{ $errors->first('location') }}</span>
				    	@endif
				  	</div>
				  	<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
				    	<label for="avatar">Ảnh đại diện<br>
				    		<img src="/img/restaurant_avatar_default.jpg" class="avatar_preview" width="200">
				    	</label>
				    	<input type="file" name="avatar" id="avatar" data-img=".avatar_preview" class="need_preview" accept="image/*">
				    	@if($errors->has('avatar'))
				    		<span class="help-block">{{ $errors->first('avatar') }}</span>
				    	@endif
				  	</div>
				  	<button type="submit" class="btn btn-success">Đăng ký</button>
				</form>
		  	</div>
		</div>
	</div>
</div>
@endsection