@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách món ăn</h2>
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
                            <th width="100">Số lượng</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}"><img src="{{ $food->avatar }}" width="40" height="40"></img></a></td>
                                <td><a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}" class="text-primary">{{ $food->name }}</a></td>
                                <td>{{ $food->food_id }}</td>
                                <td>{{ $food->description }}</td>
                                <td class="number">
                                    <div class="text">{{ $food->pivot->number }}</div>
                                    <div class="input" style="display: none;"><input type="number" name="number" min="0" class="full_width p_l_5" value="{{ $food->pivot->number }}"></div>
                                </td>
                                <td class="action">
                                    <button class="btn btn-warning btn-xs edit_food_number" title="Chỉnh sửa"><i class="fa fa-edit"></i></button>
                                    <div class="inEdit" style="display: none;">
                                        <button class="btn btn-xs btn-success submit" title="Xác nhận" data-restaurant="{{ $restaurant->id }}" data-url="{{ route('foods.update_number',[getWorkspaceUrl(),$food->id]) }}"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-xs btn-danger cancle" title="Hủy"><i class="fa fa-ban"></i></button>
                                    </div>
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