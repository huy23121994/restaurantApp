@if(session('notice'))
  <p class="text-danger">{{ session('notice') }}</p>
@endif
<form action="{{ $action }}" enctype="multipart/form-data" method="POST" id="order">
  	{{ csrf_field() }}
  	{{ isset($order) ? method_field('PUT') : ''}}
    <div class="row">
      <div class="col-sm-5 col-xs-12">
        <div class="form-group">
            <label>Mã đơn hàng</label>
            <input type="text" class="form-control" name="order_id" placeholder="Mã đơn hàng" value="{{ isset($order) ? $order->order_id : old('order_id') }}">
          {!! $errors->has('order_id') ? '<p class="m_t_5 text-danger">* '. $errors->first('order_id') .'</p>' : '' !!}
          </div>
          <div class="form-group">
            <label>Thông tin bổ sung</label>
            <textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3">{{ isset($order) ? $order->description : old('description') }}</textarea>
          </div>
          <input type="hidden" name="restaurant" value="{{ getWorkspaceAdmin()->restaurant->id }}"/>
          <input type="hidden" name="status" value="2"/>
      </div>
      <div class="col-sm-6 col-xs-12 col-sm-offset-1">
        @include('restaurant_app.orders._select_food')
      </div>
    </div>
  	
  	@if( currentRouteName() == 'orders.create')
      <button type="button" onclick="$('form').submit()" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Đăng ký</button>
  	@else
      <button type="button" onclick="$('form').submit()" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>
      <a href="{{ route('orders.show',[getWorkspaceUrl(),$order->id]) }}" class="btn btn-danger"><i class="fa fa-ban"></i> Hủy</a>
  	@endif
</form>