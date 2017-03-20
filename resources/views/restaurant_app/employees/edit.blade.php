@extends('restaurant_app.employees.layout')

@section('employee_content')
	<a href="{{ route('employees.show',[getWorkspaceUrl(),$employee->id]) }}"><i class="fa fa-arrow-circle-left"></i> Quay lại</a>
	@include('restaurant_app.employees.form_new', ['action'=> route('employees.update',[getWorkspaceUrl(),$employee->id]) ])
@endsection