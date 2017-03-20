
<!-- DELETE MODAL -->
<div class="modal fade confirm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Delete confirmation</h4>
      	</div>
      	<div class="modal-body">
      		<form class="hide" id="delete-ws" action="{{ $action }}" method="POST">
      			{{ csrf_field() }}
				{{ method_field('DELETE') }}
      		</form>
        	<div class="text-center">
        		<button type="submit" class="btn btn-danger" onclick="$('form#delete-ws').submit()">Yes. I'm sure</button>
        		<button class="btn btn-default" data-dismiss="modal">Cancle</button>
        	</div>
      	</div>
    </div>
  </div>
</div>
<!-- END MODAL -->