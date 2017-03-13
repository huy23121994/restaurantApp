@extends('layouts.auth')

@section('content')
	<div class="top {{ url()->current() == route('workspaces.create') ? 'flex' : '' }}">
		<div class="title">
			<h3>@yield('workspace_title')
				@if( url()->current() != route('workspaces.create') )
					<small class="text-primary">
						<a href="{{ url('/'.$workspace->url) }}" target="blank">Access <i class="fa fa-external-link"></i></a>
					</small>
				@endif
			</h3>
		</div>
		@if( url()->current() != route('workspaces.create'))
			<div class="ws_menu">
				<ul class="nav nav-tabs" role="tablist">
			    	<li role="presentation" class="active"><a href="#profile" data-toggle="tab"><u>Workspace settings</u></a></li>
			    	<li role="presentation"><a href="#ws_admin" data-toggle="tab"><u>Workspace Admin</u></a></li>
			  	</ul>
			</div>
		@endif
	</div>
	<div class="main">
		@yield('workspace_content')
	</div>
@endsection
