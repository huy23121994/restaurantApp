
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.update_food_status button').click(function(){
	var	$data_td = $(this).parent(),
		url = $data_td.attr('data-url'),
		status = $data_td.attr('data-status'),
		$button = $(this);
	
	$button.html("<i class='fa fa-cog fa-spin fa-fw'></i> Processing...").attr('disabled','disabled');
	$.post(url,
		{
			status : status ,
		}
	);
})

$('#order #check_restaurant').click(function(){
	var $this = $(this),
		url = $this.attr('url'),
		food_data = $('#foods').val(),
		foods = [];
	$this.find('i').addClass('fa-spin');
	for (var i = 0; i < food_data.length; i++) {
		food_id = food_data[i].split('|');
		foods.push(food_id[0]);
	}
	$.post(url,{ foods : foods },function(data){
		data = JSON.parse(data);
		$('.restaurant_id').removeClass('text-success').addClass('text-danger').html('<i class="fa fa-times"></i>');
		$.each(data, function(id,val){
			if (val.status == 1) { 
				$('.restaurant_id.' + val.id).removeClass('text-danger').addClass('text-success').html('<i class="fa fa-check"></i>');
			}
		});
		$this.find('i').removeClass('fa-spin');
	});
})