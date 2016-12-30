@extends('app.employees.master')

@section('main_content')
<div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm nhân viên mới</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        	<div class="" role="tabpanel" data-example-id="togglable-tabs">
			  	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
			    	<li role="presentation" class="active"><a href="#general_info" role="tab" data-toggle="tab" aria-expanded="true">Thông tin cơ bản</a></li>
			    	<li role="presentation"><a href="#work_info" role="tab" data-toggle="tab" aria-expanded="false">Thông tin làm việc</a></li>
			  	</ul>
			  	<div id="myTabContent" class="tab-content">
			  		<div role="tabpanel" class="tab-pane fade active in" id="general_info">
				        @include('app.employees.form_new')
			  		</div>
			  		<div role="tabpanel" class="tab-pane fade" id="work_info">
				        @include('app.employees.form_work')
			  		</div>
			  	</div>
			</div>
        </div>
      </div>
    </div>
</div>
@endsection