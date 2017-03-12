@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Thông tin nhân viên</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      	<div class="" role="tabpanel" data-example-id="togglable-tabs">
		  	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		    	<li role="presentation" class="active"><a href="#general_info" role="tab" data-toggle="tab" aria-expanded="true">Thông tin cơ bản</a></li>
		    	<li role="presentation"><a href="#work_info" role="tab" data-toggle="tab" aria-expanded="false">Thông tin làm việc</a></li>
		  	</ul>
		  	<div id="myTabContent" class="tab-content">
		  		<div role="tabpanel" class="tab-pane fade active in" id="general_info">
			      <div class="row">
							<div class="col-sm-4 col-xs-12">
						    <div class="text-center m_t_10">
						    	<label for="avatar"><img src="/img/user.png" class="img-thumbnail employee_avatar" width="180" height="180"></label>
						    </div>
							</div>
							<div class="col-sm-8 col-xs-12 list_info">
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-user"></i> Họ và tên</label>
							    <div class="col-sm-9">{{ $employee->fullname }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-envelope-o"></i> Email</label>
							    <div class="col-sm-9">{{ $employee->email }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-phone"></i> Số điện thoại</label>
							    <div class="col-sm-9">{{ $employee->phone }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-birthday-cake"></i> Ngày sinh</label>
							    <div class="col-sm-9">{{ $employee->birthday }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-gift"></i> Tuổi</label>
							    <div class="col-sm-9">{{ $employee->get_age() }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-map-marker"></i> Địa chỉ</label>
							    <div class="col-sm-9">{{ $employee->address }}</div>
							  </div>
								<div class="row">
							    <label class="col-sm-3"><i class="fa fa-venus-mars"></i> Giới tính</label>
							    <div class="col-sm-9">{{ $employee->gender ? 'Nam' : 'Nữ' }}</div>
							  </div>
							  <button class="btn btn-success btn-xs">Cập nhật</button>
							</div>
						</div>
		  		</div>
		  		<div role="tabpanel" class="tab-pane fade" id="work_info">
			        @include('app.employees.form_work')
		  		</div>
		  	</div>
		</div>
      </div>
    </div>
  </div>
</div>
@endsection