@extends('restaurant_app.layouts.app')

@section('content')
<div class="row">
	<div class="col-xs-12">
		@if( count($errors) > 0)
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		@endif
		<form action="{{ route('restaurants.store',['workspace'=>session('workspace')->url]) }}" method="POST">
			{{ csrf_field() }}
			<label>Tên nhà hàng chi nhánh</label>
			<input type="text" name="name" placeholder="Tên nhà hàng">
			<label>Thông tin bổ sung</label>
			<textarea name="description" placeholder="Thông tin bổ sung"></textarea>
			<label>Địa chỉ</label>
			<input type="text" name="location" placeholder="Địa chỉ">
			<button type="submit">Submit</button>
		</form>
	</div>
</div>
@endsection