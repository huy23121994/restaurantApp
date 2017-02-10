@extends('layouts.auth')

@section('content')
	<div id="workspaces">
		<div class="header">
			<h3 class="pull-left">Workspaces</h3>
			<a href="{{ route('workspaces.create') }}">
				<button class="btn btn-primary pull-left"><i class="fa fa-plus-circle"></i> Create new workspace</button>
			</a>
		</div>
		<div class="list-workspaces">
			@foreach($workspaces as $workspace)
				<div class="list-workspaces-item">
					<div class="item-body"><a href=""><img src="{{ $workspace->avatar }}" class="full_width"></a></div>
					<div class="item-footer m_t_5">
						<div class="pull-left">
							<strong><a href="">{{ $workspace->name }}</a></strong><br>
						</div>
						<div class="text-right">
							<a href="{{ route('workspaces.show',[$workspace->url]) }}"><button class="btn btn-default btn-sm">Edit</button></a>
							<button class="btn btn-success btn-sm">Open</button>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection

@section('bottom_js')
	<script type="text/javascript">
	</script>
@endsection