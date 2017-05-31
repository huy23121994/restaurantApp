@extends('restaurant_app.layouts.app')

@section('content')
	<div>
		<h3 class="pull-left">Danh sách nhà hàng</h3>
		<a href="{{ route('restaurants.create',[getWorkspaceUrl()]) }}" class="pull-left btn btn-primary btn-xs m_10"><i class="fa fa-plus"></i> Thêm mới</a>
		<div class="clearfix"></div>
	</div>
	@if($restaurants->count() == 0)
		<blockquote>
		  <p>Chưa có nhà hàng để hiển thị.</p>
		</blockquote>
	@else
		@foreach($restaurants as $restaurant)
			<div class="panel">
				<div class="panel-body">
					<div class="col-xs-2">
						<div class="image"><img src="{{ $restaurant->avatar }}"></div>
					</div>
					<div class="col-xs-10">
						<div class="col-xs-6">
							<h4 class="m_t_0"><strong>{{ $restaurant->name }}</strong></h4>
							<p>{{ $restaurant->location['title'] }}</p>
						</div>
						<div class="col-xs-6">
							<p>Nhân viên: {{ $restaurant->employees_count }}</p>
							<p>Admin: {{ ($restaurant->admin)? $restaurant->admin->employee->fullname : ''}}</p>
						</div>
						<div class="col-xs-12">
							<a href="{{ route('restaurants.show',[getWorkspaceUrl(),$restaurant->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Chi tiết</a></a>
							<a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$restaurant->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Chỉnh sửa</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		@endforeach
	@endif
@endsection