@if(session('notice'))
  <p class="text-danger">{{ session('notice') }}</p>
@endif
<form action="{{ $action }}" method="POST">
  	{{ csrf_field() }}
  	{{ isset($admin) ? method_field('PUT') : ''}}
  	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    	<label>Tên đăng nhập</label>
    	<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="{{ isset($admin) ? $admin->username : old('username') }}">
    	@if($errors->has('username'))
    		<span class="text-danger">{{ $errors->first('username') }}</span>
    	@endif
  	</div>
  	<div class="form-group {{ $errors->has('admin_id') ? 'has-error' : '' }}">
    	<label>Mật khẩu</label>
    	<input type="text" class="form-control" name="password" placeholder="Mật khẩu" value="{{ isset($admin) ? $admin->password : '' }}">
    	@if($errors->has('password'))
    		<span class="text-danger">{{ $errors->first('password') }}</span>
    	@endif
  	</div>
	<div class="form-group">
	    <label>Quyền</label>
	    <select class="select2_single form-control" tabindex="-1" name="role_id" style="width:100%" data-placeholder="Chọn quyền">
            <option></option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ isset($admin) && $role->id == $admin->role_id ? 'selected'  : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        {!! $errors->has('restaurant_id') ? '<p class="m_t_5 text-danger">* '. $errors->first('restaurant_id') .'</p>' : '' !!}
	</div>
	<div class="form-group">
	    <label>Nơi làm việc</label>
	    <select class="select2_single form-control" tabindex="-1" name="restaurant_id" style="width:100%" data-placeholder="Chọn một địa điểm">
            <option></option>
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}" {{ isset($admin) && $restaurant->id == $admin->restaurant_id ? 'selected'  : '' }}>{{ $restaurant->name }}</option>
            @endforeach
        </select>
        {!! $errors->has('restaurant_id') ? '<p class="m_t_5 text-danger">* '. $errors->first('restaurant_id') .'</p>' : '' !!}
	</div>
  	@if( currentRouteName() == 'admins.create')
	  	<button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Đăng ký</button>
  	@else
      <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Cập nhật</button>
      <a href="{{ route('admins.show',[getWorkspaceUrl(),$admin->id]) }}" class="btn btn-danger"><i class="fa fa-ban"></i> Hủy</a>
  	@endif
</form>