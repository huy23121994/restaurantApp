@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách đơn hàng</h2>
          <div class="x_button_helper">
            <a href="{{ route('orders.create',[getWorkspaceUrl()]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	@if( $orders->count() > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Thông tin bổ sung</th>
                        @if( getWorkspaceAdmin()->restaurantAdmin() )
                          <th>Trạng thái</th>
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('orders.show',[getWorkspaceUrl(), $order->id]) }}" class="text-primary">{{ $order->order_id }}</a></td>
                        <td>{{ $order->customer }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->description }}</td>
                        @if( getWorkspaceAdmin()->restaurantAdmin() )
                          <td><button class="btn btn-xs btn-default">{{ $order->status['status'] }}</button></td>
                        @endif
                        <td>
                          <a href="{{ route('orders.show',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                          @if( !getWorkspaceAdmin()->restaurantAdmin() )
                            <a href="{{ route('orders.edit',[getWorkspaceUrl(), $order->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $order->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
                            @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('orders.destroy',[getWorkspaceUrl(), $order->id]) , 'delete_id' => $order->id ])
                          @endif
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
          @else
            <blockquote>
              <p>Chưa có đơn hàng nào để hiển thị.</p>
            </blockquote>
          @endif
	  	</div>
      </div>
    </div>
</div>
@endsection