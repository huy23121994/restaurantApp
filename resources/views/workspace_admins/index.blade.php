<div id="workspace-admin">
	@include('workspace_admins.create')
	<hr>
	<h4>List admin</h4>
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