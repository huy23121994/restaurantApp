@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách món ăn</h2>
          <div class="x_button_helper">
            <a href="{{ route('foods.create',[getWorkspaceUrl()]) }}" class="btn btn-primary btn-xs m_l_10"><i class="fa fa-plus"></i> Thêm mới</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( $foods->count() > 0 )
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Tên món ăn</th>
                            <th>Mã món ăn</th>
                            <th>Thông tin bổ sung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}"><img src="{{ $food->avatar }}" width="40" height="40"></img></a></td>
                                <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}" class="text-primary">{{ $food->name }}</a></td>
                                <td>{{ $food->food_id }}</td>
                                <td>{{ $food->description }}</td>
                                <td>
                                    <a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('foods.edit',[getWorkspaceUrl(), $food->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_confirm.{{ $food->id }}" title="Xóa"><i class="fa fa-trash"></i></button>
                                    @include('restaurant_app.partials.modal_delete_confirm',['action'=>route('foods.destroy',[getWorkspaceUrl(), $food->id]) , 'delete_id' => $food->id ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <blockquote>
                  <p>Chưa có món ăn nào để hiển thị.</p>
                </blockquote>
            @endif
	  	</div>
      </div>
    </div>
</div>
@endsection