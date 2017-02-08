@extends('layouts.auth')

@section('content')
	<div id="workspaces">
		<div class="header">
			<h3 class="pull-left">Workspaces</h3>
			<button class="btn btn-primary pull-left"><i class="fa fa-plus-circle"></i> Create new workspace</button>
		</div>
		<div class="list-workspaces">
			<div class="list-workspaces-item">
				<div class="item-body"><a href=""><img src="/img/cropper.jpg" class="full_width"></a></div>
				<div class="item-footer m_t_5">
					<div class="pull-left">
						<strong><a href="">KFC Hà Nội</a></strong><br>
						<small>Updated a month</small>
					</div>
					<div class="text-right">
						<button class="btn btn-default btn-sm">Edit</button>
						<button class="btn btn-success btn-sm">Open</button>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('bottom_js')
	<script type="text/javascript">
	</script>
@endsection