
<!-- DELETE MODAL -->
<div class="modal fade {{ isset($delete_id)? $delete_id : '' }}" tabindex="-1" role="dialog" id="delete_confirm">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Delete confirmation</h4>
      	</div>
        <form id="delete-ws" action="{{ $action }}" method="POST">
        	<div class="modal-body">
        			{{ csrf_field() }}
  				    {{ method_field('DELETE') }}
          	<div class="text-center">
          		<button type="submit" class="btn btn-danger" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Deleting...">Yes. I'm sure</button>
          		<button class="btn btn-default" data-dismiss="modal">Cancle</button>
          	</div>
        	</div>
        </form>
    </div>
  </div>
</div>
<!-- END MODAL -->