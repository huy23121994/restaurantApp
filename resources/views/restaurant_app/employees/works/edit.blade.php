@extends('restaurant_app.employees.layout')

@section('employee_content')
	<h4 class="col-xs-12"><u>Chỉnh sửa thông tin công việc</u></h4>
	@include('restaurant_app.employees.works.form_new',['action' => route('works.update',[getWorkspaceUrl(),$employee->id, $work->id])])
@endsection