<div>
	<h4 class="pull-left m_t_5">Chọn nhà hàng phục vụ</h4>
	@if( currentRouteName() == 'orders.create')
		<button type="button" class="btn btn-default btn-xs m_l_5" title="Kiểm tra trạng thái" id="check_restaurant" url="{{ route('restaurants.check_ready',[getWorkspaceUrl()]) }}"><i class="fa fa-refresh"></i> </button>
	@endif
	<div class="clearfix"></div>
</div>
<div class="restaurants">
	<div class="header row">
		<div class="col-xs-2 col-xs-offset-8 text-center">Tình trạng</div>
		<div class="col-xs-2 text-center">Phục vụ</div>
	</div>
	<div class="body">
		@foreach($restaurants as $restaurant)
			<div class="row">
				<div class="row m_l_r_0">
					<div class="col-xs-6">{{ $restaurant->name }}</div>
					<div class="col-xs-2">
						{!! currentRouteName() == 'orders.create' ? '<a class="btn btn-default btn-xs" data-toggle="collapse" href=".restaurants .foods.'.$restaurant->id.'">Chi tiết <small><i class="fa fa-chevron-right"></i></small></a>' : ''!!}
					</div>
					<div class="col-xs-2 restaurant_id {{$restaurant->id}} text-center cursor_auto"><i class="fa fa-question-circle"></i></div>
					<div class="col-xs-2 text-center cursor_auto"><input type="radio" class="flat" name="restaurant" value="{{ $restaurant->id }}"></div>
				</div>
				<ul class="collapse {{$restaurant->id}} foods m_b_0 p_l_20">
					{{-- <li class="row m_l_r_0 p_b_10">
						<div class="col-xs-6">- Món ăn</div>
						<div class="col-xs-2 col-xs-offset-2 text-center p_l_0"><i class="fa fa-check"></i></div>
					</li> --}}
				</ul>
			</div>
		@endforeach
	</div>
</div>