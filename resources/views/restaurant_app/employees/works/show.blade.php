@extends('restaurant_app.employees.layout')

@section('employee_content')
	<blockquote>
		<p>Thông tin công việc</p>
		<small>Nhà hàng: <a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$work->restaurant->id]) }}" class="text-primary"><u>{{ $work->restaurant->name }}</u></a></small>
		<small>Địa chỉ: <span class="text-primary">{{ $work->restaurant->location['title'] }}</span></small>
		<small>Ngày bắt đầu làm việc: <span class="text-primary">{{ $work->start_date }}</span></small>
		<small>Ngày thôi việc: <span class="text-primary">{{ $work->end_date }}</span></small>
		<small>Trạng thái: {!! $work->status ? '<span class="text-success"><i class="fa fa-check"></i> Đang làm việc' : '<span class="text-danger"><i class="fa fa-times"></i> Đã thôi việc</span>' !!}</small>
		<br>
		<a href="{{ route('works.edit',[getWorkspaceUrl(),$employee->id, $work->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
	  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm" title="Xóa"><i class="fa fa-trash"></i> Xóa</button>
	</blockquote>
		@include('restaurant_app.partials.modal_delete_confirm',['action' => route('works.destroy',[getWorkspaceUrl(),$employee->id, $work->id])])
@endsection