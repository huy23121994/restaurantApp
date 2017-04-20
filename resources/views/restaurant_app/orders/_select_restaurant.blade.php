<div>
	<h4 class="pull-left m_t_5">Chọn nhà hàng phục vụ</h4>
	<button type="button" class="btn btn-default btn-xs m_l_5" title="Kiểm tra trạng thái" id="check_restaurant" url="{{ route('restaurants.check_ready',[getWorkspaceUrl()]) }}"><i class="fa fa-refresh"></i> </button>
	<div class="clearfix"></div>
</div>
<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>Tình trạng</th>
			<th>Phục vụ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($restaurants as $restaurant)
			<tr>
				<td>{{ $restaurant->name }}</td>
				<td class="restaurant_id {{$restaurant->id}}"><i class="fa fa-question-circle"></i></td>
				<td><input type="radio" class="flat" name="restaurant" value="{{ $restaurant->id }}"></td>
			</tr>
		@endforeach
	</tbody>
</table>