@extends('app.employees.master')

@section('main_content')
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách nhân viên</h2>
          <div class="x_button_helper">
          	<button class="btn btn-success btn-xs m_l_10" data-toggle="modal" data-target=".modal"><i class="fa fa-plus"></i> Thêm mới</button>
          </div>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<table id="datatable" class="table table-striped table-bordered">
        		<thead>
	        		<tr>
	        			<th width="72">Avatar</th>
	        			<th>Họ tên</th>
	        			<th>Tuổi</th>
	        			<th>Ngày bắt đầu</th>
	        			<th>Số ngày làm việc</th>
	        			<th>Số ngày nghỉ</th>
	        			<th>Trạng thái</th>
	        		</tr>
        		</thead>
        		<tbody>
        			@foreach($users as $user)
		        		<tr>
		        			<td class="has_img"><img src="/img/user.png" height="40"></td>
		        			<td>{{ $user->fullname }}</td>
		        			<td>{{ $user->birthday }}</td>
		        			<td>{{ $user->date_start }}</td>
		        			<td>2</td>
		        			<td>3</td>
		        			<td>active</td>
		        		</tr>
	        		@endforeach
        		</tbody>
					</table>
        </div>
      </div>
    </div>
  </div>

	{{-- MODAL --}}
	<div class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Thêm nhân viên mới</h4>
	      </div>
	      <div class="modal-body">
	        @include('app.employees.form_new')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-success">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	{{-- /MODAL --}}
@endsection