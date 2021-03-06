@extends('restaurant_app.employees.layout')

@section('employee_content')
  	<div class="p_t_20">
  		<div role="tabpanel" class="tab-pane" id="general_info">
	      	<div class="row">
				<div class="col-sm-4 col-xs-12">
				    <div class="text-center m_t_10">
				    	<label for="avatar"><img src="{{ $employee->avatar }}" class="img-thumbnail employee_avatar" width="180" height="180"></label>
				    </div>
				</div>
				<div class="col-sm-8 col-xs-12 list_info">
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-user text-success"></i> Họ và tên</label>
					    <div class="col-sm-9">{{ $employee->fullname }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-envelope-o text-success"></i> Email</label>
					    <div class="col-sm-9">{{ $employee->email }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-phone text-success"></i> Số điện thoại</label>
					    <div class="col-sm-9">{{ $employee->phone }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-id-card-o text-success"></i> Số CMND</label>
					    <div class="col-sm-9">{{ $employee->people_id }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-birthday-cake text-success"></i> Ngày sinh</label>
					    <div class="col-sm-9">{{ $employee->birthday }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-gift text-success"></i> Tuổi</label>
					    <div class="col-sm-9">{{ $employee->get_age() }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-map-marker text-success"></i> Địa chỉ</label>
					    <div class="col-sm-9">{{ $employee->address }}</div>
					</div>
					<div class="row">
					    <label class="col-sm-3"><i class="fa fa-venus-mars text-success"></i> Giới tính</label>
					    <div class="col-sm-9">{{ $employee->gender }}</div>
					</div>
					@if(!getWorkspaceAdmin()->restaurantAdmin())
						<div class="row">
						    <div class="col-sm-9 col-sm-offset-3">
							    <a href="{{ route('employees.edit',[getWorkspaceUrl(),$employee->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Chỉnh sửa</a>
							    <button type="button" class="btn btn-danger" data-toggle="modal" aria-pressed="true" data-target="#delete_confirm"><i class="fa fa-trash"></i> Xóa</button>
						    </div>
						</div>
					@endif
				</div>
		      	@if(!getWorkspaceAdmin()->restaurantAdmin())
					@include('restaurant_app.partials.modal_delete_confirm',['action'=>route('employees.destroy',[getWorkspaceUrl(), $employee->id])])
				@endif
			</div>
  		</div>
  	</div>
@endsection