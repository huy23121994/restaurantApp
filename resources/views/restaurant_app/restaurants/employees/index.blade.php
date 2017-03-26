@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
	<div class="flex">
		<h5 style="margin: 0 0 0 20px;" class="pull-left flex"><u class="center">Danh sách nhân viên</u></h5>
		<div class="x_button_helper">
		  	<a href="http://restaurant.dev/nha-hang-yoyo/employees/create" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<table class="table table-striped">
		<thead>
    		<tr>
    			<th class="hide">url</th>
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
        			<td class="hide">{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}</td>
        			<td class="has_img">
            			<a href="{{ route('employees.show',[getWorkspaceUrl(), $employee->id]) }}">
              				<img src="{{ $employee->avatar }}" height="40">
            			</a>
         			</td>
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
@endsection