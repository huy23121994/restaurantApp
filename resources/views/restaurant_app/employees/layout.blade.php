@extends('restaurant_app.layouts.app')

@section('content')
    <div class="x_panel">
      	<div class="x_title">
        	<h2>Thông tin nhân viên {{ $employee->fullname }}</h2>
        	<div class="clearfix"></div>
      	</div>
      	<div class="x_content">
		  	<ul id="myTab" class="nav nav-tabs bar_tabs">
		    	<li class="{{ $menu_active == 'basic_info' ? 'active' : ''}}"><a href="{{ route('employees.show',[getWorkspaceUrl(),$employee->id]) }}">Thông tin cơ bản</a></li>
		    	<li class="{{ $menu_active == 'work_info' ? 'active' : ''}}"><a href="#work_info">Thông tin làm việc</a></li>
		  	</ul>
		  	@yield('employee_content')
      	</div>
    </div>
@endsection