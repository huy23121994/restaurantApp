<form method="POST" action="{{ url('/employees') }}" data-parsley-validate>
	{{ csrf_field() }}
	@if( isset($restaurant) )
		<input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
	@endif
	<div class="row">
		<div class="col-sm-4 col-xs-12">
		  <div class="form-group">
		    <label>Ảnh đại diện</label>
		    <div class="text-center m_t_10">
		    	<label for="avatar"><img src="/img/user.png" class="img-thumbnail employee_avatar" width="180" height="180"></label>
		    </div>
		    <input type="file" id="avatar" name="avatar" data-img=".employee_avatar" class="m_t_10 need_preview">
		  </div>
		</div>
		<div class="col-sm-8 col-xs-12">
			<div class="form-group">
		    <label for="fullname">Họ và tên <small>{{ ($errors->first('email')) }}</small></label>
		    <input type="fullname" class="form-control" id="fullname" name="fullname" placeholder="Nguyễn Văn A"required="required">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Email@example.com">
		  </div>
		  <div class="form-group">
		    <label for="phone">Số điện thoại</label>
		    <input type="text" class="form-control" id="phone" name="phone" placeholder="0123456789">
		  </div>
	    <div class="form-group">
		    <label for="birthday">Ngày sinh</label>
        <div class="controls">
          <div class="xdisplay_inputx form-group has-feedback">
            <input type="text" class="form-control has-feedback-left daterangepicker" id="birthday" name="birthday" placeholder="01-01-1994">
            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
            <span id="inputSuccess2Status" class="sr-only">(success)</span>
      	  </div>
      	</div>
      </div>
		  <div class="form-group">
		    <label for="address">Địa chỉ</label>
		    <input type="text" class="form-control" id="address" name="address" placeholder="Hà Nội, Việt Nam">
		  </div>
		  <div class="form-group">
		    <label>Giới tính</label>
		    <div class="checkbox">
		    	<label>
			      <input type="radio" name="gender" class="flat" value="1"> Nam
			    </label>
		    </div>
		    <div class="checkbox">
		    	<label>
			      <input type="radio" name="gender" class="flat" value="0"> Nữ
			    </label>
		    </div>
		  </div>
		  <div class="form-group">
		  	<button type="submit" class="btn btn-success">Đăng ký</button>
		  </div>
		</div>
	</div>
</form>