@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm món ăn mới</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>{{ $food->name }}</p>
            <p>{{ $food->description }}</p>
            <p>{{ $food->food_id }}</p>
            <p>{{ $food->status }}</p>
	  	</div>
      </div>
    </div>
</div>
@endsection