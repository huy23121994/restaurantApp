@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách đơn hàng</h2>
          @if(!getWorkspaceAdmin()->restaurantAdmin())
            <div class="x_button_helper">
              <a href="{{ route('orders.create',[getWorkspaceUrl()]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped {{ $restaurant ? 'restaurant_'.$restaurant->id : 'global' }}" id="datatable">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th class="hide">counter</th>
                      <th>Mã đơn hàng</th>
                      <th>Khách hàng</th>
                      <th>Địa chỉ</th>
                      <th>Thông tin bổ sung</th>
                      <th class="{{ !getWorkspaceAdmin()->restaurantAdmin() ? '' : 'hide' }}">Nhà hàng</th>
                      <th width="150">Trạng thái</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody class="list_orders">
                  @foreach($orders as $order)
                    <tr">
                      <td></td>
                      <td class="hide"><i class="order_{{ $order->id }}"></i></td>
                      <td><a href="{{ route('orders.show',[getWorkspaceUrl(), $order->id]) }}" class="text-primary">{{ $order->order_id }}</a></td>
                      <td>{{ $order->customer }}</td>
                      <td>{{ $order->address['title'] }}</td>
                      <td>{{ $order->description }}</td>
                      <td class="{{ !getWorkspaceAdmin()->restaurantAdmin() ? '' : 'hide' }}">{{ $order->restaurant ? $order->restaurant->name : ''}}</td>
                      <td class="status">
                        <button class="btn btn-xs {{ $order->status['class'] }}">
                          {{ $order->status['status'] }}
                        </button>
                      </td>
                      <td>
                        <a href="{{ route('orders.show',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                        @if( !getWorkspaceAdmin()->restaurantAdmin() )
                          <a href="{{ route('orders.edit',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
	  	</div>
      </div>
    </div>
</div>
@endsection