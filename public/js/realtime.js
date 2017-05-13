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

var row;
function changeOrderStatus(data) {
    var order = JSON.parse(data.data),
        $order_el = $('.order_'+order.id).parent().parent();
    $order_el.click();
    table.cell(row,7).data('<button class="btn btn-xs '+order.status.class+'">'+order.status.status+'</button>');
}

var table;
function updateListOrder(data) {
    var order = JSON.parse(data.data);
    if(
        $('#datatable').hasClass('restaurant_'+order.restaurant.id)
        || $('#datatable').hasClass('global')
    ){
        table.column(1).visible(false);
        if (admin_role == 1) {
          table.column(6).visible(false);
        }
        var edit_action = null;
        if ($('#datatable').hasClass('global')) {
            edit_action = '<a href="'+order.url+'/edit" class="btn btn-warning btn-xs" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>'
        }
        table.row.add( [
            '',
            order.id,
            '<i class="hide order_'+order.id+'"></i><a href="'+order.url+'" class="text-primary">'+order.order_id+'</a>',
            order.customer,
            order.address,
            order.description,
            order.restaurant.name,
            '<button class="btn btn-xs '+order.status.class+'">'+order.status.status+'</button>',
            '<a href="'+order.url+'" class="btn btn-success btn-xs" title="Chi tiết"><i class="fa fa-eye"></i></a>'+(edit_action ? edit_action : ''),
        ] ).draw( false );
        table.order([1, 'desc']).draw();
        table.columns.adjust().draw();
        $("#datatable").width("100%");
    }
}