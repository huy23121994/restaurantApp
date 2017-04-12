
<form action="{{ $action }}" method="POST">
	{{ csrf_field() }}
	@if(isset($work))
		{{ method_field('PUT') }}
	@endif
	<div class="col-xs-12">
		<div class="form-group">
		    <label for="department">Nơi làm việc</label>
		    <select class="select2_single form-control" tabindex="-1" name="restaurant_id" style="width:100%">
                <option></option>
                @foreach($restaurants as $restaurant)
	                <option value="{{ $restaurant->id }}" {{ isset($work) && $restaurant->id == $work->restaurant_id ? 'selected'  : '' }}>{{ $restaurant->location }}</option>
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
			            <input type="text" class="form-control has-feedback-left daterangepicker" id="start_date" name="start_date" aria-describedby="inputSuccess2Status" value="{{ isset($work) ? $work->start_date : old('start_date') }}">
			            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
			            <span id="inputSuccess2Status" class="sr-only">(success)</span>
			          </div>
			          {!! $errors->has('start_date') ? '<p class="m_t_5 text-danger">* '. $errors->first('start_date') .'</p>' : '' !!}
			        </div>
		      	</div>
			</div>
			<div class="col-xs-6">
			    <div class="form-group">
				    <label for="end_date">Ngày thôi việc</label>
			        <div class="controls">
			          <div class="xdisplay_inputx form-group has-feedback">
			            <input type="text" class="form-control has-feedback-left daterangepicker" id="end_date" name="end_date" aria-describedby="inputSuccess2Status" value="{{ isset($work) ? $work->end_date : old('end_date') }}">
			            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
			            <span id="inputSuccess2Status" class="sr-only">(success)</span>
			          </div>
			          {!! $errors->has('end_date') ? '<p class="m_t_5 text-danger">* '. $errors->first('end_date') .'</p>' : '' !!}
			        </div>
		      	</div>
	      	</div>
		</div>

		<div class="form-group">
		    <label>Trạng thái</label>
		    <div class="checkbox">
		    	<label>
			      <input type="checkbox" name="status" class="flat" value="1" 
			      	@if(isset($work))
			      		@if( $work->status == 1)
			      			checked
			      		@endif
			      	@elseif(old('status') == 1)
			      		checked
			      	@endif
			      > Đang làm việc
			    </label>
		    </div>
	        {!! $errors->has('status') ? '<p class="text-danger">* '. $errors->first('status') .'</p>' : '' !!}
		</div>
		@if(isset($work))
			<button type="submit" class="btn btn-success m_t_10" data-loading-text="<i class='fa fa-refresh fa-spin fa-fw'></i> Đang xử lý ..." >Cập nhật</button>
			<a href="{{ route('works.show',[getWorkspaceUrl(),$employee->id, $work->id]) }}" class="btn btn-danger m_t_10"><i class="fa fa-ban"></i> Hủy</a>
		@else
			<button type="submit" class="btn btn-success m_t_10">Đăng ký</button>
		@endif
	</div>
</form>