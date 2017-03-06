@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<ul>
			@foreach($restaurants as $restaurant)
				<li>{{ $restaurant->name }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection