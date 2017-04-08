@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
	<div class="flex">
		<h5 style="margin: 0 0 0 20px;" class="pull-left flex"><u class="center">Danh sách nhân viên</u></h5>
		<div class="x_button_helper">
		  	<a href="http://restaurant.dev/nha-hang-yoyo/employees/create" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<table class="table table-striped" id="datatable">
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
    			<th>Ngày bắt đầu</th>
    			<th>Action</th>
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
        			<td>{{ $employee->work_active->start_date }}</td>
                  	<td>
                    	<a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                    	<a href="{{ route('employees.edit',[getWorkspaceUrl(), $employee->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                  	</td>
        		</tr>
    		@endforeach
		</tbody>
    </table>
@endsection