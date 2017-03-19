@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
	<div class="row">
		<div class="col-sm-6">
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
			    		<img src="{{ $restaurant->avatar }}" class="avatar_preview" width="200">
			    	</label>
			    	<input type="file" name="avatar" id="avatar" data-img=".avatar_preview" class="need_preview" accept="image/*">
			    	@if($errors->has('avatar'))
			    		<span class="help-block">{{ $errors->first('avatar') }}</span>
			    	@endif
			  	</div>
			  	<button type="submit" class="btn btn-success">Cập nhật</button>
			  	<button type="button" class="btn btn-danger pull-right" data-toggle="modal" aria-pressed="true" data-target=".modal.confirm"><i class="fa fa-trash"></i> Delete restaurant</button>
			</form>

			<!-- DELETE MODAL -->
			<div class="modal fade confirm" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			       <div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title">Delete confirmation</h4>
			      	</div>
			      	<div class="modal-body">
			      		<form class="hide" id="delete-ws" action="{{ route('restaurants.destroy',[getWorkspaceUrl(), $restaurant->id]) }}" method="POST">
			      			{{ csrf_field() }}
							{{ method_field('DELETE') }}
			      		</form>
			        	<div class="text-center">
			        		<button type="submit" class="btn btn-danger" onclick="$('form#delete-ws').submit()">Yes. I'm sure</button>
			        		<button class="btn btn-default" data-dismiss="modal">Cancle</button>
			        	</div>
			      	</div>
			    </div>
			  </div>
			</div>
			<!-- END MODAL -->
		</div>
	</div>
@endsection