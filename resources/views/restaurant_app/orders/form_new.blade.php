@if(session('notice'))
  <p class="text-danger">{{ session('notice') }}</p>
@endif
<form action="{{ $action }}" enctype="multipart/form-data" method="POST" id="order">
  	{{ csrf_field() }}
  	{{ isset($order) ? method_field('PUT') : ''}}
    <div class="row">
      <div class="col-sm-5">
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
      </div>
      <div class="col-sm-6 col-sm-offset-1">
        {{-- <select class="select2_multiple form-control" tabindex="-1" name="foods[]" multiple style="width:100%" data-placeholder="Chọn mã món ăn">
            @foreach($foods as $food)
              @if(isset($order))
                @foreach($order->foods as $order_food)
                  <option value="{{ $food->id }}" {{ $food->id == $order_food->id ? 'selected'  : '' }}>{{ $food->food_id .' - '. $food->name }}</option>
                @endforeach
              @else
                  <option value="{{ $food->id }}" {{ old("foods") && in_array($food->id, old("foods")) ? 'selected'  : '' }}>{{ $food->food_id .' - '. $food->name }}</option>
              @endif
            @endforeach
          </select> --}}
        <div class="list_food_select">
          <div class="row">
             <div class="col-xs-9"><label>Mã món ăn</label></div>
             <div class="col-xs-2"><label>Số lượng</label></div>
          </div>
          @if(currentRouteName() == 'orders.create') 
            <div class="row field">
              <div class="col-xs-9">
                <select class="select2_single form-control" tabindex="-1" style="width:100%" data-placeholder="Chọn mã món ăn">
                  <option></option>
                  @foreach($foods as $food)
                    <option value="{{ $food->id }}">{{ $food->food_id .' - '. $food->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-xs-2">
                <input type="number" name="number" class="form-control" value="1" min="1">
              </div>
            </div>
            <select class="hide" id="foods" name="foods[]" multiple></select>
          @else
            @foreach($order->foods as $order_food)
              <div class="row field {{ $loop->first ? '' : 'm_t_10' }}">
                <div class="col-xs-9">
                  <select class="select2_single form-control" tabindex="-1" style="width:100%" data-placeholder="Chọn mã món ăn">
                    <option></option>
                    @foreach($foods as $food)
                      <option value="{{ $food->id }}" {{ $food->id == $order_food->id ? 'selected'  : '' }}>{{ $food->food_id .' - '. $food->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-xs-2">
                  <input type="number" name="number" class="form-control" value="{{ $order_food->pivot->number }}" min="1">
                </div>
                @if( !$loop->first )
                  <div class="col-xs-1">
                    <button type="button" id="remove_food_select" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                  </div>
                @endif
              </div>
            @endforeach
            <select class="hide" id="foods" name="foods[]" multiple>
              @foreach($order->foods as $order_food)
                <option value="{{ $order_food->id .'|'. $order_food->pivot->number}}" selected></option>
              @endforeach
            </select>
          @endif
        </div>
        {!! $errors->has('foods') ? '<p class="m_t_5 text-danger">* '. $errors->first('foods') .'</p>' : '' !!}
        <button type="button" class="btn btn-primary btn-xs m_t_10" id="copy_food_select"><i class="fa fa-plus"></i> Thêm món</button>
      </div>
    </div>
  	
  	@if( currentRouteName() == 'orders.create')
      <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Đăng ký</button>
  	@else
      <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>
      <a href="{{ route('orders.show',[getWorkspaceUrl(),$order->id]) }}" class="btn btn-danger"><i class="fa fa-ban"></i> Hủy</a>
  	@endif
</form>