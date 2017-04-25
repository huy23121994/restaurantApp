@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thông tin tài khoản</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          @if(session('notice-success'))
            <p class="text-success">* {{ session('notice-success') }}</p>
          @endif
          @if(session('notice-fail'))
            <p class="text-danger">* {{ session('notice-fail') }}</p>
          @endif
          <blockquote>
            <small>Tên đăng nhập: <span class="text-primary">{{ $admin->username }}</span></small>
            <small>Mật khẩu: <span class="text-primary">{{ $admin->password }}</span></small>
            <small>Quyền: <span class="text-primary">{{ $admin->role->name }}</span></small>
            <small>Nhà hàng làm việc: <span class="text-primary">
            	@if($admin->restaurant)
		            {{ $admin->restaurant->name }}
            	@endif
            </span></small>
          </blockquote>
          <a href="{{ route('admins.edit',[getWorkspaceUrl(), $admin->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
          <button class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-trash"></i> Xóa</button>
          @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('admins.destroy',[getWorkspaceUrl(), $admin->id]) , 'delete_id' => $admin->id ])
  	  	</div>
      </div>
    </div>
</div>
@endsection