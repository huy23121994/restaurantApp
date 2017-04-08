@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm món ăn mới</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<div class="col-xs-12 col-sm-6">
	            <form action="{{ route('foods.store',[getWorkspaceUrl()]) }}" enctype="multipart/form-data" method="POST">
				  	{{ csrf_field() }}
				  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				    	<label>Tên món ăn</label>
				    	<input type="text" class="form-control" name="name" placeholder="Tên món ăn">
				    	@if($errors->has('name'))
				    		<span class="help-block">{{ $errors->first('name') }}</span>
				    	@endif
				  	</div>
				  	<div class="form-group {{ $errors->has('food_id') ? 'has-error' : '' }}">
				    	<label>Mã món ăn</label>
				    	<input type="text" class="form-control" name="food_id" placeholder="Mã món ăn">
				    	@if($errors->has('food_id'))
				    		<span class="help-block">{{ $errors->first('food_id') }}</span>
				    	@endif
				  	</div>
				  	<div class="form-group">
				    	<label>Thông tin bổ sung</label>
				    	<textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3"></textarea>
				  	</div>
				  	<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
				    	<label for="avatar">Ảnh đại diện<br>
				    		<img src="/img/food_default.jpg" class="avatar_preview" width="200">
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
</div>
@endsection