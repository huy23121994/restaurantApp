@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-12">
		@foreach($restaurants as $restaurant)
			<div class="panel">
				<div class="panel-body">
					<div class="col-xs-2">
						<div class="image"><img src="{{ $restaurant->avatar }}"></div>
					</div>
					<div class="col-xs-10">
						<div class="col-xs-6">
							<h4 class="m_t_0"><strong>{{ $restaurant->name }}</strong></h4>
							<p>{{ $restaurant->location }}</p>
						</div>
						<div class="col-xs-6">
							<p>Nhan vien: 100</p>
							<p>Quan ly: Tran Thi Hong Nhung</p>
						</div>
						<div class="col-xs-12">
							<a href="{{ route('restaurants.show',[session('workspace')->url,$restaurant->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Chi tiết</a></a>
							<a href="{{ route('restaurants.edit',[session('workspace')->url,$restaurant->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Chỉnh sửa</a>
							<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Xóa</a></a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection