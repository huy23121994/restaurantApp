
<form action="{{ $action }}" enctype="multipart/form-data" method="POST">
  	{{ csrf_field() }}
  	{{ isset($food) ? method_field('PUT') : ''}}
  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    	<label>Tên món ăn</label>
    	<input type="text" class="form-control" name="name" placeholder="Tên món ăn" value="{{ isset($food) ? $food->name : old('name') }}">
    	@if($errors->has('name'))
    		<span class="help-block">{{ $errors->first('name') }}</span>
    	@endif
  	</div>
  	<div class="form-group {{ $errors->has('food_id') ? 'has-error' : '' }}">
    	<label>Mã món ăn</label>
    	<input type="text" class="form-control" name="food_id" placeholder="Mã món ăn" value="{{ isset($food) ? $food->food_id : old('food_id') }}">
    	@if($errors->has('food_id'))
    		<span class="help-block">{{ $errors->first('food_id') }}</span>
    	@endif
  	</div>
  	<div class="form-group">
    	<label>Thông tin bổ sung</label>
    	<textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3">{{ isset($food) ? $food->description : old('description') }}</textarea>
  	</div>
  	<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    	<label for="avatar">Ảnh đại diện<br>
    		<img src="{{ isset($food) ? $food->avatar : '/img/food_default.jpg' }}" class="avatar_preview" width="200">
    	</label>
    	<input type="file" name="avatar" id="avatar" data-img=".avatar_preview" class="need_preview" accept="image/*">
    	@if($errors->has('avatar'))
    		<span class="help-block">{{ $errors->first('avatar') }}</span>
    	@endif
  	</div>
  	@if( currentRouteName() == 'foods.create')
	  	<button type="submit" class="btn btn-success">Đăng ký</button>
  	@else
	  	<button type="submit" class="btn btn-success">Cập nhật</button>
  	@endif
</form>