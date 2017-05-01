@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
    @if( $foods->count() > 0 )
        <blockquote>
            Danh sách món ăn
        </blockquote>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Tên món ăn</th>
                    <th>Mã món ăn</th>
                    <th>Thông tin bổ sung</th>
                    <th width="200">Trạng thái</th>
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
                        <td class="update_food_status food_{{ $food->id }}" data-url="{{ route('res.foods.update_status', [getWorkspaceUrl(),$restaurant->id,$food->id]) }}" data-status="{{ $food->pivot->number }}">
                            {!! $food->pivot->number ? '<button class="btn btn-primary btn-xs">Đang còn <span class="badge">'.$food->pivot->number.'</button>' : '<button class="btn btn-default btn-xs">Đã hết</button>'!!}
                        </td>
                        <td>
                            <a href="{{ route('foods.show',[getWorkspaceUrl(), $food->id]) }}" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('foods.edit',[getWorkspaceUrl(), $food->id]) }}" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
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
@endsection