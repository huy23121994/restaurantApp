@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm đơn hàng mới</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          @if(!getWorkspaceAdmin()->restaurantAdmin())
        		@include('restaurant_app.orders.form_new', ['action' => route('orders.store',[getWorkspaceUrl()])] )
      		@else
      		  @include('restaurant_app.orders.form_new_restaurant_role', ['action' => route('orders.store',[getWorkspaceUrl()])] )
      		@endif
	  	</div>
      </div>
    </div>
</div>
@endsection