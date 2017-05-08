/*
* PUSHER
*/

var pusher = new Pusher('5385981d70862989265f', {
  cluster: 'eu',
  encrypted: true
});

var channel = pusher.subscribe('tbhuy');

//Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\UpdateFoodStatus', changeFoodStatus);
channel.bind('App\\Events\\UpdateOrderStatus', changeOrderStatus);
channel.bind('App\\Events\\DataPusher', updateListOrder);

function changeFoodStatus(data) {
    data = JSON.parse(data.data);
    console.log(data);
    if(data.status){
      $('.food_'+ data.food_id).find('button').removeClass('btn-default').addClass('btn-primary').html('Đang còn').removeAttr('disabled');
    }else{
      $('.food_'+ data.food_id).find('button').addClass('btn-default').removeClass('btn-primary').html('Đã hết').removeAttr('disabled');
    }
    $('.food_'+ data.food_id).attr('data-status', data.status);
}

function changeOrderStatus(data) {
    var order = JSON.parse(data.data);
    var $status = $('.order_'+order.id).find('td.status').find('button');
    $status.text(order.status.status);
    $status.attr('class','').addClass('btn btn-xs');
    switch(order.status.value){
      case 0:
        $status.addClass('btn-info');
        break;
      case 1:
        $status.addClass('btn-warning');
        break;
      case 2:
        $status.addClass('btn-success');
        break;
      case 3:
        $status.addClass('btn-danger');
        break;
      case 4:
        $status.addClass('btn-danger');
        break;
    }

}

function updateListOrder(data) {
    var order = JSON.parse(data.data);
    console.log(order);
    $('.list_orders').prepend('<tr class="order_'+order.id+'"><td><a href="'+order.url+'" class="text-primary">'+order.order_id+'</a></td><td>'+order.customer+'</td><td>'+order.address+'</td><td></td><td class="status"><button class="btn btn-xs '+order.status.class+'">'+order.status.status+'</button></td><td><a href="'+order.url+'" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a></td></tr>');
}