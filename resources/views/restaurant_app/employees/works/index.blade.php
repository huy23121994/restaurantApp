@extends('restaurant_app.employees.layout')

@section('employee_content')
	<ul class="list-action">
		<li class="list-action-item"><a href="{{ route('works.create',[getWorkspaceUrl(),$employee->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Them moi</a></li>
	</ul>
	@if($works->count() == 0)
		<blockquote>
		  <p>Chưa có công việc để hiển thị.</p>
		</blockquote>
	@else
		@if($current_work)
			<blockquote>
				<p>Công việc hiện tại</p>
				<small>Nhà hàng: <a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$current_work->restaurant->id]) }}" class="text-primary"><u>{{ $current_work->restaurant->name }}</u></a></small>
				<small>Địa chỉ: <span class="text-primary">{{ $current_work->restaurant->location['title'] }}</span></small>
				<small>Ngày bắt đầu làm việc: <span class="text-primary">{{ $current_work->start_date }}</span></small>
			</blockquote>
			<hr>
		@endif
		<table class="table" id="datatable">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên nhà hàng</th>
					<th>Địa điểm</th>
					<th>Ngày bắt đầu</th>
					<th>Ngày thôi việc</th>
					<th>Trạng thái</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($works as $key => $work)
					<tr class="{{ $work->status ? 'active' : '' }}">
						<td></td>
						<td><a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$work->restaurant->id]) }}" class="text-primary">{{ $work->restaurant->name }}</a></td>
						<td>{{ $work->restaurant->location['title'] }}</td>
						<td>{{ $work->start_date }}</td>
						<td>{{ $work->end_date }}</td>
						<td>{!! $work->status ? '<button class="btn btn-primary btn-xs">Đang làm việc</button>' : '<button class="btn btn-default btn-xs">Kết thúc</button>' !!}</td>
						<td>
							<a href="{{ route('works.show',[getWorkspaceUrl(),$employee->id, $work->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
							<a href="{{ route('works.edit',[getWorkspaceUrl(),$employee->id, $work->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
						  	<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $work->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
							@include('restaurant_app.partials.modal_delete_confirm',['action' => route('works.destroy',[getWorkspaceUrl(),$employee->id, $work->id]), 'delete_id' => $work->id])
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection