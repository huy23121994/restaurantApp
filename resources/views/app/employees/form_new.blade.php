<form>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
		    <label for="fullname">Họ và tên</label>
		    <input type="fullname" class="form-control" id="fullname" placeholder="Nguyễn Văn A">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" placeholder="Email@example.com">
		  </div>
		  <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="text" class="form-control" id="phone" placeholder="0123456789">
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
		</div>
		<div class="col-sm-6">
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
		  <div class="form-group" style="margin-top:30px">
		    <label for="avatar">Ảnh đại diện</label>
		    <input type="file" id="avatar" class="hide">
		    <div class="text-center">
		    	<img src="/img/user.png" class="img-thumbnail" width="180" height="180">
		    </div>
		  </div>
		</div>
	</div>
  
</form>