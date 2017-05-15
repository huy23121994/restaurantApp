@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách đơn hàng</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-xs-12 col-sm-6">
          	<blockquote>
              <small>Mã đơn hàng: <span class="text-primary">{{ $order->order_id }}</span></small>
              <small>Tên khách hàng: <span class="text-primary">{{ $order->customer }}</span></small>
              <small>Địa chỉ: <span class="text-primary">{{ $order->address['title'] }}</span></small>
              <small>Nhà hàng xử lý: <span class="text-primary">{{ $order->restaurant ? $order->restaurant->name : '' }}</span></small>
              <small>Trạng thái: 
                @if(getWorkspaceAdmin()->restaurantAdmin())
                  <form action="{{ route('orders.updateStatus', [getWorkspaceUrl(), $order->id]) }}" method="POST" class="updateStatus" style="display: inline-table;">
                    {{ csrf_field() }}
                    <select class="form-control" style="width: 150px;" name="status">
                      <option value="0" {{ $order->status['value'] == 0  ? 'selected' : '' }}>Chưa xử lý</option>
                      <option value="1" {{ $order->status['value'] == 1  ? 'selected' : '' }}>Đang xử lý</option>
                      <option value="2" {{ $order->status['value'] == 2  ? 'selected' : '' }}>Đã xử lý</option>
                      <option value="3" {{ $order->status['value'] == 3  ? 'selected' : '' }}>Đơn hàng bị hủy</option>
                      <option value="4" {{ $order->status['value'] == 4  ? 'selected' : '' }}>Hủy yêu cầu</option>
                    </select>
                  </form>
                @else
                  <button class="btn btn-xs {{ $order->status['class'] }}">{{ $order->status['status'] }}</button>
                @endif
              </small>
              <small>Thông tin bổ sung: <span class="text-primary">{{ $order->description }}</span></small>
            </blockquote>
            <br>
            @if(!getWorkspaceAdmin()->restaurantAdmin())
              <a href="{{ route('orders.edit',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
              <button class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-trash"></i> Xóa</button>
              @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('orders.destroy',[getWorkspaceUrl(), $order->id]) , 'delete_id' => $order->id ])
            @else
              <button class="btn btn-success" onclick="$('.updateStatus').submit()">Cập nhật</button>
            @endif
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="hide">
          		<div class="hide multi_marker">1</div>
          		<input type="hidden" name="lat" class="order_lat lat" value="{{ $order->address['lat'] }}">
              <input type="hidden" name="lng" class="order_lng lng" value="{{ $order->address['lng'] }}">
              @foreach($restaurants as $restaurant)
                <div class="row restaurant_id {{$restaurant->id}}" id="{{$restaurant->id}}">
          				<div class="res_lat">{{$restaurant->location['lat']}}</div>
          				<div class="res_lng">{{$restaurant->location['lng']}}</div>
        					<div class="name">{{ $restaurant->name }}</div>
          			</div>
      				@endforeach
            </div>
            <div id="map"></div>
          </div>
          <hr>
          <h5><i>Chi tiết đơn hàng</i></h5>
          <table class="table table-striped" id="dataTable">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Avatar</th>
                      <th>Tên món ăn</th>
                      <th>Mã món ăn</th>
                      <th>Số lượng</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($order->foods as $food)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}"><img src="{{ $food->avatar }}" width="40" height="40"></img></a></td>
                          <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}" class="text-primary">{{ $food->name }}</a></td>
                          <td>{{ $food->food_id }}</td>
                          <td>{{ $food->pivot->number }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
  	  	</div>
      </div>
    </div>
</div>
@endsection