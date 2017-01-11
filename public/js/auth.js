
$(document).ready(function () {
	initFunc();
});

$(document).on('page:load',function(){
	initFunc();
})

function initFunc(){
	$('#new-password').passwordStrength(
        // {gradeClass: {
        //     bad: 'bg-blue',
        //     pass: 'bg-blue',
        //     good: 'bg-blue'
        // }}
    );

	var $crop_avatar_modal = $('#crop_avatar_modal'),
		$input = $('input[name="avatar"]'),
		status = '';

	$input.change(function(){
		status = 'modified';
		if ($input.val() == '') {
			// No files chosen
			$('.cropper').cropper('destroy');
			$crop_avatar_modal.modal('hide');
		}else if ($crop_avatar_modal.hasClass('in')){
			
			readURL(this,$(this).data('img'), function(){
				var img_change_url = $('.cropper').attr('src');
				$('.cropper').cropper('reset').cropper('replace', img_change_url);
				// $crop_avatar_modal.modal('show');
			}); 
		}else{
			$('.cropper').cropper('destroy');
			$crop_avatar_modal.modal('show');
			$crop_avatar_modal.on('shown.bs.modal',function(){
				$('.cropper').cropper({
					aspectRatio: 1 / 1,
					preview: '.img-preview',
					zoomable: false,
					crop: function(e) {
						$('input[name="crop_x"]').val(e.x);
						$('input[name="crop_y"]').val(e.y);
						$('input[name="crop_width"]').val(e.width);
						$('input[name="crop_height"]').val(e.height);
					}
				});
			})
		}
	})
	$('#crop_avatar_modal').find('button#save').click(function(){
		status = 'save';
	})
	$crop_avatar_modal.on('hidden.bs.modal',function(){
		if (status != 'save') {
			$input.val('');
			$('.cropper').cropper('destroy');
		};
	})
}
