@extends('restaurant_app.restaurants.layout')

@section('restaurant_content')
	<a href="{{ route('res.employees.create',[session('workspace')->url,$restaurant->id]) }}" class="btn btn-success">Add new</a>
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Birthday</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $employee)
				<tr>
					<td>{{ $employee->fullname }}</td>
					<td>{{ $employee->birthday }}</td>
					<td>{{ $employee->email }}</td>
					<td>{{ $employee->phone }}</td>
					<td>{{ $employee->address }}</td>
					<td>{{ $employee->gender }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection