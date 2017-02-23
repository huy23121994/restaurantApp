@extends('layouts.auth')

@section('content')
	<div class="top flex">
		<div class="wr">
			<h3>{{ $workspace->name }}</h3>
		</div>
	</div>

	<div class="main" id="show-workspace">

	<!-- Nav tabs -->
  	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
    	<li role="presentation"><a href="#ws_admin" data-toggle="tab">Workspace Admin</a></li>
  	</ul>

  	<!-- Tab panes -->
  	<div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="profile">
			@if (count($errors) > 0)
			    <div class="alert alert-danger alert-dismissible fade in">
			    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@if (session('status'))
			    <div class="alert alert-success alert-dismissible fade in">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			        {{ session('status') }}
			    </div>
			@endif
			<form action="{{ route('workspaces.update', [$workspace->url]) }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input type="hidden" value="{{ $workspace->id }}" name="user_id">
				<div class="form-group">
				    <label for="name">Restaurant name</label>
				    <input type="text" class="form-control" id="name" placeholder="your-restaurant-name" name="name" value="{{ $workspace->name }}">
				</div>
				<div class="form-group">
				    <label for="description">Description</label>
				    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="{{ $workspace->description }}">
				</div>
				<div class="form-group" id="access-link">
				    <label for="url">Access link address</label>
				    <div class="input-group">
					  <span class="input-group-addon">{{ url('/') }}/</span>
					  <input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{ $workspace->url }}">
					  <div class="text-primary access-link"><a href="{{ url('/'.$workspace->url) }}">Access <i class="fa fa-external-link"></i></a></div>
					</div>
				</div>
				<div class="form-group">
				    <label for="avatar">
				    	Avatar
				    	<div class="img-preview" style="height:100px;overflow:hidden;">
				    		<img src="{{ $workspace->avatar }}" alt="" class="img-thumbnail">
				    	</div>
				    </label>
				    <input type="file" id="avatar" data-img=".img-preview img" class="need_preview" name="avatar" accept="image/*" >
				</div>
				<button type="submit" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Updating..." class="btn btn-primary">Update Workspace</button>
			</form>
			<hr>
			<div class="card">
				<header>
					<h4>Delete this workspace</h4>
					<span class="lighten">This cannot be undone. </span>
					<strong>Really.</strong>
				</header>
				<section>
					<div class="pull-left">Are you sure?</div>
					<div class="pull-right">
						<button type="button" class="btn btn-primary orange" data-toggle="modal" data-target=".modal.confirm"><i class="fa fa-trash"></i> Delete workspace</button>
					</div>
					<div class="clearfix"></div>
				</section>
			</div>
			<!-- MODAL -->
			<div class="modal fade confirm" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			       <div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title">Delete confirmation</h4>
			      	</div>
			      	<div class="modal-body">
			      		<form class="hide" id="delete-ws" action="{{ route('workspaces.destroy',[$workspace->id]) }}" method="POST">
			      			{{ csrf_field() }}
							{{ method_field('DELETE') }}
			      		</form>
			        	<div class="text-center">
			        		<button type="submit" class="btn btn-primary orange" onclick="$('form#delete-ws').submit()">Yes. I'm sure</button>
			        		<button class="btn btn-default" data-dismiss="modal">Cancle</button>
			        	</div>
			      	</div>
			    </div>
			  </div>
			</div>
			<!-- END MODAL -->
    	</div>
    	<div role="tabpanel" class="tab-pane" id="ws_admin">
			<div id="workspace-admin">
				<button type="button" class="btn btn-primary btn-xs pull-left m_t_5 m_l_5" data-toggle="modal" data-target=".modal.add_admin"> 
					<i class="fa fa-plus"></i> Add new
				</button>
				<div class="clearfix"></div>
				<!-- MODAL -->
				<div class="modal fade add_admin" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				       <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        	<h4 class="modal-title">Add new admin</h4>
				      	</div>
				      	<div class="modal-body">
				      		<div class="alert alert-danger alert-dismissible add_admin_errors" error style="display:none">
							  	<button type="button" class="close" onclick="$('.add_admin_errors').hide()"><span>&times;</span></button>
							  	<strong>Error!</strong>
							  	<ul class="list_error"></ul>
							</div>
							<div class="alert alert-success alert-dismissible add_admin_success" style="display:none">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						        <strong>Success!</strong>
						    </div>
							<form action="{{ route('workspace_admin.store', [$workspace->id]) }}" method="POST" id="add_admin" form-ajax="true">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="">Username</label>
									<input type="text" class="form-control" name="username" placeholder="Username for your workspace admin">
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" class="form-control" name="password" placeholder="password">
								</div>
					        	<div class="text-center">
					        		<button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Add new</button>
					        		<button class="btn btn-default" data-dismiss="modal">Cancle</button>
					        	</div>
							</form>
				      	</div>
				    </div>
				  </div>
				</div>
				<!-- END MODAL -->
				<table class="table" id="list_admin">
					<thead>
						<tr>
							<th>#</th>
							<th>Username</th>
							<th>Password</th>
						</tr>
					</thead>
					<tbody>
						@foreach($workspace->admins as $key => $admin)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $admin->username }}</td>
								<td>{{ $admin->password }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
    	</div>
  	</div>
		
	</div>
	<div class="clearfix"></div>
@endsection
