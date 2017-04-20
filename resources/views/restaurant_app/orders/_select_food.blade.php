
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