
<div class="modal fade" id="crop_avatar_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Cắt ảnh hiển thị</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-8">
	      			<img src="/img/user.png" class="cropper avatar_preview" alt="">
	      		</div>
	      		<div class="col-sm-4">
	      			<strong>Preview</strong>
	      			<div class="img-preview" style="width:100px;height:100px;overflow:hidden;">
			    		<img src="/img/user.png" alt="" class="img-thumbnail">
			    	</div>
			    	<input type="hidden" name="crop_x">
			    	<input type="hidden" name="crop_y">
			    	<input type="hidden" name="crop_width">
			    	<input type="hidden" name="crop_height">
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      	<div class="row">
	      		<div class="col-xs-6 text-left">
			        <label for="avatar" class="btn btn-primary"><i class="fa fa-refresh"></i></label>
	      		</div>
	      		<div class="col-xs-6">
			        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Save</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
	        </div>
	      	</div>
	      </div>
	    </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>