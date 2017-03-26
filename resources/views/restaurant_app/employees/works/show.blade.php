@extends('restaurant_app.employees.layout')

@section('employee_content')
	restaurant: {{ $restaurant->name }} <br>
	location: {{ $restaurant->location }} <br>
	start time : {{ $work->start_date }} <br>
	end time : {{ $work->end_date }} <br>
@endsection