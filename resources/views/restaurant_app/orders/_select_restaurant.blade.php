<div>
	<h4 class="pull-left m_t_5">Chọn nhà hàng phục vụ</h4>
	<button type="button" class="btn btn-default btn-xs m_l_5" title="Kiểm tra trạng thái" id="check_restaurant" url="{{ route('restaurants.check_ready',[getWorkspaceUrl()]) }}"><i class="fa fa-refresh"></i> </button>
	<div class="clearfix"></div>
</div>
<div class="restaurants">
	<div class="header row">
		<div class="col-xs-2 col-xs-offset-6 text-center">Tình trạng</div>
		<div class="col-xs-2 text-center">Khoảng cách</div>
		<div class="col-xs-2 text-center">Phục vụ</div>
	</div>
	<div class="body">
		<div class="hide multi_marker">1</div>
		@foreach($restaurants as $restaurant)
			<div class="row restaurant_id {{$restaurant->id}}" id="{{$restaurant->id}}">
				<div class="res_lat hide">{{$restaurant->location['lat']}}</div>
				<div class="res_lng hide">{{$restaurant->location['lng']}}</div>
				<div class="row m_l_r_0">
					<div class="col-xs-4 name">{{ $restaurant->name }}</div>
					<div class="col-xs-2">
						<a class="btn btn-default btn-xs" data-toggle="collapse" href=".restaurants .foods.{{ $restaurant->id }}">Chi tiết <small><i class="fa fa-chevron-right"></i></small></a>
					</div>
					<div class="col-xs-2 status text-center cursor_auto"><i class="fa fa-question-circle"></i></div>
					<div class="col-xs-2 distance text-center"><i class="fa fa-question-circle"></i></div>
					<div class="col-xs-2 text-center cursor_auto">
						<input type="radio" class="flat" name="restaurant" value="{{ $restaurant->id }}" {{ isset($order) && $restaurant->id == $order->restaurant_id ? 'checked' : '' }}>
					</div>
				</div>
				<ul class="collapse {{$restaurant->id}} foods m_b_0">
					{{-- <li class="row m_l_r_0 p_b_10">
						<div class="col-xs-6">- Món ăn</div>
						<div class="col-xs-2 col-xs-offset-2 text-center p_l_0"><i class="fa fa-check"></i></div>
					</li> --}}
				</ul>
			</div>
		@endforeach
	</div>
</div>