@extends('restaurant_app.layouts.app')

@section('content')
	<div class="x_panel">
		<div class="x_title">
            <h2>Thông tin nhà hàng</h2>
            <div class="clearfix"></div>
        </div>
		<div class="x_content">
			<blockquote>
	            <small>Tên nhà hàng: <span class="text-primary">{{ $restaurant->name }}</span></small>
	            <small>Địa chỉ: <span class="text-primary">{{ $restaurant->location }}</span></small>
	            <small>Thông tin bổ sung: <span class="text-primary">{{ $restaurant->description }}</span></small>
	            <small>Ảnh đại diện: </small>
	            <img src="{{ $restaurant->avatar }}" width="100">
          	</blockquote>
		</div>
	</div>
@endsection