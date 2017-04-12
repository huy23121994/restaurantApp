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
                <li class="{{ ($menu_active == 'employees')? 'active' : '' }}">
                	<a href="{{ route('res.employees.index',[getWorkspaceUrl(),$restaurant->id]) }}">
                        <i class="fa fa-users"></i> Nhân viên
                    </a>
                </li>
                <li class="{{ ($menu_active == 'foods')? 'active' : '' }}">
                	<a href="{{ route('res.foods.index',[getWorkspaceUrl(),$restaurant->id]) }}">
                        <i class="fa fa-cutlery"></i> Món ăn
                    </a>
                </li>
                <li class="{{ ($menu_active == 'info')? 'active' : '' }}">
                	<a href="{{ route('restaurants.edit',[getWorkspaceUrl(),$restaurant->id]) }}">
                		<i class="fa fa-info-circle"></i> Thông tin
                	</a>
                </li>
			</ul>
			@yield('restaurant_content')
		</div>
	</div>
@endsection