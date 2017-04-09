@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thông tin món ăn</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <blockquote>
            <small>Tên món ăn: <span class="text-primary">{{ $food->name }}</span></small>
            <small>Mã món ăn: <span class="text-primary">{{ $food->food_id }}</span></small>
            <small>Thông tin bổ sung: <span class="text-primary">{{ $food->description }}</span></small>
            <small>Ảnh đại diện: </small>
            <img src="{{ $food->avatar }}" width="100">
          </blockquote>
          <a href="{{ route('foods.edit',[getWorkspaceUrl(), $food->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
          <button class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-trash"></i> Xóa</button>
          @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('foods.destroy',[getWorkspaceUrl(), $food->id]) , 'delete_id' => $food->id ])
  	  	</div>
      </div>
    </div>
</div>
@endsection