@extends('restaurant_app.employees.layout')

@section('employee_content')
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>restaurant's name</th>
				<th>location</th>
				<th>start date</th>
				<th>end date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($works as $key => $work)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $work->restaurant->name }}</td>
					<td>{{ $work->restaurant->location }}</td>
					<td>{{ $work->start_date }}</td>
					<td>{{ $work->end_date }}</td>
					<td>
						<a href="{{ route('works.show',[getWorkspaceUrl(),$employee->id, $work->id]) }}" class="btn btn-success btn-xs">show</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection