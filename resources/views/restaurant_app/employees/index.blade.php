@extends('restaurant_app.layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách nhân viên</h2>
          <div class="x_button_helper">
          	<a href="{{ route('employees.create',[session('workspace')->url]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<table id="datatable" class="table table-striped table-bordered">
        		<thead>
	        		<tr>
	        			<th>url</th>
	        			<th width="40">Avatar</th>
	        			<th>Họ tên</th>
	        			<th width="40">Tuổi</th>
	        			<th>Số điện thoại</th>
	        			<th>Email</th>
	        			<th>Ngày bắt đầu</th>
	        			<th>Trạng thái</th>
	        		</tr>
        		</thead>
        		<tbody>
        			@foreach($employees as $employee)
		        		<tr>
		        			<td>{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}</td>
		        			<td class="has_img"><img src="/img/user.png" height="40"></td>
		        			<td><a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}">
		        				<u class="text-success">{{ $employee->fullname }}</u>
		        			</a></td>
		        			<td>{{ $employee->get_age() }}</td>
		        			<td>{{ $employee->phone }}</td>
		        			<td>{{ $employee->email }}</td>
		        			<td></td>
		        			<td><button class="btn btn-primary btn-xs">Đang làm việc</button></td>
		        		</tr>
	        		@endforeach
        		</tbody>
			</table>
        </div>
      </div>
    </div>
  </div>
@endsection