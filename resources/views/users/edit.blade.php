@extends('layouts.auth')

@section('content')
	<div class="top flex">
		<div class="wr">
			<h3>{{ $current_user->fullname }}</h3>
			<p>Account Settings</p>
		</div>
	</div>
	<div class="main">
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
		<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" name="id" value="{{ $current_user->id }}">
			<div class="form-group">
			    <label for="fullname">Full Name</label>
			    <input type="text" class="form-control" id="fullname" value="{{ $current_user->fullname }}" name="fullname">
			</div>
			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" value="{{ $current_user->username }}" name="username" readonly>
			</div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" value="{{ $current_user->email }}" name="email" readonly>
			</div>
			<div class="form-group">
			    <label for="avatar">
			    	Avatar
			    	<div class="img-preview" style="width:100px;height:100px;overflow:hidden;">
			    		<img src="{{ $current_user->avatar }}" alt="" class="img-thumbnail">
			    	</div>
			    </label>
			    <input type="file" id="avatar" data-img=".avatar_preview" class="need_preview" name="avatar" accept="image/*" >

			    <!-- MODAL -->
			    <div class="modal fade" id="crop_avatar_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Crop your avatar</h4>
				      </div>
				      <div class="modal-body">
				      	<div class="row">
				      		<div class="col-sm-8">
				      			<img src="{{ $current_user->avatar }}" class="cropper avatar_preview" alt="">
				      		</div>
				      		<div class="col-sm-4">
				      			<strong>Preview</strong>
				      			<div class="img-preview" style="width:100px;height:100px;overflow:hidden;">
						    		<img src="{{ $current_user->avatar }}" alt="" class="img-thumbnail">
						    	</div>
						    	<input type="hidden" name="crop_x">
						    	<input type="hidden" name="crop_y">
						    	<input type="hidden" name="crop_width">
						    	<input type="hidden" name="crop_height">
				      		</div>
				      	</div>
				      </div>
				      <div class="modal-footer">
				      	<div class="row">
				      		<div class="col-xs-6 text-left">
						        <label for="avatar" class="btn btn-primary"><i class="fa fa-refresh"></i></label>
				      		</div>
				      		<div class="col-xs-6">
						        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Save</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
				        </div>
				      	</div>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

			</div>
			<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Updating..." class="btn btn-primary">Update infomations</button>
		</form>
		<hr>
		<form action="">
			<h4>Change password</h4>
			<div class="form-group">
			    <label for="old-password">Old password</label>
			    <input type="password" class="form-control" id="old-password" name="old-password">
			</div>
			<div class="form-group">
			    <label for="new-password">New password</label>
			    <input type="password" class="form-control" id="new-password" name="new-password">
			</div>
			<div class="form-group">
			    <label for="password-confirm">Confirm new password</label>
			    <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
			</div>
		</form>
	</div>
@endsection
