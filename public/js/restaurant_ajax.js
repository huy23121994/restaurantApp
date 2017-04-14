
	$('.update_food_status button').click(function(){
		var	$data_td = $(this).parent(),
			url = $data_td.attr('data-url'),
			status = $data_td.attr('data-status'),
			$button = $(this);
		
		$button.html("<i class='fa fa-cog fa-spin fa-fw'></i> Processing...").attr('disabled','disabled');
		$.post(url,
			{
				status : status ,
				_token : $('#token').html(),
			},
			function(data){
				data = JSON.parse(data);
				status = data.status;
				if(status){
					$button.removeClass('btn-default').addClass('btn-primary').html('Đang còn').removeAttr('disabled');
				}else{
					$button.addClass('btn-default').removeClass('btn-primary').html('Đã hết').removeAttr('disabled');
				}
				$data_td.attr('data-status', status);
			}
		);
	})