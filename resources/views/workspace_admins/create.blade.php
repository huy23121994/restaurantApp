
<h4>Add new admin</h4>
<form action="{{ route('workspace_admin.store', [$workspace->id]) }}" method="POST" id="add_admin" form-ajax="true">
	<div class="alert alert-danger alert-dismissible add_admin_errors" error style="display:none">
	  	<button type="button" class="close" onclick="$('.add_admin_errors').hide()"><span>&times;</span></button>
	  	<strong>Error!</strong>
	  	<ul class="list_error"></ul>
	</div>
	<div class="alert alert-success alert-dismissible add_admin_success" style="display:none">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	    <strong>Success!</strong>
	</div>
	{{ csrf_field() }}
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" name="username" placeholder="Username for your workspace admin">
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="password">
	</div>
	<div class="text-left">
		<button type="submit" class="btn btn-primary btn-xs" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Add new</button>
	</div>
</form>