@extends('restaurant_app.layouts.app')

@section('content')
	<div class="x_panel">
		<div class="x_title">
            <h2>Thêm nhà hàng mới</h2>
            <div class="clearfix"></div>
        </div>
	  	<div class="x_content">
	  		<div class="col-xs-12 col-sm-6">
				<form action="{{ route('restaurants.store',[getWorkspaceUrl()]) }}" enctype="multipart/form-data" method="POST">
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
				    	<input type="text" class="form-control" name="location" placeholder="Địa chỉ" id="map-search">
				    	<input type="hidden" name="lat" class="lat">
				    	<input type="hidden" name="lng" class="lng">
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
				  	<button type="button" onclick="$('form').submit()" class="btn btn-success">Đăng ký</button>
				</form>
	  		</div>
	  		<div class="col-xs-12 col-sm-5 col-sm-offset-1">
	  			<div id="map"></div>
	  		</div>
	  	</div>
	</div>
@endsection