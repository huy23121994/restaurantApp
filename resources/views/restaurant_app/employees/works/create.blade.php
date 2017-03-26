@extends('restaurant_app.employees.layout')

@section('employee_content')
	<ol class="breadcrumb">
	  <li><a href="{{ route('works.index',[getWorkspaceUrl(),$employee->id]) }}">Work index</a></li>
	  <li class="active">Create</li>
	</ol>
	<form action="{{ route('works.store',[getWorkspaceUrl(),$employee->id]) }}" method="POST">
		{{ csrf_field() }}
		<div class="col-xs-12">
			<div class="form-group">
			    <label for="department">Nơi làm việc</label>
			    <select class="select2_single form-control" tabindex="-1" name="restaurant_id" style="width:100%">
	                <option></option>
	                @foreach($restaurants as $restaurant)
		                <option value="{{ $restaurant->id }}">{{ $restaurant->location }}</option>
	                @endforeach
	            </select>
	            {!! $errors->has('restaurant_id') ? '<p class="m_t_5 text-danger">* '. $errors->first('restaurant_id') .'</p>' : '' !!}
			</div>
			<div class="row">
				<div class="col-xs-6">
				    <div class="form-group">
					    <label for="start_date">Ngày bắt đầu làm việc</label>
				        <div class="controls">
				          <div class="xdisplay_inputx form-group has-feedback">
				            <input type="text" class="form-control has-feedback-left daterangepicker" id="start_date" placeholder="01/01/2016" name="start_date" aria-describedby="inputSuccess2Status" value="{{ old('start_date') }}">
				            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				            <span id="inputSuccess2Status" class="sr-only">(success)</span>
				          </div>
				        </div>
			      	</div>
				</div>
				<div class="col-xs-6">
				    <div class="form-group">
					    <label for="end_date">Ngày thôi việc</label>
				        <div class="controls">
				          <div class="xdisplay_inputx form-group has-feedback">
				            <input type="text" class="form-control has-feedback-left daterangepicker" id="end_date" placeholder="01/01/2017" name="end_date" aria-describedby="inputSuccess2Status" value="{{ old('end_date') }}">
				            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				            <span id="inputSuccess2Status" class="sr-only">(success)</span>
				          </div>
				        </div>
			      	</div>
		      	</div>
			</div>
			<button type="submit" class="btn btn-success m_t_10">Đăng ký</button>
		</div>
	</form>
@endsection