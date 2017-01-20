@extends('layouts.auth')

@section('content')
	<div id="workspaces">
		<h3>Workspaces</h3>
		<div class="row list-workspaces">
			<a class="list-workspaces-item new-workspace" href="#">
				<div class="wrapper text-center">
					<div class="plus">+</div>
					<p>Create new workspace</p>
				</div>
			</a>
			<div class="list-workspaces-item">
				<div class="item-body"><a href=""><img src="/img/cropper.jpg" class="full_width"></a></div>
				<div class="item-footer m_t_5">
					<div class="pull-left">
						<strong><a href="">KFC Hà Nội</a></strong><br>
						<small>Updated a month</small>
					</div>
					<div class="text-right">
						<button class="btn btn-primary btn-sm">Edit</button>
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