@extends('restaurant_app.employees.layout')

@section('employee_content')
  	<div class="p_t_20">
		<div role="tabpanel" class="tab-pane" id="work_info">
			<form>
				<div class="col-xs-12">
					<div class="form-group">
					    <label for="department">Nơi làm việc</label>
					    <select class="select2_single form-control" tabindex="-1" name="department" style="width:100%">
			                <option></option>
			                <option value="AK">Alaska</option>
			                <option value="HI">Hawaii</option>
			                <option value="CA">California</option>
			            </select>
					</div>
					<div class="row">
						<div class="col-xs-6">
						    <div class="form-group">
							    <label for="date_start">Ngày bắt đầu làm việc</label>
						        <div class="controls">
						          <div class="xdisplay_inputx form-group has-feedback">
						            <input type="text" class="form-control has-feedback-left daterangepicker" id="date_start" placeholder="01/01/2016" name="date_start" aria-describedby="inputSuccess2Status">
						            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
						            <span id="inputSuccess2Status" class="sr-only">(success)</span>
						          </div>
						        </div>
					      	</div>
						</div>
						<div class="col-xs-6">
						    <div class="form-group">
							    <label for="date_end">Ngày thôi việc</label>
						        <div class="controls">
						          <div class="xdisplay_inputx form-group has-feedback">
						            <input type="text" class="form-control has-feedback-left daterangepicker" id="date_end" placeholder="01/01/2017" name="date_end" aria-describedby="inputSuccess2Status">
						            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
						            <span id="inputSuccess2Status" class="sr-only">(success)</span>
						          </div>
						        </div>
					      	</div>
				      	</div>
					</div>
					<hr>
				</div>
				<div class="col-xs-12">
					<h4 class="pull-left">Thời gian làm việc</h4>
					<button type="button" class="btn btn-primary btn-xs pull-left m_l_10 m_t_5"><i class="fa fa-plus"></i> Thêm thời gian làm việc</button>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-sm-2 col-xs-3">
							<select class="select2_single weekdays form-control" tabindex="-1" name="weekday" style="width:100%">
								<option></option>
				                <option value="AK">Thứ 2</option>
				                <option value="AK">Thứ 3</option>
				                <option value="AK">Thứ 4</option>
				                <option value="AK">Thứ 5</option>
				                <option value="AK">Thứ 6</option>
				                <option value="AK">Thứ 7</option>
				                <option value="AK">Chủ nhật</option>
							</select>
						</div>
						<div class="col-sm-9 col-xs-8">
						    <select class="select2_multiple form-control" tabindex="-1" name="shifts[]" multiple="multiple" style="width:100%">
				                <option value="AK">Kíp 1</option>
				                <option value="HI">Kíp 2</option>
				                <option value="CA">Kíp 3</option>
				                <option value="CA">Kíp 4</option>
				            </select>
						</div>
						<div class="col-sm-1 col-xs-1">
							<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection