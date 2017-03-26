@extends('restaurant_app.employees.layout')

@section('employee_content')
	<table class="table">
		<thead>
			<tr>
				<th>restaurant's name</th>
				<th>location</th>
				<th>start date</th>
				<th>end date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($works as $work)
				<tr>
					<th>{{ $work->restaurant->name }}</th>
					<th>{{ $work->restaurant->location }}</th>
					<th>{{ $work->start_date }}</th>
					<th>{{ $work->end_date }}</th>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection