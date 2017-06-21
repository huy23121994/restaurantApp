
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
	if (food_data.length == 0) {
		alert('Cần chọn ít nhất một món ăn!');
	}else{
		$this.find('i').addClass('fa-spin');
		for (var i = 0; i < food_data.length; i++) {
			food_id = food_data[i].split('|');
			foods.push(food_id[0]);
		}
		$.post(url,{ foods : foods, food_data : food_data },function(data){
			data = JSON.parse(data);
			$('.restaurant_id .status').removeClass('text-success').addClass('text-danger').html('<i class="fa fa-times"></i>');
			$.each(data, function(id,restaurant){
				var restaurant_id = id;
				if (restaurant.status == 1) { 
					$('.restaurant_id.' + id + ' .status').removeClass('text-danger').addClass('text-success').html('<i class="fa fa-check"></i>');
				}
				$('.restaurants .foods.' + id).html('');
				$.each(restaurant.foods, function(id,food){
					var html = '<li class="row m_l_r_0 p_b_10">'
									+'<div class="col-xs-4 p_l_20">- '+food.name+'</div>'
									+'<div class="col-xs-2 text-left">'+food.number+'</div>'
									+'<div class="col-xs-2 text-center">';
					if (food.status) {
						html += '<i class="fa fa-check text-success"></i></div></li>';
					}else{
						html += '<i class="fa fa-times text-danger"></i></div></li>';
					}
					$('.restaurants .foods.' + restaurant_id).append(html);
				})
			});
			$this.find('i').removeClass('fa-spin');
		});
	}
})

$('.inEdit .submit').click(function(){
	var $number_el = $(this).parents('.action').siblings('.number'),
		$action_el = $(this).parent(),
		number = $number_el.find('input[name="number"]').val();
	$.post(
		$(this).data('url'),
		{
			restaurant_id : $(this).data('restaurant'),
			number: number
		},
		function(data){
			if (data) {
				$action_el.hide().siblings('.edit_food_number').show();
				$number_el.find('.text').html(number).show();
				$number_el.find('.input').hide();
			}
		}
	);
})