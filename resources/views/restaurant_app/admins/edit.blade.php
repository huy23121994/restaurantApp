@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm tài khoản mới</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<div class="col-xs-12 col-sm-6">
        		@include('restaurant_app.admins.form_new', ['action' => route('admins.update',[getWorkspaceUrl(), $admin->id])] )
			</div>
	  	</div>
      </div>
    </div>
</div>
@endsection