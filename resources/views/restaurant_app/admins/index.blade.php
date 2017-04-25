@extends('restaurant_app.layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách tài khoản</h2>
          <div class="x_button_helper">
          	<a href="{{ route('admins.create',[session('workspace')->url]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-user-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if(session('notice-success'))
                <p class="text-success">* {{ session('notice-success') }}</p>
            @endif
            @if(session('notice-fail'))
                <p class="text-danger">* {{ session('notice-fail') }}</p>
            @endif
        	<table class="table table-striped" id="datatable">
        		<thead>
	        		<tr>
                		<th>STT</th>
	        			<th>Tên đăng nhập</th>
	        			<th>Mật khẩu</th>
                        <th>Quyền</th>
                        <th>Nhà hàng làm việc</th>
	        			<th>Action</th>
	        		</tr>
        		</thead>
        		<tbody>
        			@foreach($admins as $admin)
		        		<tr>
                  			<td></td>
			                <td>{{ $admin->username }}</td>
		        			<td>{{ $admin->password }}</td>
		        			<td>{{ $admin->role->name }}</td>
                            <td>
                                @if($admin->restaurant)
                                    {{ $admin->restaurant->name }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admins.show',[getWorkspaceUrl(), $admin->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admins.edit',[getWorkspaceUrl(), $admin->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $admin->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
                                @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('admins.destroy',[getWorkspaceUrl(), $admin->id]) , 'delete_id' => $admin->id ])
                            </td>
		        		</tr>
	        		@endforeach
        		</tbody>
		    </table>
        </div>
      </div>
    </div>
  </div>
@endsection