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
            <label>Tên khách hàng</label>
            <input type="text" class="form-control" name="customer" placeholder="Tên khách hàng" value="{{ isset($order) ? $order->customer : old('customer') }}">
          {!! $errors->has('customer') ? '<p class="m_t_5 text-danger">* '. $errors->first('customer') .'</p>' : '' !!}
          </div>
          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ isset($order) ? $order->address : old('address') }}">
          {!! $errors->has('address') ? '<p class="m_t_5 text-danger">* '. $errors->first('address') .'</p>' : '' !!}
          </div>
          <div class="form-group">
            <label>Thông tin bổ sung</label>
            <textarea name="description" placeholder="Thông tin bổ sung" class="form-control" rows="3">{{ isset($order) ? $order->description : old('description') }}</textarea>
          </div>
          <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="status">
              <option value="0" {{ isset($order) && $order->status['value'] == 0  ? 'selected' : '' }}>
                Chưa xử lý
              </option>
              <option value="1" {{ isset($order) && $order->status['value'] == 1  ? 'selected' : '' }}>
                Đang xử lý
              </option>
              <option value="2" {{ isset($order) && $order->status['value'] == 2  ? 'selected' : '' }}>
                Đã xử lý
              </option>
              <option value="3" {{ isset($order) && $order->status['value'] == 3  ? 'selected' : '' }}>
                Đơn hàng bị hủy
              </option>
              <option value="4" {{ isset($order) && $order->status['value'] == 4  ? 'selected' : '' }}>
                Hủy yêu cầu
              </option>
            </select>
          </div>
      </div>
      <div class="col-sm-6 col-xs-12 col-sm-offset-1">
        @include('restaurant_app.orders._select_food')
        <hr>
        @include('restaurant_app.orders._select_restaurant')
      </div>
    </div>
  	
  	@if( currentRouteName() == 'orders.create')
      <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Đăng ký</button>
  	@else
      <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>
      <a href="{{ route('orders.show',[getWorkspaceUrl(),$order->id]) }}" class="btn btn-danger"><i class="fa fa-ban"></i> Hủy</a>
  	@endif
</form>