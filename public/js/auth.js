
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

	alert_dismiss('.alert-success',3000);

	var $crop_avatar_modal = $('#crop_avatar_modal'),
		$input = $('input[name="avatar"]'),
		status = '';

	/**
	*	Crop Image
	*/
	$input.change(function(){
		status = 'modified';
		if ($input.val() == '') {
			// No files chosen
			$('.cropper').cropper('destroy');
			$crop_avatar_modal.modal('hide');

		}else if ($crop_avatar_modal.hasClass('in')){
			// change image preview
			readURL(this,$(this).data('img'), function(){
				var img_change_url = $('.cropper').attr('src');
				$('.cropper').cropper('reset').cropper('replace', img_change_url);
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

	$('.list-workspaces').imagesLoaded( function() {
		$('.list-workspaces').masonry({
			itemSelector: '.list-workspaces-item'
		});
	});

}

function alert_dismiss(selector,time){
	setTimeout(function(){
		$(selector).hide();
	},time)
}

$(document).on('submit','#add_admin',function(e){
	var $this = $(this);
	e.preventDefault();
	$.post(
		$this.attr('action'),
		$this.serialize()
	).done(function(data){
		$('.add_admin_errors').hide();	// hide error messages
		$('.add_admin_success').show();	// show error messages
		alert_dismiss('.add_admin_success',3000);
		var counter = $('#list_admin tbody tr').last().find('td').first().text();	// get last row number
		$('#list_admin tbody').append('<tr><td>'+ ++counter +'</td><td>'+ data.username +'</td><td>'+ data.password +'</td></tr>');
		$this.find('button[type="submit"]').button('reset');	//reset button
		$this[0].reset();	//reset Form
	}).fail(function(xhr, status, error) {
        var err = JSON.parse(xhr.responseText);
        var $err_el = $('.add_admin_errors').find('ul.list_error');
        $err_el.html('');
        $.each(err,function(key, value){
    		$err_el.append('<li>' + value + '</li>');
        	$('.add_admin_errors').show();
        })
	    $this.find('button[type="submit"]').button('reset');
	    $this.find('input[name="password"]').val('');
    });
})