@extends('restaurant_app.layouts.app')

@section('content')
    <div class="x_panel">
      	<div class="x_title">
        	<h2>Thông tin nhân viên {{ $employee->fullname }}</h2>
        	<div class="clearfix"></div>
      	</div>
      	<div class="x_content">
		  	<ul id="myTab" class="nav nav-tabs bar_tabs">
		    	<li class="{{ $menu_active == 'basic_info' ? 'active' : ''}}"><a href="{{ route('employees.show',[getWorkspaceUrl(),$employee->id]) }}"><i class="fa fa-info-circle"></i> Thông tin cơ bản</a></li>
		    	<li class="{{ $menu_active == 'work_info' ? 'active' : ''}}">
            <a href="{{ route('works.index',[getWorkspaceUrl(),$employee->id]) }}">
              <i class="fa fa-briefcase"></i> Thông tin làm việc
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('works.index',[getWorkspaceUrl(),$employee->id]) }}">Tất cả</a></li>
                <li><a href="{{ route('works.create',[getWorkspaceUrl(),$employee->id]) }}">Thêm mới</a></li>
            </ul>
          </li>
		  	</ul>
		  	@yield('employee_content')
      	</div>
    </div>
@endsection