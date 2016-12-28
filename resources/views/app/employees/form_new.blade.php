
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#general_info" role="tab" data-toggle="tab" aria-expanded="true">Thông tin cơ bản</a>
    </li>
    <li role="presentation"><a href="#work_info" role="tab" data-toggle="tab" aria-expanded="false">Thông tin làm việc</a>
    </li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="general_info">
    	<form>
				<div class="row">
					<div class="col-sm-4">
					  <div class="form-group">
					    <label for="avatar">Ảnh đại diện</label>
					    <input type="file" id="avatar" class="">
					    <div class="text-center m_t_10">
					    	<img src="/img/user.png" class="img-thumbnail" width="180" height="180">
					    </div>
					  </div>
					</div>
					<div class="col-sm-8">
						<div class="form-group">
					    <label for="fullname">Họ và tên</label>
					    <input type="fullname" class="form-control" id="fullname" placeholder="Nguyễn Văn A">
					  </div>
					  <div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" placeholder="Email@example.com">
					  </div>
					  <div class="form-group">
					    <label for="phone">Số điện thoại</label>
					    <input type="text" class="form-control" id="phone" placeholder="0123456789">
					  </div>
					  <div class="form-group">
					    <label for="address">Địa chỉ</label>
					    <input type="text" class="form-control" id="address" placeholder="Hà Nội, Việt Nam">
					  </div>
				    <div class="form-group">
					    <label for="birthday">Ngày sinh</label>
			        <div class="controls">
			          <div class="xdisplay_inputx form-group has-feedback">
			            <input type="text" class="form-control has-feedback-left daterangepicker" id="birthday" name="birthday" placeholder="01/01/1994" aria-describedby="inputSuccess2Status">
			            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
			            <span id="inputSuccess2Status" class="sr-only">(success)</span>
			          </div>
			        </div>
			      </div>
					  <div class="form-group">
					    <label>Giới tính</label>
					    <div class="checkbox">
					    	<label>
						      <input type="radio" name="gender" class="flat"> Nam
						    </label>
					    </div>
					    <div class="checkbox">
					    	<label>
						      <input type="radio" name="gender" class="flat"> Nữ
						    </label>
					    </div>
					  </div>
					  <div class="form-group">
					  	<button type="submit" class="btn btn-success">Đăng ký</button>
					  </div>
					</div>
				</div>
			</form>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="work_info">
    	<div class="row">
		    <form>
	    		<div class="col-sm-12">
					  <div class="form-group">
					    <label for="department">Nơi làm việc</label>
					    <select class="select2_single form-control" tabindex="-1" name="department" style="width:100%">
                <option></option>
                <option value="AK">Alaska</option>
                <option value="HI">Hawaii</option>
                <option value="CA">California</option>
              </select>
					  </div>
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
	    		<div class="col-sm-12">
	    			<h4>Thời gian làm việc</h4>
	    			<ul>
	    				<li class="row">
	    					<div class="col-sm-2">* 
		    					<select class="select2_single weekdays form-control full_width" tabindex="-1" name="weekday">
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
	    					<div class="col-sm-10">
							    <select class="select2_multiple form-control full_width" tabindex="-1" name="shifts[]" multiple="multiple" style="width:100%">
		                <option value="AK">Kíp 1</option>
		                <option value="HI">Kíp 2</option>
		                <option value="CA">Kíp 3</option>
		                <option value="CA">Kíp 4</option>
		              </select>
	    					</div>
	    				</li>
	    				<li class="row">
	    					<div class="col-sm-2">* 
		    					<select class="select2_single weekdays form-control full_width" tabindex="-1" name="weekday">
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
	    					<div class="col-sm-10">
							    <select class="select2_multiple form-control full_width" tabindex="-1" name="shifts[]" multiple="multiple" style="width:100%">
		                <option value="AK">Kíp 1</option>
		                <option value="HI">Kíp 2</option>
		                <option value="CA">Kíp 3</option>
		                <option value="CA">Kíp 4</option>
		              </select>
	    					</div>
	    				</li>
	    				<li class="clearfix"></li>
	    			</ul>
	    		</div>
	    	</form>
    	</div>
    </div>
  </div>
</div>