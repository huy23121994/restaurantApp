
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
		$.each(data, function(id,restaurant){
			if (restaurant.status == 1) { 
				$('.restaurant_id.' + id).removeClass('text-danger').addClass('text-success').html('<i class="fa fa-check"></i>');
			}
			$('.restaurants .foods').html('');
			$.each(restaurant.foods, function(id,food){
				var html = '<li class="row m_l_r_0 p_b_10"><div class="col-xs-6">- '+food.name+food.status+'</div><div class="col-xs-2 col-xs-offset-2 text-center p_l_0">';
				console.log(food.name , food.status);
				if (food.status) {
					html += '<i class="fa fa-check text-success"></i></div></li>';
				}else{
					html += '<i class="fa fa-times text-danger"></i></div></li>';
				}
				$('.restaurants .foods').append(html);
			})
		});
		$this.find('i').removeClass('fa-spin');
	});
})