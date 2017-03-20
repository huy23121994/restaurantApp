<form method="POST" action="{{ $action }}">
	{{ csrf_field() }}
	@if(isset($employee))
		{{ method_field('PUT') }}
	@endif
	<div class="row">
		<div class="col-sm-4 col-xs-12">
		  <div class="form-group">
		    <div class="text-center m_t_10">
		    	<label for="avatar"><img src="/img/user.png" class="img-thumbnail employee_avatar" width="180" height="180"></label>
		    </div>
		    <input type="file" id="avatar" name="avatar" data-img=".employee_avatar" class="m_t_10 need_preview">
		  </div>
		</div>
		<div class="col-sm-8 col-xs-12">
		  <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
		    <label for="fullname">Họ và tên</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nguyễn Văn A" value="{{ isset($employee) ? $employee->fullname : old('fullname') }}">
		    {!! $errors->has('fullname') ? '<p class="m_t_5 text-danger">* '. $errors->first('fullname') .'</p>' : '' !!}
		  </div>
		  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Email@example.com" value="{{ isset($employee) ? $employee->email : old('email') }}">
		    {!! $errors->has('email') ? '<p class="m_t_5 text-danger">* '. $errors->first('email') .'</p>' : '' !!}
		  </div>
		  <div class="form-group">
		    <label for="phone">Số điện thoại</label>
		    <input type="text" class="form-control" id="phone" name="phone" placeholder="0123456789" value="{{ isset($employee) ? $employee->phone : old('phone') }}">
		  </div>
	    <div class="form-group">
		    <label for="birthday">Ngày sinh</label>
	        <div class="controls">
	          <div class="xdisplay_inputx form-group has-feedback">
	            <input type="text" class="form-control has-feedback-left daterangepicker" id="birthday" name="birthday" placeholder="01/01/1994" value="{{ isset($employee) ? $employee->birthday : old('birthday') }}">
	            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
	            <span id="inputSuccess2Status" class="sr-only">(success)</span>
	      	  </div>
	      	</div>
      	</div>
		<div class="form-group">
		    <label for="address">Địa chỉ</label>
		    <input type="text" class="form-control" id="address" name="address" placeholder="Hà Nội, Việt Nam" value="{{ isset($employee) ? $employee->address : old('address') }}">
		</div>
		<div class="form-group">
		    <label>Giới tính</label>
		    <div class="checkbox">
		    	<label>
			      <input type="radio" name="gender" class="flat" value="1" 
			      	@if(isset($employee))
			      		@if( $employee->gender == 1)
			      			checked
			      		@endif
			      	@elseif(old('gender') == 1)
			      		checked
			      	@endif
			      > Nam
			    </label>
		    </div>
		    <div class="checkbox">
		    	<label>
			      <input type="radio" name="gender" class="flat" value="0"
			      	@if(isset($employee))
			      		@if( $employee->gender == 0)
			      			checked
			      		@endif
			      	@elseif(old('gender') == 0 && old('gender') != NULL)
			      		checked
			      	@endif
			       > Nữ
			    </label>
		    </div>
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-success">{{ isset($employee) ? 'Cập nhật' : 'Đăng ký' }}</button>
		  </div>
		</div>
	</div>
</form>