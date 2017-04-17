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
        	<blockquote>
            <small>Mã đơn hàng: <span class="text-primary">{{ $order->order_id }}</span></small>
            <small>Tên khách hàng: <span class="text-primary">{{ $order->customer }}</span></small>
            <small>Địa chỉ: <span class="text-primary">{{ $order->address }}</span></small>
            <small>Thông tin bổ sung: <span class="text-primary">{{ $order->description }}</span></small>
          </blockquote>
          <br>
          <a href="{{ route('orders.edit',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
          <button class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-trash"></i> Xóa</button>
          @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('orders.destroy',[getWorkspaceUrl(), $order->id]) , 'delete_id' => $order->id ])
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