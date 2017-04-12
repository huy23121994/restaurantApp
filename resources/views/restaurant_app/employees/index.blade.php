@extends('restaurant_app.layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách nhân viên</h2>
          <div class="x_button_helper">
          	<a href="{{ route('employees.create',[session('workspace')->url]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-user-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<table class="table table-striped">
        		<thead>
	        		<tr>
	        			<th class="hide">url</th>
	        			<th width="40">Avatar</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
	        			<th width="40">Tuổi</th>
	        			<th>Số điện thoại</th>
	        			<th>Email</th>
                <th>Số CMND</th>
	        			<th>Giới tính</th>
	        			<th>Action</th>
	        		</tr>
        		</thead>
        		<tbody>
        			@foreach($employees as $employee)
		        		<tr>
		        			<td class="hide">{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}</td>
		        			<td class="has_img">
                    <a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}">
                      <img src="{{ $employee->avatar }}" height="40">
                    </a>
                  </td>
		        			<td><a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}">
		        				<u class="text-primary">{{ $employee->fullname }}</u>
		        			</a></td>
                  <td>{{ $employee->birthday }}</td>
                  <td>{{ $employee->get_age() }}</td>
		        			<td>{{ $employee->phone }}</td>
		        			<td>{{ $employee->email }}</td>
		        			<td>{{ $employee->people_id }}</td>
		        			<td>{{ $employee->gender }}</td>
                  <td>
                    <a href="{{ route('works.index',[getWorkspaceUrl(), $employee->id]) }}" class="btn btn-info btn-xs" title="Xem công việc của {{ $employee->fullname }}"><i class="fa fa-briefcase"></i></a>
                    <a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('employees.edit',[getWorkspaceUrl(), $employee->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $employee->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
                    @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('employees.destroy',[getWorkspaceUrl(), $employee->id]) , 'delete_id' => $employee->id ])
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