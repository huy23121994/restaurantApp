/***
* @Author BaoHuyBaoHuy
**/

$(document).ready(function() {
  // Datatable
  var table = $('#datatable').DataTable({
  	'order': [[ 1, 'asc' ]],
    // "columnDefs": [
    //   {
    //     "targets": 0 ,
    //     "visible": false,
    //     "searchable": false
    //   }
    // ],
    // select: true,
    //     language: {
    //         select: {
    //             rows: {
    //                 _: "You have selected %d rows",
    //                 0: "Click a row to select it",
    //                 1: "Only 1 row selected"
    //             }
    //         }
    //     }
  });
  table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

  // $('#datatable tbody').on('dblclick', 'tr', function () {
  //   var data = table.row( this ).data();
  //   Turbolinks.visit(data[0]);
  // } );

  // Datepicker
  $('.daterangepicker').each(function(){
    $(this).daterangepicker({
      format: 'DD/MM/YYYY',

      singleDatePicker: true,
      calender_style: "picker_1"
    }).inputmask('dd/mm/yyyy');
  })
  

  // Select2
  $(".select2_single").select2({
    allowClear: true
  });

  $(".select2_single.weekdays").select2({
    placeholder: "Chọn thứ",
    allowClear: true
  });
  $(".select2_multiple").select2({
    allowClear: true
  });

  /**
  * Crop Image
  */
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

  /*
  * Realtime update foodstatus
  */
  var pusher = new Pusher('5385981d70862989265f', {
      cluster: 'eu',
      encrypted: true
  });

  var channel = pusher.subscribe('tbhuy');

  //Bind a function to a Event (the full Laravel class)
  channel.bind('App\\Events\\UpdateFoodStatus', changeStatus);

  function changeStatus(data) {
    data = JSON.parse(data.data);
    if(data.status){
      $('.food_'+ data.food_id).find('button').removeClass('btn-default').addClass('btn-primary').html('Đang còn').removeAttr('disabled');
    }else{
      $('.food_'+ data.food_id).find('button').addClass('btn-default').removeClass('btn-primary').html('Đã hết').removeAttr('disabled');
    }
    $('.food_'+ data.food_id).attr('data-status', data.status);
  }
  // END realtime update food status

  /*
  * SELECT FOOD IN ORDERS ROUTE
  */
  $('#copy_food_select').click(function(){
    var $list = $('.list_food_select'),
        list_option = $list.find('div.field').find('select').html(),
        html = '<div class="row m_t_10 field"><div class="col-xs-9"><select class="select2_single form-control" tabindex="-1" style="width:100%" data-placeholder="Chọn mã món ăn">'+list_option+'</select></div><div class="col-xs-2"><input type="number" name="number" class="form-control" value="1" min="1"></div><div class="col-xs-1"><button type="button" id="remove_food_select" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></div></div></div>';
    $list.append(html);
    var $last_el = $list.find('div.field').last(),
        $select_el = $last_el.find('select');
    removeFoodSeleted($select_el);
    $select_el.val([]).select2({
      allowClear: true
    });
  })

  $('body').on('click', '#remove_food_select', function(){
  	var $field = $(this).parents('.field'),
  		delete_val = $field.find('select').val(),
  		delete_html = $field.find('select').find(':selected').html();
  	if (delete_val) {
  		$('.list_food_select .field select')
        .append('<option value="'+ delete_val +'">'+ delete_html +'</option>')
        .select2({
          allowClear: true
        });
  	}
    $field.remove();
    setFoods();
  })

  $('body').on('click','.select2',function(){
    $(this).siblings('select').focus();
  })
  $('body').on('select2:unselecting','select',function(){
    $(this).focus();
  })

  var prev_val = '',
      prev_html = '';
  $('body').on('focus','.list_food_select .field select',function(){
    prev_val = $(this).val();
    prev_html = $(this).find(':selected').html();
  })

  $('body').on('change','.list_food_select .field select',function(){
    var val = $(this).val();
    $(this).addClass('just');
    if (val) {
      // remove selected value in another select element except this
      $('.list_food_select .field select').not('.just')
        .find('option[value="'+ val +'"]').remove()
        .select2({
          allowClear: true
        });
    }
    if (prev_val) {
      // add option which has pre_val to another select element except this
      $('.list_food_select .field select').not('.just')
        .append('<option value="'+ prev_val +'">'+ prev_html +'</option>')
        .select2({
          allowClear: true
        });
    }
    $('.just').removeClass('just');
    prev_val = val;
    prev_html = $(this).find(':selected').html();
  	setFoods();
  })

  $('.list_food_select .field').each(function(){
    var $input = $(this).find('input');
    $('body').on('change',$input, function(){
      setFoods();
    })
  })
})

function removeFoodSeleted(selector){
  $('.list_food_select > .field').each(function(){
    var option_val = $(this).find('select').find(':selected').val();
    if (option_val) {
      selector.find('option[value='+option_val+']').remove();
    }
  })
}

function setFoods(){
  $('#foods').html('');
  $('.list_food_select > .field').each(function(){
    var option_val = $(this).find('select').find(':selected').val(),
        number_val = $(this).find('input[name="number"]').val();
    if (option_val) {
      var val = option_val + "|" + number_val;
      $('#foods').append('<option value="'+ val +'" selected></option>');
    }
  })
  var data = [];
  $("#foods option").each(function(){
    var val = $(this).attr('value');
    data.push(val);
  })
  $("#foods").val(data);
}

  // END SELECT FOOD IN ORDERS ROUTE

  