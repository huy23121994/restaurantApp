@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Cập nhật món ăn {{ $food->name . '-' . $food->food_id}}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<div class="col-xs-12 col-sm-5">
        		@include('restaurant_app.foods.form_new', ['action' => route('foods.update',[getWorkspaceUrl(), $food->id])] )
    			</div>
          <div class="col-xs-12 col-sm-6 col-sm-offset-1">
            <table class="table">
              <thead>
                <tr>
                  <th>Nhà hàng</th>
                  <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($restaurants as $restaurant)
                  <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->pivot->number }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
	  	</div>
      </div>
    </div>
</div>
@endsection