
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
		}
	);
})