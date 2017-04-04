@extends('restaurant_app.employees.layout')

@section('employee_content')
	<blockquote>Thêm công việc mới</blockquote>
	@include('restaurant_app.employees.works.form_new',['action' => route('works.store',[getWorkspaceUrl(),$employee->id])])
@endsection