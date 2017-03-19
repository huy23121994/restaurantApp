@extends('restaurant_app.layouts.app')

@section('content')
	<div class="x_panel">
		<div class="x_title">
            <h2>{{ $restaurant->name }}</h2>
            <div class="clearfix"></div>
        </div>
		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs" role="tablist">
                <li class="{{ isset($overview_active)? 'active' : '' }}">
                	<a href="#tab_content1"><i class="fa fa-tachometer"></i> Tổng quan</a>
                </li>
                <li class="{{ isset($employee_active)? 'active' : '' }} dropdown">
                	<a href="{{ route('res.employees.index',[getWorkspaceUrl(),$restaurant->id]) }}">
                        <i class="fa fa-users"></i> Nhân viên
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="{{ route('res.employees.index',[getWorkspaceUrl(),$restaurant->id]) }}">Danh sách nhân viên</a></li>
                        <li><a href="{{ route('res.employees.create',[getWorkspaceUrl(),$restaurant->id]) }}">Thêm mới</a></li>
                    </ul>
                </li>
                <li class="{{ isset($food_active)? 'active' : '' }}">
                	<a href="#tab_content2"><i class="fa fa-cutlery"></i> Món ăn</a>
                </li>
                <li class="{{ isset($info_active)? 'active' : '' }}">
                	<a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$restaurant->id]) }}">
                		<i class="fa fa-info-circle"></i> Thông tin
                	</a>
                </li>
			</ul>
			@yield('restaurant_content')
		</div>
	</div>
@endsection